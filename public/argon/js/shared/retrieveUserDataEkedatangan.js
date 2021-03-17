function retrieveUserData(id_user, id_permohonan_baru, jenisPermohonan) {

    var is_individu = jenisPermohonan[2] == 1 ? 'individu' : 'berkumpulan';

    // Clear up name and no pekerja for Elaun
    $("#ekedatanganModalEL input[name=ekedatanganNama]").val("");
    $("#ekedatanganModalEL input[name=ekedatanganNoPekerja]").val(""); 

    // Clear up Ekedatangan
    $("#formEkedatangan input[name=tarikh]").val("");
    $("#formEkedatangan input[name=waktuMasuk]").val("");
    $("#formEkedatangan input[name=waktuKeluar]").val("");
    $("#formEkedatangan input[name=jumlahWaktuKerja]").val("");
    $("#formEkedatangan input[name=waktuMasukOT1]").val("");
    $("#formEkedatangan input[name=waktuKeluarOT1]").val("");
    $("#formEkedatangan input[name=jumlahOT1]").val("");
    $("#formEkedatangan input[name=waktuMasukOT2]").val("");
    $("#formEkedatangan input[name=waktuKeluarOT2]").val("");
    $("#formEkedatangan input[name=jumlahOT2]").val("");
    $("#formEkedatangan input[name=waktuMasukOT3]").val("");
    $("#formEkedatangan input[name=waktuKeluarOT3]").val("");
    $("#formEkedatangan input[name=jumlahOT3]").val("");
    $("#formEkedatangan input[name=jumlahOTKeseluruhan]").val("");
    $("#formEkedatangan input[name=waktuAnjal]").val("");

    // Clear up detail permohonan
    $('#formModalEdit input[name=tarikhMohon-'+is_individu+']').val("");
    $('#formModalEdit input[name=tarikhMulaKerja-'+is_individu+']').val("");
    $('#formModalEdit input[name=tarikhAkhirKerja-'+is_individu+']').val("");
    $('#formModalEdit input[name=masaMula-'+is_individu+']').val("");
    $('#formModalEdit input[name=masaAkhir-'+is_individu+']').val("");
    $('#formModalEdit input[name=tujuan-'+is_individu+']').val("");
    $('#formModalEdit input[name=lokasi-'+is_individu+']').val(""); 

    // Clear up masa sebenar
    $('#formModalEdit input[name=masaMulaSebenar-'+is_individu+']').val(""); 
    $('#formModalEdit input[name=masaAkhirSebenar-'+is_individu+']').val(""); 

    // Clear up gaji
    $('input[name=gaji-'+is_individu+']').val(''); 
    $('input[name=tuntutanElaun-'+is_individu+']').val('');

    $.ajax({
        url: 'user/semakan-pekerja/' + id_user,
        type: 'GET', 
        success: function(data) {
            $("#formModalEdit input[name=nama]").val(data.users.name);

            $('input').css('color', 'black')
        },
        error: function(data) {
            console.log(data);
        } 
    });
   
    $.ajax({
        url: 'permohonan-baru/semakan-permohonan/' + id_permohonan_baru,
        type: 'GET', 
        success: function(data) {
            $('#formModalEdit input[name=tarikhMohon-'+is_individu+']').val(data.tarikh_permohonan);
            $('#formModalEdit input[name=tarikhMulaKerja-'+is_individu+']').val(data.permohonan.tarikh_mula_kerja);
            $('#formModalEdit input[name=tarikhAkhirKerja-'+is_individu+']').val(data.permohonan.tarikh_akhir_kerja);
            $('#formModalEdit input[name=masaMula-'+is_individu+']').val(data.permohonan.masa_mula);
            $('#formModalEdit input[name=masaAkhir-'+is_individu+']').val(data.permohonan.masa_akhir);
            $('#formModalEdit input[name=tujuan-'+is_individu+']').val(data.permohonan.tujuan);
            $('#formModalEdit input[name=lokasi-'+is_individu+']').val(data.permohonan.lokasi); 

            // Kelulusan
            var array = ['peg_sokong', 'peg_pelulus', 'keraniPemeriksa', 'keraniSemakan'];
            array.forEach(function(item) {
                $("#formKelulusan input[name="+item+"]").val("-"); 
            });
 
            for (const [key, value] of Object.entries(data.arrayKelulusan)) {
                $("#formKelulusan input[name="+key+"]").val(value.name);
            }

            var block_ekedatanganIndividu = document.getElementById("eKedatanganIndividu");
            var block_ekedatanganBerkumpulan = document.getElementById("eKedatanganBerkumpulan");

            switch (jenisPermohonan) {
                case "OT1":
                    block_ekedatanganIndividu.style.display = "none";
                    break;

                case "OT2":
                    block_ekedatanganBerkumpulan.style.display = "none";
                    fillInSenaraiKakitangan(data.senaraiKakitangan, jenisPermohonan);
                    break;

                case "EL1":
                    block_ekedatanganIndividu.style.display = "block";
                    fillInKedatangan(data.senaraiKakitangan[0].id, jenisPermohonan, id_permohonan_baru);
                    break;

                case "EL2":
                    block_ekedatanganBerkumpulan.style.display = "block";
                    fillInSenaraiKakitangan(data.senaraiKakitangan, jenisPermohonan, id_permohonan_baru);
                    break;

                case "PS1":
                    block_ekedatanganIndividu.style.display = "block";
                    fillInKedatangan(data.senaraiKakitangan[0].id, jenisPermohonan, id_permohonan_baru);
                    break;

                case "PS2":
                    block_ekedatanganBerkumpulan.style.display = "block";
                    fillInSenaraiKakitangan(data.senaraiKakitangan, jenisPermohonan, id_permohonan_baru);
                    break;
                
                case "KP1":
                    block_ekedatanganIndividu.style.display = "block";
                    fillInKedatangan(data.senaraiKakitangan[0].id, jenisPermohonan, id_permohonan_baru);
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
        error: function(data) {
            console.log(data);
        }
    });
}