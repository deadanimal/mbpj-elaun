function retrieveUserData(id_user, id_permohonan_baru) {
    $.ajax({
        type: 'GET',
        url: 'penyelia-semakan/semakan-pekerja/' + id_user,
        success: function(data) {
            $("#formModalEditIndividu input[name=nama]").val(data.users.name);

            $('input').css('color', 'black')
        },
        error: function(data) {
            console.log(data);
        }
    });
    
    $.ajax({
        type: 'GET',
        url: 'penyelia-semakan/ekedatangan-semakan/' + id_user,
        success: function(data) {
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
            $("#formEkedatangan input[name=waktuAnjal]").val(data.ekedatangans.waktu_anjal);
        },
        error: function(data) {
            console.log(data);
        }
    });

    $.ajax({
        type: 'GET',
        url: 'penyelia-semakan/modal-semakan/' + id_permohonan_baru,
        success: function(data) {
            console.log(data.permohonans);
            $("#formModalEditIndividu input[name=tarikhMohon]").val(data.permohonans.tarikh_permohonan);

            // Kelulusan

            $("#formKelulusan input[name=penyelia]").val(data.penyelia.name);
            $("#formKelulusan input[name=ketuaBahagian]").val(data.ketuaBahagian.name);
            $("#formKelulusan input[name=ketuaJabatan]").val(data.ketuaJabatan.name);
            $("#formKelulusan input[name=keraniPemeriksa]").val(data.keraniPemeriksa.name);
            $("#formKelulusan input[name=keraniSemakan]").val(data.keraniSemakan.name);
        },
        error: function(data) {
            console.log(data);
        }
    });
}