function saveIDforKelulusan(id_permohonan_baru) {
    
    $.ajax({
        url: "ketua-jabatan-semakan/semakan-kelulusan/" + id_permohonan_baru,
        type: 'POST',
        success: function() {
            console.log('updated');
        },
        error: function() {
            console.log('failed');
        }
    });
}