function fillInKedatangan(idKakitangan, jenisPermohonan, id_permohonan_baru) {  

    $("#ekedatanganModalEL input[name=ekedatanganNama]").val('');
    $("#ekedatanganModalEL input[name=ekedatanganNoPekerja]").val('');

    $.ajax({
        url: 'ekedatangan/semakan-ekedatangan/' + idKakitangan,
        type: 'GET',
        success: function(data) {
            let array =  ["EL1", "EL2", "PS1", "PS2"];
            $("#ekedatanganModalEL input[name=ekedatanganNama]").val(data.user_name);
            $("#ekedatanganModalEL input[name=ekedatanganNoPekerja]").val(idKakitangan);

            if (array.includes(jenisPermohonan)) {
                // eKedatangan
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
        error: function(data) {
            console.log(data);
        }
    });

    $.ajax({
        url: 'masa-sebenar/' + idKakitangan,
        type: 'GET',
        data: {
            id_permohonan_baru : id_permohonan_baru
        },
        success: function(data) {
            console.log(data);
            $("#formModalEdit input[name=masaMulaSebenar]").val(data.masa_mula_sebenar); 
            $("#formModalEdit input[name=masaAkhirSebenar]").val(data.masa_akhir_sebenar); 
        },
        error: function(data) {
            console.log(data);
        }
    });
}