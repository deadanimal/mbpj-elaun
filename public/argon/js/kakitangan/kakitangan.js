$('#permohonan').show();
$('#tuntutan').hide();
$('#lulus').hide();
$('#tolak').hide();

    $(function () {

        $("#jenisTable").change(function () {
            if ($(this).val() == "permohonanan") {
                $('#permohonan').show();
                $("#tuntutan").hide();
                $('#lulus').hide();
                $('#tolak').hide();
            }
            else if ($(this).val() == "tuntutan") {
                $('#permohonan').hide();
                $("#tuntutan").show();
                $('#lulus').hide();
                $('#tolak').hide();

            }else if ($(this).val() == "lulus") {
                $('#permohonan').hide();
                $("#tuntutan").hide();
                $('#lulus').show();
                $('#tolak').hide();

            }else if ($(this).val() == "tolak") {
                $('#permohonan').hide();
                $("#tuntutan").hide();
                $('#lulus').hide();
                $('#tolak').show();

            }else{
            $('#datatable').hide();
            $('#datatable2').hide();
            $('#lulus').hide();
            $('#tolak').hide(); 
    
            }
    
        });
    });