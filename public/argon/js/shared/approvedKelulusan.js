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
            approvedKelulusanAjax(id_permohonan_baru);

            showDatatable(pilihan);   

            Swal.fire(
                'Permohonan Diluluskan',
                'Sedang Diproses',
                'success'
            );
        } else if (result.isDenied) { 
            Swal.fire('', '', 'info') 
        }        
    })
}

function approvedKelulusanAjax(id_permohonan_baru) {
    $.ajax({
        url: "permohonan-baru/semakan-kelulusan/" + id_permohonan_baru,
        type: 'POST',
        success: function() {
            
        },
        error: function() {
            console.log('approval failed');
        } 
    });

}
