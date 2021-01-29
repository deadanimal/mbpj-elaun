function saveIDforKelulusan(id_authenticated_user, id_permohonan_baru) {
    console.log("In saveIDforKelulusan");
    
    $.ajax({
        url: "penyelia-semakan/semakan-kelulusan/" + id_authenticated_user,
        // type: 'PUT',
        // type: 'PATCH',
        // type: 'GET',
        type: 'POST',
        data: {
            id_permohonan_baru : id_permohonan_baru
        },
        success: function() {
            console.log('updated');
        },
        error: function() {
            console.log('failed');
        }
    });
}