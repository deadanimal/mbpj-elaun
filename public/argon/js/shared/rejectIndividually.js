function rejectIndividually(id_permohonan_baru, id_user, name_user) {
    Swal.fire({
        icon: 'info',
        title: 'Tolak Permohonan ' + name_user + '?',
        text: '',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Tolak',
        cancelButtonText: 'Tutup'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire('Permohonan Ditolak', '', 'success');

            $.ajax({
                url: 'permohonan-baru/tolak-kakitangan/' + id_permohonan_baru,
                type: 'PUT', 
                data: {
                    id_user : id_user
                },
                success: function() {
                    document.getElementById(id_user).setAttribute("class", "nav-link disabled");
                },
                error: function() { console.log('FAIL REJECT'); } 
            });
          } else if (result.isDenied) { Swal.fire('', '', 'info') }        
      })
}