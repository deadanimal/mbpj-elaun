function fillInKedatangan(idKakitangan, jenisPermohonan, id_permohonan_baru) {  
    let is_individu = jenisPermohonan[2] == 1 ? 'individu' : 'berkumpulan';

    // Clear up gaji
    $('input[name=gaji-'+is_individu+']').val(""); 
    $('input[name=tuntutanElaun-'+is_individu+']').val("");

    fillInMasaSebenar(idKakitangan, id_permohonan_baru, is_individu);
    fillInGaji(idKakitangan, id_permohonan_baru, is_individu);

    $.ajax({
        url: 'ekedatangan/semakan-ekedatangan/' + idKakitangan,
        type: 'GET',
        success: function(data) {
            let array =  ['PS', 'EL', 'KP', 'KS'];
            let jenisPermohonanShortened = jenisPermohonan.substr(0,2);

            if (data.ekedatangans === null) {
                noEkedatanganWithDefaultValue();
                return 0;
            }

            // eKedatangan
            if (array.includes(jenisPermohonanShortened)) {
                $("#formEkedatangan input[name=tarikh]").val(data.ekedatangans.tarikh);
                $("#formEkedatangan input[name=waktuMasuk]").val(data.ekedatangans.waktu_masuk);
                $("#formEkedatangan input[name=waktuKeluar]").val(data.ekedatangans.jumlah_waktu_kerja);
                $("#formEkedatangan input[name=jumlahWaktuKerja]").val(data.ekedatangans.jumlah_waktu_kerja);
                $("#formEkedatangan input[name=waktuMasukOT1]").val(data.ekedatangans.waktu_masuk_OT_1);
                $("#formEkedatangan input[name=waktuKeluarOT1]").val(data.ekedatangans.waktu_keluar_OT_1);
                $("#formEkedatangan input[name=jumlahOT1]").val(data.ekedatangans.jumlah_OT_1);
                $("#formEkedatangan input[name=waktuMasukOT2]").val(data.ekedatangans.waktu_masuk_OT_2);
                $("#formEkedatangan input[name=waktuKeluarOT2]").val(data.ekedatangans.waktu_keluar_OT_2);
                $("#formEkedatangan input[name=jumlahOT2]").val(data.ekedatangans.jumlah_OT_2);
                $("#formEkedatangan input[name=waktuMasukOT3]").val(data.ekedatangans.waktu_masuk_OT_3);
                $("#formEkedatangan input[name=waktuKeluarOT3]").val(data.ekedatangans.waktu_keluar_OT_3);
                $("#formEkedatangan input[name=jumlahOT3]").val(data.ekedatangans.jumlah_OT_3);
                $("#formEkedatangan input[name=jumlahOTKeseluruhan]").val(data.ekedatangans.jumlah_OT_keseluruhan);
                $("#formEkedatangan input[name=waktuAnjal]").val(data.ekedatangans.waktu_anjal);
            }  
        },
        error: function(data) { console.log(data); }
    });
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