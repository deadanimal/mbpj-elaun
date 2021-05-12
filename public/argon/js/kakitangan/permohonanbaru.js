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
    .find("input,textarea,select").not("#noPekerjaID").not("#kpID").not("#namaPekerjaBK")
       .val('')
       .end()
    .find("input[type=checkbox], input[type=radio]")
       .prop("checked", "")
       .end();
    for(i = 0; i < arr.length; i++){
        remove()
        console.log('test remove')
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
// $('#remove').on('click', remove);


function add() {

    var div = document.getElementById("new_chq");
    var nodelist = div.getElementsByTagName("div");
    if(nodelist.length >= 0){
        // document.getElementById("remove").disabled = false
        rowNum++;

        // $("#total_chq").val(rowNum);
        $("#inputpekerja_00").clone().prop('id','inputpekerja_'+rowNum).appendTo("#new_chq");
        $("inputpekerja_"+rowNum).prop('class','inputpekerja');
        $("#buttonremove").attr("id","buttonremove_"+rowNum);
        $('#total_chq').val(rowNum);
        $("#submitBtnBK").prop('disabled',false)

        
    }
    // if(nodelist.length == 20){
    //     document.getElementById("add").disabled = true
    //     console.log("disable button tambah")
    // }
    
   
    console.log(nodelist.length);
    
}

function remove() {
    

    if(nodelist.length > 0){
        last_chq_no = $('#total_chq').val();

        if (last_chq_no > 0) {
            $('#inputpekerja_' + last_chq_no).remove();
            rowNum--;
            var before = last_chq_no - 1;
            $('#total_chq').val(before);
        }
        // document.getElementById("add").disabled = false
        // console.log("enable button tambah")

    }
    if(nodelist.length == 0){
        rowNum = 0;
        $('#total_chq').val(0);
        // document.getElementById("remove").disabled = true
        console.log("disable button buang")
    }
}

function buang(elementid){
    last_chq_no = $('#total_chq').val();
    console.log(elementid);
    var currNum = elementid.substring(13,14);
    console.log(currNum)
    if(edit == 1){
        reject.push($("#inputpekerja_"+ currNum).children()[0].children[0].children[1].value);
    }
    $('#inputpekerja_' + currNum).remove();
    var before = last_chq_no - 1;
    rowNum--;
    $('#total_chq').val(before);
    console.log(rowNum)
    console.log(before)
    if(nodelist.length == 0){
    disableHantar();

        rowNum = 0;
        $('#total_chq').val(0);
        // document.getElementById("remove").disabled = true
        console.log("disable button buang")
    }
    console.log(reject);
}

function disableHantar(){
    if ($('#new_chq').length != 0) {
        console.log("check disable")
        $("#submitBtnBK").prop('disabled',true)
        } 
}

$(document).ready(function(){
    initSelect();
    $('#pegawaiSokongID').change(function(e) {
        var selectVal = $('#pegawaiSokongID').val()
        console.log($('#pegawaiLulusID').find("option[value='"+selectVal+"']").text())
        if ($('#pegawaiSokongID').find("option[value='"+selectVal+"']").text() == $('#pegawaiLulusID').find("option[value='"+selectVal+"']").text()){
            $('#pegawaiLulusID option[disabled]').prop('disabled', false);
            $('#pegawaiLulusID').find("option[value='"+selectVal+"']").prop('disabled',true)
        }
    
    });
    $('#pegawaiSokongBK').change(function(e) {
        var selectVal = $('#pegawaiSokongBK').val()
        console.log($('#pegawaiLulusBK').find("option[value='"+selectVal+"']").text())
        if ($('#pegawaiSokongBK').find("option[value='"+selectVal+"']").text() == $('#pegawaiLulusBK').find("option[value='"+selectVal+"']").text()){
            $('#pegawaiLulusBK option[disabled]').prop('disabled', false);
            $('#pegawaiLulusBK').find("option[value='"+selectVal+"']").prop('disabled',true)
        }
    
    });

    $('#pegawaiLulusID').change(function(e) {
        var selectVal = $('#pegawaiLulusID').val()
        console.log($('#pegawaiSokongID').find("option[value='"+selectVal+"']").text())
        if ($('#pegawaiLulusID').find("option[value='"+selectVal+"']").text() == $('#pegawaiSokongID').find("option[value='"+selectVal+"']").text()){
            $('#pegawaiSokongID option[disabled]').prop('disabled', false);
            $('#pegawaiSokongID').find("option[value='"+selectVal+"']").prop('disabled',true)
        }
    
    });
    $('#pegawaiLulusBK').change(function(e) {
        var selectVal = $('#pegawaiLulusBK').val()
        console.log($('#pegawaiSokongBK').find("option[value='"+selectVal+"']").text())
        if ($('#pegawaiLulusBK').find("option[value='"+selectVal+"']").text() == $('#pegawaiSokongBK').find("option[value='"+selectVal+"']").text()){
            $('#pegawaiSokongBK option[disabled]').prop('disabled', false);
            $('#pegawaiSokongBK').find("option[value='"+selectVal+"']").prop('disabled',true)
        }
    
    });
    fillForm();
    getPegawai();
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
    console.log(edit);  
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
            {data: 'hari'},
            {data: 'waktu'},
            {data: 'kadar_jam'},
            {data: 'tujuan'},
            {data: null},
            {data: 'jenis_permohonan'},
            {data: 'id_permohonan_baru'},
            {data: 'permohonan_with_users.is_rejected_individually'}
        ],
        columnDefs: [
            {
                searchable: false,
                orderable: false,
                targets: 0
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
                        // return '<div id="status" class="container text-white bg-success btn-sm "  data-target=""  >'+data.toUpperCase()+'</div>' 
                        return '<div id="status" class="container text-white badge badge-pill badge-success"  data-target="">'+data.toUpperCase()+'</div>' 
                    }
                    else if(data == "DITOLAK"){
                        // return '<div id="status" class="container text-white bg-danger btn-sm "  data-target=""  >'+data.toUpperCase()+'</div>' 
                        return '<div id="status" class="container text-white badge badge-pill badge-danger"  data-target="">'+data.toUpperCase()+'</div>' 
                    }
                    else if(data == "DALAM PROSES"){
                        return '<div id="status" class="container text-black font-weight-bold badge badge-pill badge-info"  data-target="">'+data.toUpperCase()+'</div>' 
                    }
                    else if(data == "PERLU KEMASKINI"){
                        return '<div id="status" class="container text-black badge badge-pill badge-warning"  data-target="">'+data.toUpperCase()+'</div>' 
                    }
                }
            },
            {
                targets: 3,
                render: function(data,type,row){
                    return '<div id="progres" class="container text-black badge badge-pill badge-success"  data-target=""  >'+data.toUpperCase()+'</div>' 
                }
            },
            {
                targets: 11,
                mRender: function(data,type,row)
                {
                    if(row['jenis_permohonan'] == 'PS1'){
                        console.log(data.id_permohonan_baru);
                        // var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center"  onclick="changeDataTarget('+"'"+data.jenis_permohonan+"'"+','+"'"+data.id_permohonan_baru+"'"+');"></i>'  
                        var button2= '<i id="tolakBtn" data-toggle="modal" data-target="" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="deletePermohonan('+"'"+data.id_permohonan_baru+"'"+');"></i>' 
                        var allButton = button2;
                        return allButton;
                    }else if(row['progres'] == "Belum sah" ||row['progres'] == "Belum disahkan" || row['status'] == "PERLU KEMASKINI"){
                        console.log(data.id_permohonan_baru);
                        var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center"  onclick="changeDataTarget('+"'"+data.jenis_permohonan+"'"+','+"'"+data.id_permohonan_baru+"'"+');"></i>'  
                        var button2= '<i id="tolakBtn" data-toggle="modal" data-target="" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="deletePermohonan('+"'"+data.id_permohonan_baru+"'"+');"></i>' 
                        var allButton = button1 + button2;
                        return allButton;
                    }
                    else if(row['status'] == "DITOLAK"){
                        var button1 = '<i id="tolakBtn" data-toggle="modal" data-target="" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="deletePermohonan('+"'"+data.id_permohonan_baru+"'"+');"></i>' 
                        var allButton = button1 ;
                        return allButton;
                    }
                    else if(row['progres'] == "Sah P1" || row['progres'] == "Sah P2"){
                        console.log('nothing here');
                        var button1 = '<i id="tolakBtn" data-toggle="modal" data-target="" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="deletePermohonan('+"'"+data.id_permohonan_baru+"'"+');"></i>' 
                        var allButton = button1 ;
                        return allButton;
                    }
                }
                
            },
            {
                targets: 12,
                visible: false,
                searchable: true
            },
            {
                targets: 13,
                visible: false,
                searchable: true
            },
            {
                targets: 14,
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
        data:
        {
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
            {data: 'hari'},
            {data: 'waktu'},
            {data: 'kadar_jam'},
            {data: 'tujuan'},
            {data: null},
            {data: 'jenis_permohonan'},
            {data: 'id_permohonan_baru'},
            {data: 'permohonan_with_users.is_rejected_individually'}
        
        ],
        columnDefs: [
            {
                searchable: false,
                orderable: false,
                targets: 0
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
                        return '<div id="status" class="container text-black badge badge-pill badge-success"  data-target=""  >'+data.toUpperCase()+'</div>' 
                    }
                    else if(data == "DITOLAK"){
                        return '<div id="status" class="container text-black badge badge-pill badge-dangers"  data-target=""  >'+data.toUpperCase()+'</div>' 
                    }
                    else if(data == "DALAM PROSES"){
                        return '<div id="status" class="container text-black badge badge-pill badge-info"  data-target=""  >'+data.toUpperCase()+'</div>' 
                    }
                    else if(data == "PERLU KEMASKINI"){
                        return '<div id="status" class="container text-black badge badge-pill badge-warning"  data-target=""  >'+data.toUpperCase()+'</div>' 
                    }
                }
                // {
                //     if(row['is_rejected_individually'] == '0' && data == 'DITERIMA'){
                //         return '<div id="status" class="container text-white text-center bg-success btn-sm "  data-target=""  >'+data.toUpperCase()+'</div>' 
                //     }else if(row['is_rejected_individually'] == '0' && data == 'DALAM PROSES'){
                //         return '<div id="status" class="container text-white text-center bg-info btn-sm "  data-target=""  >'+data.toUpperCase()+'</div>' 
                //     }else if(row['is_rejected_individually'] == '0' && data == "PERLU KEMASKINI"){
                //         return '<div id="status" class="container text-white text-center bg-warning btn-sm "  data-target=""  >'+data.toUpperCase()+'</div>' 
                //     }else if(row['is_rejected_individually'] == '1' || data == "BATAL"){
                //         return '<div id="status" class="container text-white text-center bg-danger btn-sm "  data-target=""  >'+data.toUpperCase()+'</div>' 
                //     }else if(row['is_rejected_individually'] == '1' || data == 'DITOLAK'){
                //         data = "DITOLAK"
                //         return '<div id="status" class="container text-white text-center bg-danger btn-sm "  data-target=""  >'+data.toUpperCase()+'</div>' 
                //     }
                // }
            },
            {
                targets: 3,
                render: function(data,type,row){
                    return '<div id="progres" class="container text-black badge badge-pill badge-success"  data-target=""  >'+data.toUpperCase()+'</div>' 
                }
            },
            {
                targets: 11,
                mRender: function(data,type,row)
                {   
                    if(row['permohonan_with_users[*].is_rejected_individually'] == "1"){
                        return '';
                    
                    }else if(row['progres'] == 'Sah P1' || row['progres'] == 'Sah P2' || row['jenis_permohonan'] == 'PS1'){
                        console.log(row['jenis_permohonan']);
                        var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center" onclick="event.preventDefault();changeDataTarget('+"'"+data.jenis_permohonan+"'"+','+"'"+data.id_permohonan_baru+"'"+');"></i>'  
                        // var button2= '<i id="tolakBtn" data-toggle="modal" data-target="" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="deletePermohonan('+"'"+data.id_permohonan_baru+"'"+')"></i>' 
                        var allButton = button1 ;
                        return allButton;
                    
                    }else{
                        var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center" onclick="event.preventDefault();changeDataTarget('+"'"+data.jenis_permohonan+"'"+','+"'"+data.id_permohonan_baru+"'"+');"></i>'  
                        var button2= '<i id="tolakBtn" data-toggle="modal" data-target="" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="deletePermohonan('+"'"+data.id_permohonan_baru+"'"+')"></i>' 
                        var allButton = button1 + button2;
                        return allButton;
                    }
                }
            },
            {
                targets: 12,
                visible: false,
                searchable: true
            },
            {
                targets: 13,
                visible: false,
                searchable: true
            },
            {
                targets: 14,
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

function getPegawai(){
    var id_user = document.querySelector("#noPekerja").value;
    var pegawaiDiv = document.getElementsByName('pegawaiSokongID')
    console.log(pegawaiDiv)
    $.ajax({
        url: 'permohonan-baru/pegawai/',
        type:'post',
        data:{ id_user:id_user },
        dataType: 'json',
        success: function(data){
            console.log(data.jabatans)
            console.log(data.pegawaiSokong)
            var pegawaiSokong = data.pegawaiSokong
            var pegawaiLulus = data.pegawaiLulus
            var jabatans = data.jabatans
            var jabatan;
            jabatans.forEach((element,index) => {
                jabatan = element.GE_KOD_JABATAN;
                var optgroup = "<optgroup label='"+element.GE_KETERANGAN_JABATAN+"'style='height:auto;'>"
                $('#pegawaiSokongID').append(optgroup)
                $('#pegawaiSokongBK').append(optgroup)
                $('#pegawaiLulusID').append(optgroup)
                $('#pegawaiLulusBK').append(optgroup)
                    pegawaiSokong.forEach((element,index) => {
                        if(element.DEPARTMENTCODE.length > 5 ){
                            var kodJabatan = element.DEPARTMENTCODE.substring(0,2) 
                        }else{
                            var kodJabatan = element.DEPARTMENTCODE.substring(0,1) 
                        }
                        if(kodJabatan == jabatan){
                            var option = "<option class='' value='"+element.CUSTOMERID+"'>"+element.NAME+"</option>"
                            $('#pegawaiSokongID').append(option)
                            $('#pegawaiSokongBK').append(option)
                        }
                    
                })
                    pegawaiLulus.forEach((element,index) => {
                        if(element.DEPARTMENTCODE.length > 5 ){
                            var kodJabatan = element.DEPARTMENTCODE.substring(0,2) 
                        }else{
                            var kodJabatan = element.DEPARTMENTCODE.substring(0,1) 
                        }
                        if(kodJabatan == jabatan){
                            var option = "<option value='"+element.CUSTOMERID+"'>"+element.NAME+"</option>"
                            $('#pegawaiLulusID').append(option)
                            $('#pegawaiLulusBK').append(option)
                        }
                    
                })

            })
        }
      })
}

function fillForm(){

    $departmentCode = $("#depcode").val();
    if($departmentCode.length == 6){
        console.log($departmentCode.length);
        $departmentCode.toString()
        $department = $departmentCode.substring(0,1);
        $bahagian = $departmentCode.substring(2,4);
        $unit = $departmentCode.substring(5,6);
        $unit = ($unit < 10 ? '0' : '') + $unit
        console.log('6')
    }else{
        $departmentCode.toString()
        $department = $departmentCode.substring(0,1);
        $bahagian = $departmentCode.substring(1,3);
        $unit = $departmentCode.substring(4,6);
        $unit = ($unit < 10 ? '0' : '') + $unit
        console.log('5')

    }

    $("#bahagian").val($bahagian);
    
    console.log($department,$bahagian,$unit)

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
            console.log(data)
            if(data.user.is_oncall == 1){
                console.log('sadsa',year,month,day);
                $('#tarikh-kerjaID').datepicker({
                    dateFormat: 'dd-mm-yy',
                    // minDate: new Date(2021,3,19),
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
            }else {
            console.log('dasd')
                day +=  7;
                console.log('sadsa',year,month,day);
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

$("#pegawaiSokongID").change(function(){
    console.log(this.value);
})
$("#pegawaiSokongBK").change(function(){
    console.log(this.value);
})
$("#pegawaiLulusID").change(function(){
    console.log(this.value);
})
$("#pegawaiLulusBK").change(function(){
    console.log(this.value);
})
// $('.js-example-basic-single').select2({
   
    
// });

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