

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

            }else{
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

   