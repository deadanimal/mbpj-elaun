function fillInEkedatangan(idKakitangan, jenisPermohonan, id_permohonan_baru) {
    $.ajax({
        url: 'ekedatangan/semakan-ekedatangan/' + idKakitangan,
        type: 'GET',
        data: { 
            id_permohonan_baru : id_permohonan_baru
        },
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

function noEkedatanganWithDefaultValue() {
    var ekedatanganAttributes = new Array (
        'tarikh',
        'waktuMasuk',
        'waktuKeluar',
        'jumlahWaktuKerja',
        'waktuMasukOT1',
        'waktuKeluarOT1',
        'jumlahOT1',
        'waktuMasukOT2',
        'waktuKeluarOT2',
        'jumlahOT2',
        'waktuMasukOT3',
        'waktuKeluarOT3',
        'jumlahOT3',
        'jumlahOTKeseluruhan',
        'waktuAnjal'
    );

    ekedatanganAttributes.forEach(att => {
        $("#formEkedatangan input[name="+att+"]").val("N/A");
    });
}