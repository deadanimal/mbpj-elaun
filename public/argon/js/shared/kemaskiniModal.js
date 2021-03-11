function kemaskiniModal() {

    $.ajax({
        url: 'permohonan-baru/kemaskini/' + id_permohonan_baru,
        type: 'PUT', 
        data: {
            id_user : id_user
        },
        success: function() {
            document.getElementById(id_user).setAttribute("class", "nav-link disabled");
            Swal.fire({
                icon: 'error',
                title: 'Permohonan Ditolak',
                text: 'Permohonan ' + name_user + ' tidak memenuhi kriteria',
                confirmButtonText : 'Tutup'
            })

        },
        error: function(data) {
            console.log(data);
            console.log('FAIL REJECT');
        } 
    });
    
}