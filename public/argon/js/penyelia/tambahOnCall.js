function tambahOnCall(idUser) {
    
    Swal.fire({
        icon: 'info',
        title: 'Tambah ke On Call?',
        text: '',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Setuju',
        cancelButtonText: 'Tutup'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire('Kakitangan DiTambah ke On Call', '', 'success');
            console.log({idUser});

            $.ajax({
                url: 'tambah-on-call/' + idUser,
                type: 'put', 
                success: function() {
                    showAllUser();
                },
                error: function() { console.log('FAIL ONCALL'); } 
            });
            
        } else if (result.isDenied) { Swal.fire('', '', 'info') }        
    })
}