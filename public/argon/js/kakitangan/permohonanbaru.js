

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
    if(nodelist.length < 20){
        document.getElementById("remove").disabled = false
        rowNum++;

        $("#total_chq").val(rowNum);
        $("#inputpekerja_00").clone().prop('id','inputpekerja_'+rowNum).appendTo("#new_chq");
        $('#total_chq').val(rowNum);
        
    }
    if(nodelist.length == 20){
        document.getElementById("add").disabled = true
        console.log("disable button tambah")
    }
    
   
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
        document.getElementById("add").disabled = false
        console.log("enable button tambah")

    }if(nodelist.length == 0){
        document.getElementById("remove").disabled = true
        console.log("disable button buang")
    }
}
