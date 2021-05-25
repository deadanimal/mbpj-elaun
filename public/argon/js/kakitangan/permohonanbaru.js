var rowNum = 0;
var individu = "OT1";
var berkumpulan = "OT2";
var arr = []
$('#total_chq').val(0);
var edit = 0;
var last_chq_no = 0;
var div = document.getElementById("new_chq");
var nodelist = div.getElementsByTagName("div");
var idPermohonan = 0;
var reject = []
var totalhours= 0;
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var pegawai = []
var pegawaiID = []
var oncall;
var date = new Date(); 
var fulldate;

$('#divPermohonanIndividu').hide();
$('#divPermohonanBerkumpulan').hide();
$('#permohonanbaruModal').on('hide.bs.modal', function (e) {
    $(this)
    .find("input,textarea,select")
        .not("#namaPekerjaID")
        .not("#noPekerjaID")
        .not("#kpID")
        .not("#namaPekerjaBK")
        .not("#noKPBK")
        .not("#pegawaiSokongID")
        .not("#pegawaiLulusID")
        .not("#pegawaiSokongBK")
        .not("#pegawaiLulusBK")
        .val('')
        .end()
    .find("input[type=checkbox], input[type=radio]")
       .prop("checked", "")
       .end();
    for(i = 0; i < arr.length; i++){
        remove()
    }
    arr = []
})

$(function () {
    $("#jenisPermohonan").change(function () {
        if ($(this).val() == "frmPermohonanIndividu") {
            document.getElementById('modaldialog').className = "modal-dialog modal-dialog-scrollable modal-lg"
            document.getElementById('selectpermohonan').className = "col-sm-12"
            $('#divPermohonanIndividu').show();
            $("#divPermohonanBerkumpulan").hide();
        }
        else if ($(this).val() == "frmPermohonanBerkumpulan") {
            document.getElementById('modaldialog').className = "modal-dialog modal-dialog-scrollable modal-xl"
            document.getElementById('selectpermohonan').className = "col-sm-6"
            $('#divPermohonanIndividu').hide();
            $("#divPermohonanBerkumpulan").show();

        } else{
            $('#divPermohonanIndividu').hide();
            $('#divPermohonanBerkumpulan').hide();
        }

    });
});

$('#add').on('click', add);

// add another pekerja => Permohonan Berkumpulan
function add() {
    var div = document.getElementById("new_chq");
    var nodelist = div.getElementsByTagName("div");

    if(nodelist.length >= 0){
        rowNum++;

        $("#inputpekerja_00").clone().prop('id','inputpekerja_'+rowNum).appendTo("#new_chq");
        $("inputpekerja_"+rowNum).prop('class','inputpekerja');
        $("#buttonremove").attr("id","buttonremove_"+rowNum);
        $('#total_chq').val(rowNum);
        $("#submitBtnBK").prop('disabled',false)
    }
}

// remove a pekerja => Permohonan Berkumpulan
function remove() {
    if(nodelist.length > 0){
        last_chq_no = $('#total_chq').val();

        if (last_chq_no > 0) {
            $('#inputpekerja_' + last_chq_no).remove();
            rowNum--;
            var before = last_chq_no - 1;
            $('#total_chq').val(before);
        }
    }

    if(nodelist.length == 0){
        rowNum = 0;
        $('#total_chq').val(0);
    }
}

function buang(elementid){
    last_chq_no = $('#total_chq').val();
    var currNum = elementid.substring(13,14);

    if(edit == 1){
        reject.push($("#inputpekerja_"+ currNum).children()[0].children[0].children[1].value);
    }

    $('#inputpekerja_' + currNum).remove();
    var before = last_chq_no - 1;
    rowNum--;
    $('#total_chq').val(before);

    if(nodelist.length == 0){
        disableHantar();

        rowNum = 0;
        $('#total_chq').val(0);
    }
}

function disableHantar(){
    if ($('#new_chq').length != 0) {
        $("#submitBtnBK").prop('disabled',true)
    } 
}

$(document).ready(function(){
    initSelect();
    $('#pegawaiSokongID').change(function(e) {
        var selectVal = $('#pegawaiSokongID').val()

        if ($('#pegawaiSokongID').find("option[value='"+selectVal+"']").text() == $('#pegawaiLulusID').find("option[value='"+selectVal+"']").text()){
            $('#pegawaiLulusID option[disabled]').prop('disabled', false);
            $('#pegawaiLulusID').find("option[value='"+selectVal+"']").prop('disabled',true)
        }
    });

    $('#pegawaiSokongBK').change(function(e) {
        var selectVal = $('#pegawaiSokongBK').val()

        if ($('#pegawaiSokongBK').find("option[value='"+selectVal+"']").text() == $('#pegawaiLulusBK').find("option[value='"+selectVal+"']").text()){
            $('#pegawaiLulusBK option[disabled]').prop('disabled', false);
            $('#pegawaiLulusBK').find("option[value='"+selectVal+"']").prop('disabled',true)
        }
    });

    $('#pegawaiLulusID').change(function(e) {
        var selectVal = $('#pegawaiLulusID').val()

        if ($('#pegawaiLulusID').find("option[value='"+selectVal+"']").text() == $('#pegawaiSokongID').find("option[value='"+selectVal+"']").text()){

            $('#pegawaiSokongID option[disabled]').prop('disabled', false);
            $('#pegawaiSokongID').find("option[value='"+selectVal+"']").prop('disabled',true)
        }
    });

    $('#pegawaiLulusBK').change(function(e) {
        var selectVal = $('#pegawaiLulusBK').val()

        if ($('#pegawaiLulusBK').find("option[value='"+selectVal+"']").text() == $('#pegawaiSokongBK').find("option[value='"+selectVal+"']").text()){
            $('#pegawaiSokongBK option[disabled]').prop('disabled', false);
            $('#pegawaiSokongBK').find("option[value='"+selectVal+"']").prop('disabled',true)
        }
    });

    fillForm();
    getPegawai('', '');
    getIndividuDT();
    getBerkumpulanDT();
    datePickerInit();
    disableHantar();
})

function initSelect(){
    $("#pegawaiSokongID").select2({
        theme: 'bootstrap4',
        placeholder: "Pilih Pegawai Sokong",
    });

    $("#pegawaiLulusID").select2({
        theme: 'bootstrap4',
        placeholder: "Pilih Pegawai Lulus",
    });

    $("#pegawaiSokongBK").select2({
        theme: 'bootstrap4',
        placeholder: "Pilih Pegawai Sokong",
    });

    $("#pegawaiLulusBK").select2({
        theme: 'bootstrap4',
        placeholder: "Pilih Pegawai Lulus",
    });
    
    $('#pegawaiSokongID').trigger('change');
    $('#pegawaiSokongBK').trigger('change');
    $('#pegawaiLulusID').trigger('change');
    $('#pegawaiLulusBK').trigger('change');
}

function setEnableDropdown(){
    edit = 0;

    document.getElementById("jenisPermohonan").disabled = false;
    $("#jenisPermohonan").val("pilihan")
    document.getElementById('modaldialog').className = "modal-dialog modal-dialog-scrollable modal-lg"
    document.getElementById('selectpermohonan').className = "col-sm-12"
    $('#divPermohonanIndividu').hide();
    $('#divPermohonanBerkumpulan').hide();
    $("#permohonanbaruModal").modal("show");
    $(".modal-footer").show();
    if ($("#jenisPermohonan").val() == "frmPermohonanIndividu") {
        document.getElementById('modaldialog').className = "modal-dialog modal-dialog-scrollable modal-lg"
        document.getElementById('selectpermohonan').className = "col-sm-12"
        $('#divPermohonanIndividu').show();
        $("#divPermohonanBerkumpulan").hide();
        $("#permohonanbaruModal").modal("show");

    }
    else if ($("#jenisPermohonan").val() == "frmPermohonanBerkumpulan") {
        document.getElementById('modaldialog').className = "modal-dialog modal-dialog-scrollable modal-xl"
        document.getElementById('selectpermohonan').className = "col-sm-6"
        $('#divPermohonanIndividu').hide();
        $("#divPermohonanBerkumpulan").show();
        $("#pekerjaAddDiv").show();
        $("#permohonanbaruModal").modal("show");
    }
}

function getIndividuDT(){
    var id_user = document.querySelector("#noPekerja").value;

    var individuDT = $('#individuDT').DataTable({
        dom: 'lrtip',
        scrollX: false,
        destroy: true,
        "lengthMenu": [ 5, 10, 25, 50 ],
        processing: false,
        language: {
            paginate: {
                previous: "<",
                next: ">"
            },
            lengthMenu:     "Tunjuk _MENU_ rekod",
            search: "Carian:",
            zeroRecords:    "Tiada rekod yang sepadan dijumpai",
            emptyTable:     "Tiada rekod",
            info:           "_START_ ke _END_ daripada _TOTAL_ rekod",
            infoEmpty:      "0 ke 0 daripada 0 rekod",
            infoFiltered:   "(ditapis daripada _MAX_ rekod)",
            processing:     "Dalam proses...",
        },
        serverSide: true,
        // responsive:true,
        // autoWidth:false,
    ajax: {
        url: "permohonan-baru/get-permohonan/"+id_user,
        type: 'GET',
        data:
            {
                pilihan: individu
            }
        },
        
        columns: [
            {data: null},
            {data: 'created_at'},
            {data: 'status'},
            {data: 'progres'},
            {data: 'masa_mula'},
            {data: 'masa_akhir'},
            {data: 'masa'},
            {data: 'tujuan'},
            {data: null},
            {data: 'jenis_permohonan'},
            {data: 'id_permohonan_baru'},
            {data: 'permohonan_with_users.is_rejected_individually'}
        ],
        columnDefs: [
            {
                targets: 0,
                searchable: false,
                orderable: true,
            },
            {
                targets: 1,
                type: "date",
                orderable: true,
                render: function(data,type,row){
                    formattedDate = moment(data,"YYYY-MM-DD").format("DD-MM-YYYY")
                    return formattedDate;
                }
            },
            {
                targets: 2,
                render: function(data,type,row){
                    if(data == "DITERIMA"){
                        return '<div id="status" class="text-black badge badge-pill badge-success"  data-target="">'+data.toUpperCase()+'</div>' 
                    }
                    else if(data == "DITOLAK"){
                        return '<div id="status" class="text-black badge badge-pill badge-danger"  data-target="">'+data.toUpperCase()+'</div>' 
                    }
                    else if(data == "DALAM PROSES"){
                        return '<div id="status" class="text-black font-weight-bold badge badge-pill badge-info"  data-target="">'+data.toUpperCase()+'</div>' 
                    }
                    else if(data == "PERLU KEMASKINI"){
                        return '<div id="status" class="text-black badge badge-pill badge-warning"  data-target="">'+data.toUpperCase()+'</div>' 
                    }
                }
            },
            {
                targets: 3,
                render: function(data,type,row){
                    return '<div id="progres" class="text-black badge badge-pill badge-success"  data-target=""  >'+data.toUpperCase()+'</div>' 
                }
            },
            {
                targets: 8,
                mRender: function(data,type,row)
                {
                    if(row['jenis_permohonan'] == 'PS1' || row['progres'] == "Sah P1"){
                        var button2= '<i id="tolakBtn" data-toggle="modal" data-target="" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="deletePermohonanKT('+"'"+data.id_permohonan_baru+"'"+', '+ "'mohonBaruIndividu'"+')"></i>' 
                        var allButton = button2;
                        return allButton;

                    } else if(row['progres'] == "Belum disahkan" || row['status'] == "PERLU KEMASKINI"){
                        var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center" onclick="changeDataTarget('+"'"+data.jenis_permohonan+"'"+','+"'"+data.id_permohonan_baru+"'"+');"></i>'  
                        var button2= '<i id="tolakBtn" data-toggle="modal" data-target="" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="deletePermohonanKT('+"'"+data.id_permohonan_baru+"'"+', '+ "'mohonBaruIndividu'"+')"></i>' 
                        var allButton = button1 + button2;
                        return allButton;

                    }
                    else if(row['status'] == "DITOLAK" || "DALAM PROSES"){
                        var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center" onclick="changeDataTarget('+"'"+data.jenis_permohonan+"'"+','+"'"+data.id_permohonan_baru+"'"+');"></i>'  
                        var button2 = '<i id="tolakBtn" data-toggle="modal" data-target="" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="deletePermohonanKT('+"'"+data.id_permohonan_baru+"'"+', '+ "'mohonBaruIndividu'"+')"></i>' 
                        var allButton = button1 + button2;
                        return allButton;
                        
                    }
                    // else if(row['progres'] == "Sah P1" || row['progres'] == "Sah P2"){
                    //     var button1 = '<i id="tolakBtn" data-toggle="modal" data-target="" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="deletePermohonanKT('+"'"+data.id_permohonan_baru+"'"+', '+ "'mohonBaruIndividu'"+')"></i>' 
                    //     var allButton = button1 ;
                    //     return allButton;

                    // }
                }
                
            },
            {
                targets: 9,
                visible: false,
                searchable: true
            },
            {
                targets: 10,
                visible: false,
                searchable: true
            },
            {
                targets: 11,
                visible: false,
                searchable: true
            }
        ],

        order: [ 1, 'asc' ]
    });

    individuDT.on('draw.dt', function () {
        var info = individuDT.page.info();
        individuDT.column(0, { search: 'applied', order: 'applied', page: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1 + info.start;
        });
    }).draw();
}

function getBerkumpulanDT(){
    var id_user = document.querySelector("#noPekerja").value;
    var berkumpulanDT = $('#berkumpulanDT').DataTable({
        dom: 'lrtip',
        scrollX: false,
        destroy: true,
        "lengthMenu": [ 5, 10, 25, 50 ],
        processing: false,
        language: {
            paginate: {
                previous: "<",
                next: ">"
            },
            lengthMenu:     "Tunjuk _MENU_ rekod",
            search: "Carian:",
            zeroRecords:    "Tiada rekod yang sepadan dijumpai",
            emptyTable:     "Tiada rekod",
            info:           "_START_ ke _END_ daripada _TOTAL_ rekod",
            infoEmpty:      "0 ke 0 daripada 0 rekod",
            infoFiltered:   "(ditapis daripada _MAX_ rekod)",
            processing:     "Dalam proses...",
        },
        serverSide: true,
        // responsive:true,
        // autoWidth:false,
    ajax: {
        url: "permohonan-baru/get-permohonan/"+id_user,
        type: 'GET',
        data: {
                pilihan: berkumpulan
            }
        },
        columns: [

            {data: null, name: null},
            {data: 'created_at'},
            {data: 'status'},
            {data: 'progres'},
            {data: 'masa_mula'},
            {data: 'masa_akhir'},
            {data: 'masa'},
            {data: 'tujuan'},
            {data: null},
            {data: 'jenis_permohonan'},
            {data: 'id_permohonan_baru'},
            {data: 'permohonan_with_users.is_rejected_individually'}
        
        ],
        columnDefs: [
            {
                targets: 0,
                searchable: false,
                orderable: true,
            },
            {
                targets: [1],
                type: "date",
                render: function(data,type,row){
                    formattedDate = moment(data,"YYYY-MM-DD").format("DD-MM-YYYY")
                    return formattedDate;
                }
            },
            {
                targets: 2,
                render: function(data,type,row){
                    if(data == "DITERIMA"){
                        return '<div id="status" class="text-black badge badge-pill badge-success"  data-target=""  >'+data.toUpperCase()+'</div>' 
                    }
                    else if(data == "DITOLAK"){
                        return '<div id="status" class="text-black badge badge-pill badge-dangers"  data-target=""  >'+data.toUpperCase()+'</div>' 
                    }
                    else if(data == "DALAM PROSES"){
                        return '<div id="status" class="text-black badge badge-pill badge-info"  data-target=""  >'+data.toUpperCase()+'</div>' 
                    }
                    else if(data == "PERLU KEMASKINI"){
                        return '<div id="status" class="text-black badge badge-pill badge-warning"  data-target=""  >'+data.toUpperCase()+'</div>' 
                    }
                }
            },
            {
                targets: 3,
                render: function(data,type,row){
                    return '<div id="progres" class="text-black badge badge-pill badge-success"  data-target=""  >'+data.toUpperCase()+'</div>' 
                }
            },
            {
                targets: 8,
                mRender: function(data,type,row)
                {   
                    if(row['jenis_permohonan'] == 'PS1'){
                        var button2= '<i id="tolakBtn" data-toggle="modal" data-target="" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="deletePermohonanKT('+"'"+data.id_permohonan_baru+"'"+', '+ "'mohonBaruIndividu'"+')"></i>' 
                        var allButton = button2;
                        return allButton;

                    } else if(row['progres'] == "Belum disahkan" || row['status'] == "PERLU KEMASKINI"){
                        var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center" onclick="changeDataTarget('+"'"+data.jenis_permohonan+"'"+','+"'"+data.id_permohonan_baru+"'"+');"></i>'  
                        var button2= '<i id="tolakBtn" data-toggle="modal" data-target="" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="deletePermohonanKT('+"'"+data.id_permohonan_baru+"'"+', '+ "'mohonBaruIndividu'"+')"></i>' 
                        var allButton = button1 + button2;
                        return allButton;

                    }
                    else if(row['status'] == "DITOLAK" || "DALAM PROSES"){
                        var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center" onclick="changeDataTarget('+"'"+data.jenis_permohonan+"'"+','+"'"+data.id_permohonan_baru+"'"+');"></i>'  
                        var button2 = '<i id="tolakBtn" data-toggle="modal" data-target="" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="deletePermohonanKT('+"'"+data.id_permohonan_baru+"'"+', '+ "'mohonBaruIndividu'"+')"></i>' 
                        var allButton = button1 + button2;
                        return allButton;
                        
                    }
                    else if(row['progres'] == "Sah P1" || row['progres'] == "Sah P2"){
                        var button1 = '<i id="tolakBtn" data-toggle="modal" data-target="" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="deletePermohonanKT('+"'"+data.id_permohonan_baru+"'"+', '+ "'mohonBaruIndividu'"+')"></i>' 
                        var allButton = button1 ;
                        return allButton;

                    }
                }
            },
            {
                targets: 9,
                visible: false,
                searchable: true
            },
            {
                targets: 10,
                visible: false,
                searchable: true
            },
            {
                targets: 11,
                visible: false,
                searchable: true
            }
        ],
        order: [[ 1, 'asc' ]]
        
    });

    berkumpulanDT.on('draw.dt', function () {
        var info = berkumpulanDT.page.info();
        berkumpulanDT.column(0, { search: 'applied', order: 'applied', page: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1 + info.start;
        });
    }).draw();
}

function fillForm(){
    $departmentCode = $("#depcode").val();

    if ($departmentCode.length == 6){
        $departmentCode.toString()
        $department = $departmentCode.substring(0,1);
        $bahagian = $departmentCode.substring(2,4);
        $unit = $departmentCode.substring(5,6);
        $unit = ($unit < 10 ? '0' : '') + $unit
    } else{
        $departmentCode.toString()
        $department = $departmentCode.substring(0,1);
        $bahagian = $departmentCode.substring(1,3);
        $unit = $departmentCode.substring(4,6);
        $unit = ($unit < 10 ? '0' : '') + $unit
    }

    $("#bahagian").val($bahagian);
}

function datePickerInit(){
    var id_user = document.querySelector("#noPekerja").value;
    var year = date.getFullYear()
    var month = date.getMonth()
    var day = date.getDate()

    $.ajax({
        url: 'permohonan-baru/init-date',
        method: "POST",
        data:{ id_user:id_user },
        success: function(data) {
            if(data.user.is_oncall == 1){
                $('#tarikh-kerjaID').datepicker({
                    dateFormat: 'dd-mm-yy',
                    minDate: new Date(year,month,day),
                });

                $('#tarikh-kerjaBK').datepicker({
                    dateFormat: 'dd-mm-yy',
                    minDate: new Date(year,month,day),
                });

                $('#tarikh-akhir-kerjaID').datepicker({
                    dateFormat: 'dd-mm-yy',
                    minDate: new Date(year,month,day),
                });

                $('#tarikh-akhir-kerjaBK').datepicker({
                    dateFormat: 'dd-mm-yy',
                    minDate: new Date(year,month,day),
                });
            } else {
                day +=  7;

                $('#tarikh-kerjaID').datepicker({
                    dateFormat: 'dd-mm-yy',
                    minDate: new Date(year,month,day),
                });

                $('#tarikh-kerjaBK').datepicker({
                    dateFormat: 'dd-mm-yy',
                    minDate: new Date(year,month,day),
                });

                $('#tarikh-akhir-kerjaID').datepicker({
                    dateFormat: 'dd-mm-yy',
                    minDate: new Date(year,month,day),
                });

                $('#tarikh-akhir-kerjaBK').datepicker({
                    dateFormat: 'dd-mm-yy',
                    minDate: new Date(year,month,day),
                });
            }
        }
    })
    $.datepicker.setDefaults( $.datepicker.regional[ "ms" ] );
}

LocaleMS = {
    timeOnlyTitle: 'Pilih Masa',
	timeText: 'Masa',
	hourText: 'Jam',
	minuteText: 'Minit',
	secondText: 'Saat',
	currentText: 'Masa Kini',
	closeText: 'Tutup'
}
 
$('#masa-mulaBK').timepicker(
    LocaleMS
);

$('#masa-akhirBK').timepicker(
    LocaleMS
);

$('#masa-mulaID').timepicker(
    LocaleMS
);

$('#masa-akhirID').timepicker(
    LocaleMS
);

function closeModal(modal){
    $("#"+modal).modal("hide");
}