function approvedKelulusan(id_permohonan_baru, pilihan) {
    Swal.fire({
        icon: 'info',
        title: 'Luluskan Permohonan?',
        text: '',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText:
            'Ya',
        cancelButtonText:
            'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            approvedKelulusanAjax(id_permohonan_baru, pilihan);
        } else if (result.isDenied) { 
            Swal.fire('', '', 'info') 
        }        
    })
}

function approvedKelulusanAjax(id_permohonan_baru, pilihan) {
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