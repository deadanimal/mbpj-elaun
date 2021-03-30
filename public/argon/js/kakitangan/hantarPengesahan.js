$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function changeDataTarget(id_permohonan_baru,jenisPermohonanKT,jenisPermohonan){

    $.ajax({
        url: 'semakan/hantar-permohonan/' + id_permohonan_baru,
        type: 'GET', 
        data:{
            id_permohonan_baru : id_permohonan_baru,
            jenisPermohonanKT : jenisPermohonanKT,
            jenisPermohonan : jenisPermohonan
        },
        success: function(data) {
            $("#borangB1Modal input[name=tarikhKerjaMula]").val(data.permohonan.tarikh_mula_kerja);
            $("#borangB1Modal input[name=tarikhKerjaMula]").val(data.permohonan.tarikh_mula_kerja);
            $("#borangB1Modal input[name=masaMula]").val(data.permohonan.masa_mula);
            $("#borangB1Modal input[name=masaAkhir]").val(data.permohonan.masa_akhir);
            $("#borangB1Modal input[name=jenisPermohonanKT]").val(data.permohonan.jenis_permohonan_kakitangan);
            $("#borangB1Modal input[name=jenisPermohonanReal]").val(data.permohonan.jenis_permohonan);
            $("#borangB1Modal textarea[id=tujuan]").val(data.permohonan.tujuan);
            $("#borangB1Modal input[name=idPermohonan]").val(data.permohonan.id_permohonan_baru);

            if(data.permohonan.kadar_jam == '1.125'){
                $("#borangB1Modal input[id=inlineJamRadio1]").prop("checked",true);

            }else if(data.permohonan.kadar_jam == '1.225'){
                $("#borangB1Modal input[id=inlineJamRadio2]").prop("checked",true);

            }
            if(data.permohonan.waktu  == 'Pagi'){
                $("#borangB1Modal input[id=inlineRadiobox1]").prop("checked",true);
            }else if(data.permohonan.waktu  == 'Petang'){
                $("#borangB1Modal input[id=inlineRadiobox2]").prop("checked",true);

            }else if(data.permohonan.waktu  == 'Malam'){
                $("#borangB1Modal input[id=inlineRadiobox3]").prop("checked",true);

            }
            $("#borangB1Modal").modal("show");
            
            // console.log(data.permohonan);

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
        success: function(data) {
            showSemakanDatatableKT();
            console.log(data.permohonan);

        },
        error: function(data) {
            console.log(data);
        } 
    });
}

function hantarPengesahan(){
    var tarikhMula = $("#borangB1Modal input[name=tarikhKerjaMula]").val();
    var masaMula = $("#borangB1Modal input[name=masaMula]").val();
    var masaAkhir = $("#borangB1Modal input[name=masaAkhir]").val();
    var jenisPermohonanKT = $("#borangB1Modal input[name=jenisPermohonanKT]").val();
    var jenisPermohonanReal = $("#borangB1Modal input[name=jenisPermohonanReal]").val();
    var waktu = $("#borangB1Modal input[name=radioWaktu]").val();
    var tujuan = $("#borangB1Modal textarea[name=tujuan]").val();
    var id_permohonan_baru = $("#borangB1Modal input[name=idPermohonan]").val();
    console.log(jenisPermohonanKT)
    console.log(id_permohonan_baru)
    var masa = getTimeDifference(masaMula,masaAkhir);
    
    var object = {
        tarikh_permohonan:tarikhMula,
        masa_mula:masaMula,
        masa_akhir:masaAkhir,
        waktu:waktu,
        masa:masa,
        tujuan:tujuan,
        jenis_permohonan_kakitangan:jenisPermohonanKT,
        jenis_permohonan:jenisPermohonanReal  
    }
    $.ajax({
        url: 'semakan/hantar-permohonan/' + id_permohonan_baru,
        type: 'put', 
        data:{
            id_permohonan_baru : id_permohonan_baru,
            object : object,
        },
        success: function(data) {
            $("#borangB1Modal").modal("hide");
            Swal.fire(  
                'Dihantar untuk Pengesahan!',
                'Klik butang dibawah untuk tutup!',
                'success'
                )
            showSemakanDatatableKT();
            console.log(data.permohonan);

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