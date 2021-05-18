function deletePermohonanKT(id_permohonan_baru, peringkat){
    Swal.fire({
        icon: 'info',
        title: 'Batal Permohonan?',
        text: '',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText:
            'Ya',
        cancelButtonText:
            'Tidak'
    }).then((result) => {
        if (result.isConfirmed) {
            deletePermohonanAJAXKT(id_permohonan_baru ,peringkat);

        } else if (result.isDenied) { 
            Swal.fire('', '', 'info') 
        }        
    })
}

function deletePermohonanAJAXKT(id_permohonan_baru ,peringkat) {
    $.ajax({
        url: 'permohonan-baru/delete-permohonan/' + id_permohonan_baru,
        type: 'put', 
        data:{
            id_permohonan_baru : id_permohonan_baru
        },
        success: function() {
            switch (peringkat) {
                case 'mohonBaruIndividu':
                    getIndividuDT();
                    break;
                case 'mohonBaruKumpulan':
                    getBerkumpulanDT();
                    break;
                case 'sah':
                    
                    break;
                case 'tuntutan':
                    showTuntutanDatatableKT();
                    break;
            }

            Swal.fire(
                'Permohonan telah dibatalkan',
                '',
                'success'
            );
        },
        error: function(data) {
            console.log(data);
        } 
    });
}