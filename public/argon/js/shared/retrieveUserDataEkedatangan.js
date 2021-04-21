function retrieveUserData(id_user, id_permohonan_baru, jenisPermohonan) {
    var is_individu = jenisPermohonan[2] == 1 ? 'individu' : 'berkumpulan';
    var jenisHariArrayCheckBox = new Array ('hariBiasa', 'hariRehat', 'hariAm');
    var kadarJamArrayCheckbox =  new Array (
                                                'hariBiasa-siang',
                                                'hariBiasa-malam',
                                                'hariRehat-siang',
                                                'hariRehat-malam',
                                                'hariAm-siang',
                                                'hariAm-malam'
                                            );
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
    var detailPermohonan = new Array (
                                        'tarikhMohon',
                                        'tarikhMulaKerja',
                                        'tarikhAkhirKerja',
                                        'masaMula',
                                        'masaAkhir',
                                        'tujuan',
                                        'lokasi',
                                        );

    // Clear up name and no pekerja for Elaun
    $("#ekedatanganModalEL input[name=ekedatanganNama]").val("");
    $("#ekedatanganModalEL input[name=ekedatanganNoPekerja]").val(""); 

    // Clear up Ekedatangan
    ekedatanganAttributes.forEach(att => {
        $("#formEkedatangan input[name="+att+"]").val("");
    });

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
    jenisHariArrayCheckBox.forEach(jenisKadar => {
        document.getElementById(jenisKadar).checked = false;
    });

    kadarJamArrayCheckbox.forEach(jenisKadar => {
        document.getElementById(jenisKadar).checked = false;
    });

    fillInUserDetail(id_user);
   
    $.ajax({
        url: 'permohonan-baru/semakan-permohonan/' + id_permohonan_baru,
        type: 'GET', 
        success: function(data) {
            var block_ekedatanganIndividu = document.getElementById("eKedatanganIndividu");
            var block_ekedatanganBerkumpulan = document.getElementById("eKedatanganBerkumpulan");

            // Kelulusan
            var array = ['peg_sokong', 'peg_pelulus', 'keraniPemeriksa', 'keraniSemakan'];
            array.forEach(function(item) {
                $("#formKelulusan input[name="+item+"]").val("-"); 
            });
 
            for (const [key, value] of Object.entries(data.arrayKelulusan)) {
                $("#formKelulusan input[name="+key+"]").val(value[0].NAME);
                $("#formKelulusan input[name=jawatan_"+key+"]").val(value[1]);
            }

            $('#formModalEdit input[name=tarikhMohon-'+is_individu+']').val(data.tarikh_permohonan);
            $('#formModalEdit input[name=tarikhMulaKerja-'+is_individu+']').val(data.permohonan.tarikh_mula_kerja);
            $('#formModalEdit input[name=tarikhAkhirKerja-'+is_individu+']').val(data.permohonan.tarikh_akhir_kerja);
            $('#formModalEdit input[name=masaMula-'+is_individu+']').val(data.permohonan.masa_mula);
            $('#formModalEdit input[name=masaAkhir-'+is_individu+']').val(data.permohonan.masa_akhir);
            $('#formModalEdit input[name=tujuan-'+is_individu+']').val(data.permohonan.tujuan);
            $('#formModalEdit input[name=lokasi-'+is_individu+']').val(data.permohonan.lokasi); 

            jenisHariArrayCheckBox.slice(0, jenisHariArrayCheckBox
                .findIndex(jenisHari => jenisHari == data.permohonan.jenis_hari))
                .forEach(jenisHari => {
                    let siangOrMalam = document.getElementById(jenisHari+'-siang').value == data.permohonan.kadar_jam ? '-siang' : '-malam';

                    document.getElementById(jenisHari).checked = true;
                    document.getElementById(jenisHari + siangOrMalam).checked = true;
                    document.getElementById(jenisHari+'Block').style.display = "block";
                });

            switch (jenisPermohonan) {
                case "OT1":
                    block_ekedatanganIndividu.style.display = "none";
                    fillInGaji(id_user, id_permohonan_baru, is_individu);
                    break;
                case "OT2":
                    block_ekedatanganBerkumpulan.style.display = "none";
                    fillInSenaraiKakitangan(data.senaraiKakitangan, jenisPermohonan);
                    break;
                case "EL1":
                    block_ekedatanganIndividu.style.display = "block";
                    fillInKedatangan(data.senaraiKakitangan[0].CUSTOMERID, jenisPermohonan, id_permohonan_baru);
                    break;
                case "EL2":
                    block_ekedatanganBerkumpulan.style.display = "block";
                    fillInSenaraiKakitangan(data.senaraiKakitangan, jenisPermohonan, id_permohonan_baru);
                    break;
                case "PS1":
                    block_ekedatanganIndividu.style.display = "block";
                    fillInKedatangan(data.senaraiKakitangan[0].CUSTOMERID, jenisPermohonan, id_permohonan_baru);
                    break;
                case "PS2":
                    block_ekedatanganBerkumpulan.style.display = "block";
                    fillInSenaraiKakitangan(data.senaraiKakitangan, jenisPermohonan, id_permohonan_baru);
                    break;
                case "KP1":
                    block_ekedatanganIndividu.style.display = "block";
                    fillInKedatangan(data.senaraiKakitangan[0].CUSTOMERID, jenisPermohonan, id_permohonan_baru);
                    break;
                case "KP2":
                    block_ekedatanganBerkumpulan.style.display = "block";
                    fillInSenaraiKakitangan(data.senaraiKakitangan, jenisPermohonan, id_permohonan_baru);
                    break;
                case "KS1":
                    block_ekedatanganIndividu.style.display = "block";
                    fillInKedatangan(data.senaraiKakitangan[0].id, jenisPermohonan, id_permohonan_baru);
                    break;
                case "KS2":
                    block_ekedatanganBerkumpulan.style.display = "block";
                    fillInSenaraiKakitangan(data.senaraiKakitangan, jenisPermohonan, id_permohonan_baru);
                    break;
                default:
                    break;
            }
        },
        error: function(data) { console.log(data); }
    });
}

function fillInUserDetail(id_user) {
    $.ajax({
        url: 'user/semakan-pekerja/' + id_user,

        type: 'GET', 
        success: function(data) {
            $("#formModalEdit input[name=nama]").val(data.users.NAME);
            $("#formModalEdit input[name=noKP]").val(data.users.NIRC);

            $('input').css('color', 'black')
        },
        error: function(data) {
            console.log(data);
        } 
    });
}