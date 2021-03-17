function kemaskiniModal(jenisPermohonan) {
    var is_individu = jenisPermohonan == 'individu' ? 'individu' : 'berkumpulan';
    var id_permohonan_baru = document.getElementById('semakan-modal-'+is_individu+'-masaAkhirSebenar').getAttribute("value");

    $.ajax({
        url: 'permohonan-baru/kemaskini/' + id_permohonan_baru,
        type: 'PUT', 
        data: {
            id_user : document.getElementById('semakan-modal-'+is_individu+'-masaMulaSebenar').getAttribute("value"),
            masa_mula_sebenar : document.getElementById('semakan-modal-'+is_individu+'-masaMulaSebenar').value,
            masa_akhir_sebenar : document.getElementById('semakan-modal-'+is_individu+'-masaAkhirSebenar').value
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