function fillInKedatangan(idKakitangan, jenisPermohonan, id_permohonan_baru) {  
    let is_individu = jenisPermohonan[2] == 1 ? 'individu' : 'berkumpulan';
    
    // Clear up gaji
    $('input[name=gaji-'+is_individu+']').val(""); 
    $('input[name=tuntutanElaun-'+is_individu+']').val("");

    fillInMasaSebenar(idKakitangan, id_permohonan_baru, is_individu);
    fillInGaji(idKakitangan, id_permohonan_baru, is_individu);
    fillInEkedatangan(idKakitangan, jenisPermohonan, id_permohonan_baru)
}

function fillInMasaSebenar(idKakitangan, id_permohonan_baru, is_individu) {
    $.ajax({
        url: 'masa-sebenar/' + idKakitangan,
        type: 'GET',
        data: {
            id_permohonan_baru : id_permohonan_baru
        },
        success: function(data) {
            let {error, masa_mula_sebenar, masa_akhir_sebenar} = data;

            $('#formModalEdit input[name=masaMulaSebenar-'+is_individu+']').val(masa_mula_sebenar); 
            $('#formModalEdit input[name=masaAkhirSebenar-'+is_individu+']').val(masa_akhir_sebenar);

            // USER_ID AND ID_PERMOHONAN ARE STORED IN THE VALUE ATTRIBUTE
            document.getElementById('semakan-modal-'+is_individu+'-masaMulaSebenar').setAttribute("value", idKakitangan);
            document.getElementById('semakan-modal-'+is_individu+'-masaAkhirSebenar').setAttribute("value", id_permohonan_baru);
        },
        error: function(data) { console.log(data); }
    });
}