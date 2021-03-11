function approvedKelulusan(id_permohonan_baru, pilihan) {
    
    $.ajax({
        url: "permohonan-baru/semakan-kelulusan/" + id_permohonan_baru,
        type: 'POST',
        success: function() {
            console.log('Approved');

            Swal.fire(
                'Permohonan Diluluskan',
                'Sedang Diproses',
                'success'
            );

            showDatatable(pilihan);
        },
        error: function() {
            console.log('failed');
        } 
    });
}