function retrieveUserData(id_user, id_permohonan_baru, jenisPermohonan) {

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
            $("#formModalEdit input[name=tarikhMohon]").val(data.tarikh_permohonan);
            $("#formModalEdit input[name=tarikhMulaKerja]").val(data.permohonan.tarikh_mula_kerja);
            $("#formModalEdit input[name=tarikhAkhirKerja]").val(data.permohonan.tarikh_akhir_kerja);
            $("#formModalEdit input[name=masaMula]").val(data.permohonan.masa_mula);
            $("#formModalEdit input[name=masaAkhir]").val(data.permohonan.masa_akhir);
            $("#formModalEdit input[name=tujuan]").val(data.permohonan.tujuan);
            $("#formModalEdit input[name=lokasi]").val(data.permohonan.lokasi); 

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
                    fillInKedatangan(data.senaraiKakitangan[0].id, jenisPermohonan);
                    break;

                case "EL2":
                    block_ekedatanganBerkumpulan.style.display = "block";
                    fillInSenaraiKakitangan(data.senaraiKakitangan, jenisPermohonan);
                    break;

                case "PS1":
                    block_ekedatanganIndividu.style.display = "block";
                    fillInKedatangan(data.senaraiKakitangan[0].id, jenisPermohonan);
                    break;

                case "PS2":
                    block_ekedatanganBerkumpulan.style.display = "block";
                    fillInSenaraiKakitangan(data.senaraiKakitangan, jenisPermohonan);
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