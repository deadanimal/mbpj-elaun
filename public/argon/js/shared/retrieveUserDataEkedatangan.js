var jenisHariArrayCheckBox = new Array ('hariBiasa', 'hariRehat', 'hariAm');

function retrieveUserData(id_user, id_permohonan_baru, jenisPermohonan) {
    var is_individu = jenisPermohonan[2] == 1 ? 'individu' : 'berkumpulan';
    var kadarJamArrayCheckbox =  new Array (
                                                'hariBiasa-siang',
                                                'hariBiasa-malam',
                                                'hariRehat-siang',
                                                'hariRehat-malam',
                                                'hariAm-siang',
                                                'hariAm-malam'
                                            );
    var detailPermohonan = new Array (
                                        'tarikhMohon',
                                        'tarikhMulaKerja',
                                        'tarikhAkhirKerja',
                                        'masaMula',
                                        'masaAkhir',
                                        'tujuan',
                                        'lokasi',
                                        );

    // Clear up Ekedatangan
    noEkedatanganWithDefaultValue();

    // Clear up detail permohonan
    detailPermohonan.forEach(att => {
        $('#formModalEdit input[name='+att+'-'+is_individu+']').val("");
    });

    // Clear up masa sebenar
    $('#formModalEdit input[name=masaMulaSebenar-'+is_individu+']').val(""); 
    $('#formModalEdit input[name=masaAkhirSebenar-'+is_individu+']').val(""); 

    // Clear up gaji
    $('input[name=gaji-'+is_individu+']').val(""); 
    $('input[name=tuntutanElaun-'+is_individu+']').val("");

    // Clear up kadar Jam
    jenisHariArrayCheckBox.forEach(jenisHari => {
        document.getElementById(jenisHari).checked = false;
        document.getElementById(jenisHari+'Block').style.display = "none";
    });

    kadarJamArrayCheckbox.forEach(jenisKadar => {
        document.getElementById(jenisKadar).checked = false;
    });

    fillInUserDetail(id_user);
   
    $.ajax({
        url: 'permohonan-baru/semakan-permohonan/' + id_permohonan_baru,
        type: 'GET', 
        success: function(data) {
            fillInKelulusan(data.arrayKelulusan);
            fillInDetailPermohonan(data.permohonan, data.tarikh_permohonan, is_individu);
            fillInKadarJam(data.permohonan.kadar_jam, data.permohonan.jenis_hari);

            switch (jenisPermohonan) {
                case "OT1":
                    fillInGaji(id_user, id_permohonan_baru, is_individu);
                    break;
                case "OT2":
                    fillInSenaraiKakitangan(data.senaraiKakitangan, jenisPermohonan);
                    break;
                case "EL1":
                case "PS1":
                case "KP1":
                case "KS1":
                    fillInKedatangan(data.senaraiKakitangan[0].CUSTOMERID, jenisPermohonan, id_permohonan_baru);
                    break;
                case "EL2":
                case "PS2":
                case "KP2":
                case "KS2":
                    fillInSenaraiKakitangan(data.senaraiKakitangan, jenisPermohonan, id_permohonan_baru);
                    break;
            }
        },
        error: function(data) { console.log(data); }
    });
}

function  fillInDetailPermohonan(permohonan, tarikh_permohonan, is_individu) {
    let tarikh_mula_kerja = moment(permohonan.tarikh_mula_kerja, "YYYY-MM-DD").format("DD-MM-YYYY");
    let tarikh_akhir_kerja = moment(permohonan.tarikh_akhir_kerja, "YYYY-MM-DD").format("DD-MM-YYYY");

    $('#formModalEdit input[name=tarikhMohon-'+is_individu+']').val(tarikh_permohonan);
    $('#formModalEdit input[name=tarikhMulaKerja-'+is_individu+']').val(tarikh_mula_kerja);
    $('#formModalEdit input[name=tarikhAkhirKerja-'+is_individu+']').val(tarikh_akhir_kerja);
    $('#formModalEdit input[name=masaMula-'+is_individu+']').val(permohonan.masa_mula);
    $('#formModalEdit input[name=masaAkhir-'+is_individu+']').val(permohonan.masa_akhir);
    $('#detailPermohananAccordion input[name=lokasi-'+is_individu+']').val(permohonan.lokasi); 
    document.getElementById('semakan-modal-individu-tujuan').value = permohonan.tujuan;

    $('input').css('color', 'black');
    $('textarea').css('color', 'black');
}

function fillInKelulusan(arrayKelulusan) {
    var array = ['peg_sokong', 'peg_pelulus', 'keraniPemeriksa', 'keraniSemakan'];

    array.forEach(function(item) {
        $("#formKelulusan input[name="+item+"]").val("-"); 
    });

    for (const [key, value] of Object.entries(arrayKelulusan)) {
        $("#formKelulusan input[name="+key+"]").val(value[0].NAME);
        $("#formKelulusan input[name=jawatan_"+key+"]").val(value[1]);
    }

    $('input').css('color', 'black');
}

function fillInKadarJam(kadar_jam, saved_jenis_hari) {
    jenisHariArrayCheckBox.forEach(jenisHari => {
        let siangOrMalam = document.getElementById(jenisHari+'-siang').value == kadar_jam ? '-siang' : '-malam';

        if (jenisHari == saved_jenis_hari) {
            document.getElementById(jenisHari).checked = true;
            document.getElementById(jenisHari + siangOrMalam).checked = true;
            document.getElementById(jenisHari+'Block').style.display = "block";
        } else {
            document.getElementById(jenisHari).checked = false;
            document.getElementById(jenisHari + siangOrMalam).checked = false;
            document.getElementById(jenisHari+'Block').style.display = "none";
        }
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

function fillInUserDetail(id_user) {
    $.ajax({
        url: 'user/semakan-pekerja/' + id_user,

        type: 'GET', 
        success: function(data) {
            $("#formModalEdit input[name=nama]").val(data.user.NAME);
            $("#formModalEdit input[name=noKP]").val(data.user.NIRC);
            $("#formModalEdit input[name=noPekerja]").val(data.user.CUSTOMERID);

            $('input').css('color', 'black')
        },
        error: function(data) {
            console.log(data);
        } 
    });
}