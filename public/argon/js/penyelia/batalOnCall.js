function batalOnCall(idUser) {
    Swal.fire({
        icon: 'info',
        title: 'Batal On Call?',
        text: '',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Setuju',
        cancelButtonText: 'Tutup'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire('Kakitangan DiBatalkan On Call', '', 'success');

            $.ajax({
                url: 'batal-on-call/' + idUser,
                type: 'put', 
                success: function() {
                    showAllUser();
                },
                error: function() { console.log('FAIL BATAL ONCALL'); } 
            });
            
        } else if (result.isDenied) { Swal.fire('', '', 'info') }        
    })
}