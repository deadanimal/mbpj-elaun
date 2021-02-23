var rowNum = 0;
var individu = "OT1";
var berkumpulan = "OT2";
$('#total_chq').val(0);
var last_chq_no = 0;
var div = document.getElementById("new_chq");
var nodelist = div.getElementsByTagName("div");
if(nodelist.length == 0){
    document.getElementById("remove").disabled = true
}
$('#divPermohonanIndividu').hide();
$('#divPermohonanBerkumpulan').hide();

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

    function editPermohonanForm(id){
        console.log('permohonanform',id)
    }

    // function lulusPermohonanForm(id){
    //     console.log('luluspermohonanform',id)
    // }

    function tolakPermohonanForm(id){
        console.log('permohonanform',id)
    }

$('#add').on('click', add);
$('#remove').on('click', remove);


function add() {

    var div = document.getElementById("new_chq");
    var nodelist = div.getElementsByTagName("div");
    if(nodelist.length >= 0){
        document.getElementById("remove").disabled = false
        rowNum++;

        // $("#total_chq").val(rowNum);
        $("#inputpekerja_00").clone().prop('id','inputpekerja_'+rowNum).appendTo("#new_chq");
        $("inputpekerja_"+rowNum).prop('class','inputpekerja');
        $('#total_chq').val(rowNum);
        
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
        document.getElementById("remove").disabled = true
        console.log("disable button buang")
    }
}


$(document).ready(function(){

    getIndividuDT();
    getBerkumpulanDT();


})

function setEnableDropdown(){
    document.getElementById("jenisPermohonan").disabled = false;
    $('#divPermohonanIndividu').hide();
    $('#divPermohonanBerkumpulan').hide();
    $("#permohonanbaruModal").modal("show");

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
        url: "permohonan-baru/"+id_user,
        type: 'GET',
        data:
        {
            pilihan: individu
        }
        },
        
        columns: [

            {data: null},
            {data: 'tarikh_permohonan'},
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
            {data: 'id_permohonan_baru'}
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
                    return '<div id="status" class="container text-white bg-success btn-sm "  data-target=""  >'+data.toUpperCase()+'</div>' 
                }
            },
            {
                targets: 3,
                render: function(data,type,row){
                    return '<div id="progres" class="container text-white bg-success btn-sm "  data-target=""  >'+data.toUpperCase()+'</div>' 
                }
            },
            {
                targets: 10,
                mRender: function(data,type,row)
                {
                    console.log(data.id_permohonan_baru);
                    var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center"  onclick="changeDataTarget('+"'"+data.jenis_permohonan+"'"+','+"'"+data.id_permohonan_baru+"'"+');"></i>'  
                    var button2= '<i id="tolakBtn" data-toggle="modal" data-target="" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="deletePermohonan('+"'"+data.id_permohonan_baru+"'"+');"></i>' 
                    var allButton = button1 + button2;
                    return allButton;
                }
                
            },
            {
                targets: 11,
                visible: false,
                searchable: true
            },
            {
                targets: 12,
                visible: false,
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
        url: "permohonan-baru/"+id_user,
        type: 'GET',
        data:
        {
            pilihan: berkumpulan
        }
        },
        
        columns: [

            {data: null, name: null},
            {data: 'tarikh_permohonan'},
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
            {data: 'id_permohonan_baru'}
        
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
                    return '<div id="status" class="container text-white bg-success btn-sm "  data-target=""  >'+data.toUpperCase()+'</div>' 
                }
            },
            {
                targets: 3,
                render: function(data,type,row){
                    return '<div id="progres" class="container text-white bg-success btn-sm "  data-target=""  >'+data.toUpperCase()+'</div>' 
                }
            },
            {
                targets: 10,
                mRender: function(data,type,row)
                {
                    var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center" onclick="changeDataTarget('+"'"+data.jenis_permohonan+"'"+','+"'"+data.id_permohonan_baru+"'"+');"></i>'  
                    var button2= '<i id="tolakBtn" data-toggle="modal" data-target="" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="deletePermohonan('+"'"+data.id_permohonan_baru+"'"+')"></i>' 
                    var allButton = button1 + button2;
                    return allButton;
                }
            },
            {
                targets: 11,
                visible: false,
                searchable: true
            },
            {
                targets: 12,
                visible: false,
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

$('.js-example-basic-single').select2();

$('#masa-mulaBK').timepicker();

$('#masa-akhirBK').timepicker();

$('#masa-mulaID').timepicker();

$('#masa-akhirID').timepicker();