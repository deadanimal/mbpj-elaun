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

$('#divPermohonanIndividu').hide();
$('#divPermohonanBerkumpulan').hide();
$('#permohonanbaruModal').on('hide.bs.modal', function (e) {
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

    getPegawai();
    getIndividuDT();
    getBerkumpulanDT();
    disableHantar();
})

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
            {data: 'permohonan_with_users[*].is_rejected_individually'}
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
                        return '<div id="status" class="container text-white bg-success btn-sm "  data-target=""  >'+data.toUpperCase()+'</div>' 
                    }
                    else if(data == "DITOLAK"){
                        return '<div id="status" class="container text-white bg-danger btn-sm "  data-target=""  >'+data.toUpperCase()+'</div>' 
                    }
                    else if(data == "DALAM PROSES"){
                        return '<div id="status" class="container text-white bg-info btn-sm "  data-target=""  >'+data.toUpperCase()+'</div>' 
                    }
                    else if(data == "PERLU KEMASKINI"){
                        return '<div id="status" class="container text-white bg-warning btn-sm "  data-target=""  >'+data.toUpperCase()+'</div>' 
                    }
                }
            },
            {
                targets: 3,
                render: function(data,type,row){
                    return '<div id="progres" class="container text-white bg-success btn-sm "  data-target=""  >'+data.toUpperCase()+'</div>' 
                }
            },
            {
                targets: 11,
                mRender: function(data,type,row)
                {
                    if(row['progres'] == "Belum sah" || row['status'] == "PERLU KEMASKINI"){
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
                visible: true,
                searchable: true
            }
        ],
        order: [ 1, 'asc' ]
        
    });
    individuDT.on( 'order.dt search.dt', function () {
        individuDT.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
    
}

function getBerkumpulanDT(){
    var id_user = document.querySelector("#noPekerja").value;
    var berkumpulanDT = $('#berkumpulanDT').DataTable({
        dom: 'lrtip',
        scrollX: false,
        destroy: true,
        "lengthMenu": [ 5, 10, 25, 50 ],
        processing: false,
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
            {data: 'tarikh_mula_kerja'},
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
            {data: 'is_rejected_individually'}
        
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
                    formattedDate = moment(data).format("DD/MM/YYYY")
                    return formattedDate;
                }
            },
            {
                targets: 2,
                render: function(data,type,row){
                    if(row['is_rejected_individually'] == '0' && data == 'DITERIMA'){
                        return '<div id="status" class="container text-white text-center bg-success btn-sm "  data-target=""  >'+data.toUpperCase()+'</div>' 
                    }else if(row['is_rejected_individually'] == '0' && data == 'DALAM PROSES'){
                        return '<div id="status" class="container text-white text-center bg-info btn-sm "  data-target=""  >'+data.toUpperCase()+'</div>' 
                    }else if(row['is_rejected_individually'] == '0' && data == "PERLU KEMASKINI"){
                        return '<div id="status" class="container text-white text-center bg-warning btn-sm "  data-target=""  >'+data.toUpperCase()+'</div>' 
                    }else if(row['is_rejected_individually'] == '1' || data == "BATAL"){
                        return '<div id="status" class="container text-white text-center bg-danger btn-sm "  data-target=""  >'+data.toUpperCase()+'</div>' 
                    }else if(row['is_rejected_individually'] == '1' || data == 'DITOLAK'){
                        data = "DITOLAK"
                        return '<div id="status" class="container text-white text-center bg-danger btn-sm "  data-target=""  >'+data.toUpperCase()+'</div>' 
                    }
                }
            },
            {
                targets: 3,
                render: function(data,type,row){
                    return '<div id="progres" class="container text-white bg-success btn-sm "  data-target=""  >'+data.toUpperCase()+'</div>' 
                }
            },
            {
                targets: 11,
                mRender: function(data,type,row)
                {   
                    if(row['is_rejected_individually'] == "1"){
                        return '';
                    
                    }else if(row['progres'] == 'Sah P1' || row['progres'] == 'Sah P2'){
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
                visible: true,
                searchable: true
            }
        ],
        order: [[ 1, 'asc' ]]
        
    });
    berkumpulanDT.on( 'order.dt search.dt', function () {
        berkumpulanDT.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
}

function getPegawai(){
    var pegawaiDiv = document.getElementsByName('pegawaiSokongID')
    console.log(pegawaiDiv)
    $.ajax({
        url: 'permohonan-baru/pegawai/',
        type:'post',
        dataType: 'json',
        success: function(data){
            console.log(data.pegawaiSokong)
            var pegawaiSokong = data.pegawaiSokong
            var pegawaiLulus = data.pegawaiLulus
            pegawaiSokong.forEach((element,index) => {
                var option = "<option value='"+element.CUSTOMERID+"'>"+element.NAME+"</option>"
                $('#pegawaiSokongID').append(option)
                $('#pegawaiSokongBK').append(option)
            })
            pegawaiLulus.forEach((element,index) => {
                var option = "<option value='"+element.CUSTOMERID+"'>"+element.NAME+"</option>"
                $('#pegawaiLulusID').append(option)
                $('#pegawaiLulusBK').append(option)
            })
        }
      })
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

$('#tarikh-kerjaID').datepicker({
    dateFormat: 'dd / mm / yy',
});
$('#tarikh-kerjaBK').datepicker({
    dateFormat: 'dd / mm / yy',
});
$('#tarikh-akhir-kerjaID').datepicker({
    dateFormat: 'dd / mm / yy',
});
$('#tarikh-akhir-kerjaBK').datepicker({
    dateFormat: 'dd / mm / yy',
});

$('#masa-mulaBK').timepicker();

$('#masa-akhirBK').timepicker();

$('#masa-mulaID').timepicker();

$('#masa-akhirID').timepicker();