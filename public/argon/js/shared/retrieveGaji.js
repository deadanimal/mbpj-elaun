function fillInGaji(idKakitangan, id_permohonan_baru, is_individu) {    
    $.ajax({
        url: 'tuntutan-elaun/' + idKakitangan,
        type: 'GET',
        data: {
            id_permohonan_baru : id_permohonan_baru
        },
        success: function(data) {
            let {error, gaji, jumlah_tuntutan_elaun} = data;

            $('input[name=gaji-'+is_individu+']').val('RM '+gaji); 
            $('input[name=tuntutanElaun-'+is_individu+']').val('RM '+jumlah_tuntutan_elaun);
        },
        error: function(data) { console.log(data); }
    });
}