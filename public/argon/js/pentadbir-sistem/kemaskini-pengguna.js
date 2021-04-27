function kemaskiniPengguna(userID , name,  counter) {
    var role = $('#role'+counter).val();
    var is_active = $('#is_active'+counter).val();
    
    Swal.fire({
        icon: 'info',
        title: 'Kemaskini maklumat pengguna?',
        text: 'Mengemaskini maklumat '+ name,
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Setuju',
        cancelButtonText: 'Tutup'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire('Pengguna telah dikemaskini', '', 'success');

            $.ajax({
                url: 'kemaskini-pengguna/' + userID,
                type: 'PUT', 
                data: { 
                    role : role,
                    is_active : is_active
                },
                success: function() {
                    // showPengurusanPengguna(); 
                },
                error: function() { console.log('FAIL Kemaskini Pengguna'); } 
            });
            
        } else if (result.isDenied) { Swal.fire('', '', 'info') }        
    })
}