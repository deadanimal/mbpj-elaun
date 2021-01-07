$(document).ready(function(){

    $("#permohonanbaruModal").on("hidden.bs.modal", function(){
        $('#frmPermohonanBaru').trigger("reset");
        $("#frmPermohonanBaru .close").click();
    });

    $("#jenisPermohonan").on("change", function() {
        $("#" + $(this).val()).show().siblings().hide();
    })
    
})


function permohonanbaruForm(user_id) {
    $.ajax({
        type: 'GET',
        url: '/permohonan-baru/' + user_id,
        success: function(data) {
            $("#permohonanbaru-error-bag").hide();

            $('#permohonanbaruModal').modal('show');
        },
        error: function(data) {
            console.log(data);
        }
    });
}