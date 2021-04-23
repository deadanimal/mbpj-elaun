function kemaskiniModal(jenisPermohonan) {
    Swal.fire({
        icon: 'info',
        title: 'Kemaskini Permohonan?',
        text: '',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText:
            'Ya',
        cancelButtonText:
            'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            kemaskiniPermohonanAjax(jenisPermohonan);
        } else if (result.isDenied) { 
            Swal.fire('', '', 'info') 
        }        
    })
}

function kemaskiniPermohonanAjax(jenisPermohonan) {
    var is_individu = jenisPermohonan == 'individu' ? 'individu' : 'berkumpulan';
    var id_permohonan_baru = document.getElementById('semakan-modal-'+is_individu+'-masaAkhirSebenar').getAttribute("value");

    $.ajax({
        url: 'permohonan-baru/kemaskini/' + id_permohonan_baru,
        type: 'PUT', 
        data: {
            id_user : document.getElementById('semakan-modal-'+is_individu+'-masaMulaSebenar').getAttribute("value"),
            masa_mula_sebenar : document.getElementById('semakan-modal-'+is_individu+'-masaMulaSebenar').value,
            masa_akhir_sebenar : document.getElementById('semakan-modal-'+is_individu+'-masaAkhirSebenar').value,
            kadar_jam : retrieveKadarJam()
        },
        success: function() {
            Swal.fire({
                icon: 'success',
                title: 'Kemaskini Berjaya',
                text: 'Permohonan Dikemaskini',
                confirmButtonText : 'Tutup'
            })
        },
        error: function() { console.log('Fail kemaskini masa'); } 
    });
}

function retrieveKadarJam() {
    var jenisHariArray = ['hariBiasa', 'hariRehat', 'hariAm'];
    var kadarJam;
    var jenisHariSelected; 
    
    jenisHariArray.forEach(hari => {
        if (document.getElementById(hari).checked) {
            jenisHariSelected = hari;
        }
    });

    if (document.getElementById(jenisHariSelected+'-siang').checked) {
        return kadarJam = document.getElementById(jenisHariSelected+'-siang').value;
    } else {
        return kadarJam = document.getElementById(jenisHariSelected+'-malam').value;
    }
}