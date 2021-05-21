$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function changeDataTargetSemakan(id_permohonan_baru, jenisPermohonanKT, jenisPermohonan){
    var id_user = parseInt($("#noPekerjaB1").val());

    $.ajax({
        url: 'semakan/semak-permohonan/' + id_permohonan_baru,
        type: 'GET', 
        data:{
            id_permohonan_baru : id_permohonan_baru,
            jenisPermohonanKT : jenisPermohonanKT,
            jenisPermohonan : jenisPermohonan
        },
        success: function(data) {
            var tarikhMula = moment(data.permohonan.tarikh_mula_kerja,'DD-MM-YYYY').format('DD-MM-YYYY')
            var tarikhAkhir = moment(data.permohonan.tarikh_akhir_kerja,'DD-MM-YYYY').format('DD-MM-YYYY')

            $("#borangB1Modal input[name=tarikhKerjaMula]").val(tarikhMula);
            $("#borangB1Modal input[name=tarikhKerjaAkhir]").val(tarikhAkhir);
            $("#borangB1Modal input[name=masaMula]").val(data.permohonan.masa_mula);
            $("#borangB1Modal input[name=masaAkhir]").val(data.permohonan.masa_akhir);
            $("#borangB1Modal input[name=jenisPermohonanKT]").val(data.permohonan.jenis_permohonan_kakitangan);
            $("#borangB1Modal input[name=jenisPermohonanReal]").val(data.permohonan.jenis_permohonan);
            $("#borangB1Modal textarea[id=tujuan]").val(data.permohonan.tujuan);
            $("#borangB1Modal textarea[id=lokasiB1]").val(data.permohonan.lokasi);
            $("#borangB1Modal input[name=idPermohonan]").val(data.permohonan.id_permohonan_baru);
            $("#borangB1Modal input[id=semakan-modal-individu-masaAkhirSebenar]").attr('value',data.permohonan.id_permohonan_baru);

            $("#permohonanbaruModal textarea[name=masaMulaSebenar-individu]").val(data.masa_mula_sebenar);
            $("#permohonanbaruModal textarea[name=masaAkhirSebenar-individu]").val(data.masa_akhir_sebenar);

            getPegawai(data.permohonan.id_peg_sokong, data.permohonan.id_peg_pelulus);

            if(data.permohonan.kadar_jam == '1.125'){
                $("#borangB1Modal input[id=inlineJamRadio1]").prop("checked",true);

            }else if(data.permohonan.kadar_jam == '1.25'){
                $("#borangB1Modal input[id=inlineJamRadio2]").prop("checked",true);

            }
            if(data.permohonan.waktu  == 'Pagi'){
                $("#borangB1Modal input[id=inlineRadiobox1]").prop("checked",true);
            }else if(data.permohonan.waktu  == 'Petang'){
                $("#borangB1Modal input[id=inlineRadiobox2]").prop("checked",true);

            }else if(data.permohonan.waktu  == 'Malam'){
                $("#borangB1Modal input[id=inlineRadiobox3]").prop("checked",true);

            }

            fillInEkedatanganKT(id_user , data.permohonan.id_permohonan_baru)

            $("#borangB1Modal").modal("show");
            
            $('input').css('color', 'black');
            $('textarea' ).css('color', 'black');

            // set value of #buttonHantarPengesahan to current id_permohonan_baru
            $("#buttonHantarPengesahan").attr("value", data.permohonan.id_permohonan_baru); 
        },
        error: function(data) {
            console.log(data);
        } 
    });
}

function deletePermohonan(id_permohonan_baru){
    $.ajax({
        url: 'semakan/delete-permohonan/' + id_permohonan_baru,
        type: 'put', 
        data:{
            id_permohonan_baru : id_permohonan_baru
        },
        success: function() {
            showSemakanDatatableKT();
        },
        error: function(data) {
            console.log(data);
        } 
    });
}

function hantarPengesahan(){
    var id_permohonan_baru = $('#buttonHantarPengesahan').attr('value');
    var tarikhMula = moment($("#borangB1Modal input[name=tarikhKerjaMula]").val(),"DD-MM-YYYY").format("DD-MM-YYYY",true);
    var tarikhAkhir = $("#borangB1Modal input[name=tarikhKerjaAkhir]").val();
    var masaMula = $("#borangB1Modal input[name=masaMula]").val();
    var masaAkhir = $("#borangB1Modal input[name=masaAkhir]").val();
    var masaMulaSebenar = $("#borangB1Modal input[name=masaMulaSebenar-individu]").val();
    var masaAkhirSebenar = $("#borangB1Modal input[name=masaAkhirSebenar-individu]").val();
    var jenisPermohonanKT = $("#borangB1Modal input[name=jenisPermohonanKT]").val();
    var jenisPermohonanReal = $("#borangB1Modal input[name=jenisPermohonanReal]").val();
    var tujuan = $("#borangB1Modal textarea[name=tujuan]").val();
    var lokasi = $("#borangB1Modal textarea[name=lokasiB1]").val();

    $.ajax({
        url: 'semakan/hantar-permohonan/' + id_permohonan_baru,
        type: 'put', 
        data:{
            tarikh_permohonan : tarikhMula,
            tarikh_akhir_kerja : tarikhAkhir,
            masa_mula : masaMula,
            masa_akhir : masaAkhir,
            masa_mula_sebenar : masaMulaSebenar,
            masa_akhir_sebenar : masaAkhirSebenar,
            tujuan : tujuan,
            lokasi : lokasi,
            jenis_permohonan_kakitangan : jenisPermohonanKT,
            jenis_permohonan : jenisPermohonanReal,
        },
        success: function() {
            $("#borangB1Modal").modal("hide");

            Swal.fire(  
                'Dihantar untuk Pengesahan!',
                'Klik butang dibawah untuk tutup!',
                'success'
                )
                
            showSemakanDatatableKT();
        },
        error: function(data) {
            console.log(data);
        } 
    });
}

function timeStringToMins(s) {
    s = s.split(':');
    s[0] = /m$/i.test(s[1]) && s[0] == 12? 0 : s[0];
    return s[0]*60 + parseInt(s[1]) + (/pm$/i.test(s[1])? 720 : 0);
    }

  function getTimeDifference(t0, t1) {

    // Small helper function to padd single digits
    function z(n){return (n<10?'0':'') + n;}
  
    // Get difference in minutes
    var diff = timeStringToMins(t1) - timeStringToMins(t0);
  
    // Format difference as hh:mm and return
    return   z(diff/60 | 0) + z(diff % 60); 
}

function saveMasa(){
    var id_user = document.querySelector("#nopekerja").value;
    var id_permohonan_baru = $("#borangB1Modal input[name=idPermohonan]").val();
    var waktuMasuk = $("#borangB1Modal input[name=tarikhKerjaMula]").val()
    var waktuKeluar = $("#borangB1Modal input[name=tarikhKerjaAkhir]").val()
    var mulaKerja = $("#borangB1Modal input[name=masaMula]").val()
    var akhirKerja = $("#borangB1Modal input[name=masaAkhir]").val()
    $.ajax({
        url:'semakan/masa-sebenar/' + id_user,
        type:'put',
        data:{
            id_permohonan_baru:id_permohonan_baru,
            waktuMasuk:waktuMasuk,
            waktuKeluar:waktuKeluar,
            mulaKerja:mulaKerja,
            akhirKerja:akhirKerja
        }, success: function(data) {
            hantarPengesahan(id_user,id_permohonan_baru)
        },
        error: function(data) {
            console.log(data);
            return 0;
        } 
    })
}