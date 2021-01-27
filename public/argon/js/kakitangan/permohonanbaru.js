

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

    $('#datatable').dataTable({
        "lengthMenu": [ 5, 10, 25, 50 ]
    });

    $('#datatable1').dataTable({
        "lengthMenu": [ 5, 10, 25, 50 ]
    });


$('#add').on('click', add);
$('#remove').on('click', remove);

var rowNum = 0;

function add() {

    var div = document.getElementById("new_chq");
    var nodelist = div.getElementsByTagName("div");
    if(nodelist.length > -1){
        document.getElementById("remove").disabled = false
        rowNum++;

        $("#total_chq").val(rowNum);
        $("#inputpekerja_00").clone().prop('id','inputpekerja_'+rowNum).appendTo("#new_chq");
        $('#total_chq').val(rowNum);
        
    }
    // if(nodelist.length == 20){
    //     document.getElementById("add").disabled = true
    //     console.log("disable button tambah")
    // }
    
   
    console.log(nodelist.length);
    
}

function remove() {
    var div = document.getElementById("new_chq");
    var nodelist = div.getElementsByTagName("div");

    if(nodelist.length <= 20){
        var last_chq_no = $('#total_chq').val();

        if (last_chq_no > 0) {
            $('#inputpekerja_' + last_chq_no).remove();
            $('#total_chq').val(last_chq_no - 1);
        }
        // document.getElementById("add").disabled = false
        // console.log("enable button tambah")

    }
    // if(nodelist.length == 0){
    //     document.getElementById("remove").disabled = true
    //     console.log("disable button buang")
    // }
}

table = $('#permohonanbaruDT').DataTable({
    scrollX: false,
    destroy: true,
    "lengthMenu": [ 5, 10, 25, 50 ],
    processing: true,
    serverSide: true,
    // responsive:true,
    // autoWidth:false,
ajax: {
    url: "permohonan-baru/",
    type: 'GET',
    },
    
    columns: [

        {data: 'id', name: 'id'},

        {data: null , name: null, searchable:false},

        {data: null, name: null, searchable:false},

        {data: null, name: null, searchable:false},

        {data: 'created_at', name: 'created_at'},

        {data: null , name: null, searchable:false},

        {data: null , name: null, searchable:false},
        
        {data: 'status', name: 'status'},

        {data: null , name: null, searchable:false},

        {data: null , name: null, searchable:false},

        // {data: null, name: null},

       
    ],
    columnDefs: [
        {
            targets: 1,
            render:function(data,type,row){
                return "<span>12/1/2020</span>"
            }
        },
        {
            targets: 2,
            render:function(data,type,row){
                return "<span>2.30 PM</span>"
            }
        },
        {
            targets: 3,
            render:function(data,type,row){
                return "<span>5.30 PM</span>"
            }
        },
        // {
        //     type: "html-input",
        //     targets: 4,
        //     render:function(data,type,row){
        //         return moment(data).format("DD/MM/YYYY")
        //     }
        // },
        {
            targets: 5,
            render:function(data,type,row){
                return "<span>Selasa</span>"
            }
        },
        {
            targets: 6,
            render:function(data,type,row){
                return "<span>Petang</span>"
            }
        },
        {
            targets: 8,
            render:function(data,type,row){
                return "<span>Before</span>"
            }
        },
        {
            targets: 9,
            render: function(data,type,row){
                console.log(data.id);
                var button1 = '<i data-toggle="modal" id="buttonEdit" class="btn btn-primary btn-sm ni ni-align-center" onclick="changeDataTarget('+data.id+')" data-target=""  ></i>' 
                var button2 = '<i id="lulusBtn" data-toggle="modal" data-target="#modal-notification" class="btn btn-success btn-sm ni ni-check-bold" onclick="test('+data.id+')" value='+data.id+'></i>' 
                var button3 = '<i id="tolakBtn" data-toggle="modal" data-target="#modal-reject" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="test('+data.id+')"  value='+data.id+'></i>' 
                var allButton = button1 + button2 + button3;
                return allButton;
                // var button1 = $("<i></i>",{
                //     "id": "button1",
                //     "value":data.id,
                //     "type": "button",
                //     "onclick":test(data.id),
                //     "class": "btn btn-primary btn-sm ni ni-align-center"
                // });
                // var button2 = $("<i></i>",{
                //     "id":  "button2",
                //     "value":data.id,
                //     "type": "button",
                //     "onclick":test(data.id),
                //     "class": "btn btn-primary btn-sm ni ni-align-center"
                // });
                // var button3 = $("<i></i>",{
                //     "id": "button3",
                //     "value":data.id,
                //     "type": "button",
                //     "onclick":test(data.id),
                //     "class": "btn btn-primary btn-sm ni ni-align-center"
                // });
                
                
                // return button1.prop("outerHTML");
            }
        }
    ],
    
});

$.fn.dataTableExt.ofnSearch['html-input'] = function(value) {
    return $(value).val();
};

$('.js-example-basic-single').select2();