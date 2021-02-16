function approvedKelulusan(id_permohonan_baru, pilihan) {
    
    $.ajax({
        url: "permohonan-baru/semakan-kelulusan/" + id_permohonan_baru,
        type: 'POST',
        success: function() {
            console.log('Approved');
            showDatatable(pilihan);
        },
        error: function() {
            console.log('failed');
        } 
    });
}