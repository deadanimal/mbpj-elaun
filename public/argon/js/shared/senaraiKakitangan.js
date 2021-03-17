function fillInSenaraiKakitangan(senaraiKakitangan, jenisPermohonan) {

    // Clear up senarai Kakitangan
    $("#senaraiKakitanganBerkumpulan").html("");

    senaraiKakitangan.forEach((element, index) => {
        var content = '<li>' +
                      '<div class="row">' +
                    //   '<div class="nav-item col-11" onclick="fillInKedatangan('+element.id+','+"'"+ jenisPermohonan +"'"+','+element.permohonan_with_users.id_permohonan_baru+')" role="presentation"><a class="nav-link" id="'+ element.id +'" data-toggle="pill" href="#" role="tab" aria-controls="test1" aria-selected="true">'+element.name+'</a></div>' +
                      '<div class="nav-item col-11" onclick="fillInKedatangan('+element['id']+','+"'"+ jenisPermohonan +"'"+','+element.permohonan_with_users.id_permohonan_baru+')" role="presentation"><a class="nav-link" id="'+ element.id +'" data-toggle="pill" href="#" role="tab" aria-controls="test1" aria-selected="true">'+element.name+'</a></div>' +
                      '<div class="col-1 align-self-center">' +
                      '<button type="button" onclick="rejectIndividually('+element.permohonan_with_users.id_permohonan_baru+','+element.id+','+ "'" + element.name + "'" +')" class="close"><span aria-hidden="true">×</span></button>' +
                      '</div>' +
                      '</div>' +
                      '</li>';
        $("#senaraiKakitanganBerkumpulan").append(content);
    });
}

function rejectIndividually(id_permohonan_baru, id_user, name_user) {

    Swal.fire({
        icon: 'info',
        title: 'Tolak Permohonan ' + name_user + '?',
        text: '',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText:
            'Tolak',
        cancelButtonText:
            'Tutup'
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
                error: function(data) {
                    console.log(data);
                    console.log('FAIL REJECT');
                } 
            });

          } else if (result.isDenied) {
            Swal.fire('', '', 'info')
          }        
      })
}