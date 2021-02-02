function retrieveUserData(id_user, id_permohonan_baru, jenisPermohonan) {

    // Clear up name and no pekerja for Elaun
    $("#ekedatanganModalEL input[name=ekedatanganNama]").val("");
    $("#ekedatanganModalEL input[name=ekedatanganNoPekerja]").val("");
    
    $.ajax({
        url: 'ketua-jabatan-semakan/semakan-pekerja/' + id_user,
        type: 'GET',
        success: function(data) {
            $("#formModalEditIndividu input[name=nama]").val(data.users.name);

            $('input').css('color', 'black')
        },
        error: function(data) {
            console.log(data);
        }
    });
   
    $.ajax({
        url: 'ketua-jabatan-semakan/semakan-permohonan/' + id_permohonan_baru,
        type: 'GET',
        success: function(data) {

            $("#formModalEditIndividu input[name=tarikhMohon]").val(data.permohonan.tarikh_permohonan);

            // Kelulusan
            if (data.permohonan.id_penyelia != '0') {
                $("#formKelulusan input[name=penyelia]").val(data.penyelia.name);
            } else {
                $("#formKelulusan input[name=penyelia]").val("");
                console.log("penyelia 0");
            }

            if (data.permohonan.id_ketua_bahagian != '0') {
                $("#formKelulusan input[name=ketuaBahagian]").val(data.ketuaBahagian.name);
                console.log("Kb not 0");
            } else {
                $("#formKelulusan input[name=ketuaBahagian]").val("");
                console.log("kb 0");
            }

            if (data.permohonan.id_ketua_jabatan != '0') {
                $("#formKelulusan input[name=ketuaJabatan]").val(data.ketuaJabatan.name);
                console.log("Kj not 0");
            } else {
                $("#formKelulusan input[name=ketuaJabatan]").val("");
                console.log("kj 0");
            }

            
            $("#formKelulusan input[name=keraniPemeriksa]").val(data.keraniPemeriksa.name);
            $("#formKelulusan input[name=keraniSemakan]").val(data.keraniSemakan.name);

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
                    fillInKedatangan(data.senaraiKakitangan[0], jenisPermohonan);
                    break;

                case "EL2":
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

function fillInSenaraiKakitangan(senaraiKakitangan, jenisPermohonan) {

    // Clear up senarai Kakitangan
    $("#senaraiKakitanganBerkumpulan").html("");

    senaraiKakitangan.forEach(element => {
        $(document).ready(function(){
            $.ajax({
                url: 'ketua-jabatan-semakan/semakan-pekerja/' + element,
                type: 'GET',
                success: function(data) {
                    $("#senaraiKakitanganBerkumpulan").append('<li class="nav-item mb-1" onclick="fillInKedatangan('+data.users.id+','+"'"+ jenisPermohonan +"'"+')" id="'+data.users.id+'" role="presentation"><a class="nav-link" data-bs-toggle="pill" href="#" role="tab" aria-controls="test1" aria-selected="true">'+data.users.name+'</a></li>');
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
        $(document).ready(function(){
            $("#senaraiKakitanganBerkumpulan").append('<li class="" role=""><a class="" id="" data-bs-toggle="" href="" role="" aria-controls="" aria-selected=""></a></li>');
        });   
    });
}

function fillInKedatangan(idKakitangan, jenisPermohonan) {    
    $.ajax({
        url: 'ketua-jabatan-semakan/semakan-ekedatangan/' + idKakitangan,
        type: 'GET',
        success: function(data) {
            $("#ekedatanganModalEL input[name=ekedatanganNama]").val(data.user_name);
            $("#ekedatanganModalEL input[name=ekedatanganNoPekerja]").val(idKakitangan);

            if (jenisPermohonan == "EL1" || jenisPermohonan == "EL2") {
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