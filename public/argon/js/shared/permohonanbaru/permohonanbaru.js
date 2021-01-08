$('#divPermohonanIndividu').hide();
$('#divPermohonanBerkumpulan').hide();

    $(function () {

        $("#jenisPermohonan").change(function () {
            if ($(this).val() == "frmPermohonanIndividu") {
                document.getElementById('modaldialog').className = "modal-dialog modal-lg"
                document.getElementById('selectpermohonan').className = "col-sm-12"
                $('#divPermohonanIndividu').show();
                $("#divPermohonanBerkumpulan").hide();

            }
            else if ($(this).val() == "frmPermohonanBerkumpulan") {
                document.getElementById('modaldialog').className = "modal-dialog modal-xl"
                document.getElementById('selectpermohonan').className = "col-sm-6"
                $('#divPermohonanIndividu').hide();
                $("#divPermohonanBerkumpulan").show();

            } else{
            $('#divPermohonanIndividu').hide();
            $('#divPermohonanBerkumpulan').hide();
    
            }
    
        });
    });

   