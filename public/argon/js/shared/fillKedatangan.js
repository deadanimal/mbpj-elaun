function fillInKedatangan(idKakitangan, jenisPermohonan, id_permohonan_baru) {  

    $("#ekedatanganModalEL input[name=ekedatanganNama]").val('');
    $("#ekedatanganModalEL input[name=ekedatanganNoPekerja]").val('');

    fillInMasaSebenar(idKakitangan, id_permohonan_baru, jenisPermohonan);
    fillInGaji(idKakitangan, id_permohonan_baru, jenisPermohonan);

    $.ajax({
        url: 'ekedatangan/semakan-ekedatangan/' + idKakitangan,
        type: 'GET',
        success: function(data) {
            let array =  ['PS', 'EL', 'KP', 'KS'];
            let jenisPermohonanShortened = jenisPermohonan.substr(0,2);
      
            $("#ekedatanganModalEL input[name=ekedatanganNama]").val(data.user_name);
            $("#ekedatanganModalEL input[name=ekedatanganNoPekerja]").val(idKakitangan);

            if (array.includes(jenisPermohonanShortened)) {
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
}

function fillInMasaSebenar(idKakitangan, id_permohonan_baru, jenisPermohonan) {

    var is_individu = jenisPermohonan[2] == 1 ? 'individu' : 'berkumpulan';

    $.ajax({
        url: 'masa-sebenar/' + idKakitangan,
        type: 'GET',
        data: {
            id_permohonan_baru : id_permohonan_baru
        },
        success: function(data) {
            $('#formModalEdit input[name=masaMulaSebenar-'+is_individu+']').val(data.masa_mula_sebenar); 
            $('#formModalEdit input[name=masaAkhirSebenar-'+is_individu+']').val(data.masa_akhir_sebenar);

            // VALUE STORES THE ID OF USER FOR KEMASKINI
            document.getElementById('semakan-modal-'+is_individu+'-masaMulaSebenar').setAttribute("value", idKakitangan);
            document.getElementById('semakan-modal-'+is_individu+'-masaAkhirSebenar').setAttribute("value", id_permohonan_baru);
        },
        error: function(data) {
            console.log(data);
        }
    });
}

function fillInGaji(idKakitangan, id_permohonan_baru, jenisPermohonan) {

    var is_individu = jenisPermohonan[2] == 1 ? 'individu' : 'berkumpulan';

    $.ajax({
        url: 'tuntutan-elaun/' + idKakitangan,
        type: 'GET',
        data: {
            id_permohonan_baru : id_permohonan_baru
        },
        success: function(data) {
            const {error, gaji, jumlah_tuntutan_elaun} = data;

            console.log({gaji, jumlah_tuntutan_elaun});

            $('input[name=gaji-'+is_individu+']').val('RM '+gaji); 
            $('input[name=tuntutanElaun-'+is_individu+']').val('RM '+jumlah_tuntutan_elaun);
        },
        error: function(data) {
            console.log(data);
        }
    });
    
}