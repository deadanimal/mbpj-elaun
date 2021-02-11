function approvedKelulusan(id_permohonan_baru) {
    
    $.ajax({
        url: "permohonan-baru/semakan-kelulusan/" + id_permohonan_baru,
        type: 'POST',
        success: function() {
            console.log('Approved');
        },
        error: function() {
            console.log('failed');
        } 
    });
}