$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function changeDataTarget(jenis_permohonan,id_permohonan_baru){
    getPermohonan(id_permohonan_baru);
    if( jenis_permohonan == 'OT1'){
        $("#permohonanbaruModal").modal("show");
        $("#jenisPermohonan").val("frmPermohonanIndividu");
        document.getElementById("jenisPermohonan").disabled = true;
        document.getElementById('modaldialog').className = "modal-dialog modal-dialog-scrollable modal-lg"
        document.getElementById('selectpermohonan').className = "col-sm-12"
        $('#divPermohonanIndividu').show();
        $("#divPermohonanBerkumpulan").hide();
        console.log('ot1',jenis_permohonan)
    }else if(jenis_permohonan == 'OT2'){
        $("#permohonanbaruModal").modal("show");
        $("#pekerjaAddDiv").hide();
        $("#jenisPermohonan").val("frmPermohonanBerkumpulan");
        document.getElementById("jenisPermohonan").disabled = true;
        document.getElementById('modaldialog').className = "modal-dialog modal-dialog-scrollable modal-xl"
        document.getElementById('selectpermohonan').className = "col-sm-6"
        $('#divPermohonanIndividu').hide();
        $('#divPermohonanBerkumpulan').show();
        console.log('ot2',jenis_permohonan)
    }

    
}

function getPermohonan(id_permohonan_baru){

    $.ajax({
        url: 'permohonan-baru/semak-permohonan/' + id_permohonan_baru,
        type: 'GET', 
        data:{
            id_permohonan_baru : id_permohonan_baru
        },
        success: function(data) {
            $("#permohonanbaruModal input[name=namaPekerja]").val(data.permohonan.id_permohonan_baru);
            $("#permohonanbaruModal input[name=tarikh-kerja]").val(data.permohonan.tarikh_permohonan);
            
            console.log(data.permohonan);

        },
        error: function(data) {
            console.log(data);
        } 
    });

}

function deletePermohonan(s){
    console.log(s);
}

function hantarPermohonanBerkumpulan(){
    var namaPekerja = document.querySelector("#namaPekerjaBK").value;
    var pegPelulusBK = document.querySelector("#pegawaiLulusBK").value;
    var tarikhKerjaBK = document.querySelector("#tarikh-kerjaBK").value;
    var masaMulaBK = document.querySelector("#masa-mulaBK").value;
    var masaAkhirBK = document.querySelector("#masa-akhirBK").value;
    var sebab = document.querySelector("#sebabBK").value;
    var lokasi = document.querySelector("#lokasiBK").value;
    var hari = moment(tarikhKerjaBK).format("dddd");
    var masa = getTimeDifference(masaMulaBK,masaAkhirBK);
    var waktu = "";
    var hour = masaMulaBK.substring(0,2);
    var status = "DALAM PROSES";
    var jenis_permohonan = berkumpulan;
    if(hour >= 6 && hour < 12)
    {
        waktu = "Pagi";
    }else if(hour >= 12 && hour <= 19)
    {
        waktu = "Petang"
    }else
    {
        waktu = "Malam"
    }
    var nopekerja = [namaPekerja];
    console.log('node',nodelist.length/5);
    $(".pekerjasform").each(function(j){

        var formlength = this.children.length

        for(var i = 0; i< formlength; i++){
            var nopekerjas = this.children[i];
            var input = nopekerjas.getElementsByClassName("inputnopekerja")[0].value
            nopekerja.push(input) 
            console.log(input);
        }

    })
    console.log(nopekerja);
    var object = {id_peg_pelulus:pegPelulusBK,id_peg_sokong:5,tarikh_permohonan:tarikhKerjaBK,
        masa_mula:masaMulaBK,masa_akhir:masaAkhirBK,masa:masa,hari:hari,waktu:waktu,kadar_jam:"1.125",status:status,
        jenis_permohonan:jenis_permohonan,tujuan:sebab,jenis_permohonan_kakitangan:berkumpulan};
    console.log(object,berkumpulan);

    $.ajax({
        url: '/penyelia/permohonan-baru',
        type: 'POST', 
        data:{
            object:object,
            jenisPermohonan:jenis_permohonan,
            pekerja:nopekerja
        },
        success: function(data) {
            
            console.log(data);

        },
        error: function(data) {
            console.log(data);
        } 
    });

}

function hantarPermohonanIndividu(){
    var namaPekerjaID = document.querySelector("#namaPekerjaID").value;
    var pegPelulusID = document.querySelector("#pegawaiLulusID").value;
    var pegSokongID = document.querySelector("#pegawaiSokongID").value;
    var tarikhKerjaID = document.querySelector("#tarikh-kerjaID").value;
    var masaMulaID = document.querySelector("#masa-mulaID").value;
    var masaAkhirID = document.querySelector("#masa-akhirID").value;
    var sebab = document.querySelector("#sebabID").value;
    var lokasi = document.querySelector("#lokasiID").value;
    var hari = moment(tarikhKerjaID).format("dddd");
    var masa = getTimeDifference(masaMulaID,masaAkhirID);
    var waktu = "";
    var hour = masaMulaID.substring(0,2);
    var status = "DALAM PROSES";
    var jenis_permohonan = individu;
    // var catatan = "-"
    if(hour >= 6 && hour < 12)
    {
        waktu = "Pagi";
    }else if(hour >= 12 && hour <= 19)
    {
        waktu = "Petang"
    }else
    {
        waktu = "Malam"
    }

    console.log("hari",hari,"masa",masa,"waktu",waktu);
    var user_id = namaPekerjaID;
    var object = {id_peg_pelulus:pegPelulusID,id_peg_sokong:pegSokongID,tarikh_permohonan:tarikhKerjaID,
                    masa_mula:masaMulaID,masa_akhir:masaAkhirID,masa:masa,hari:hari,waktu:waktu,kadar_jam:"1.125",status:status,
                    jenis_permohonan:jenis_permohonan,tujuan:sebab};
    console.log(object,individu);
    $.ajax({
        url: '/penyelia/permohonan-baru',
        type: 'POST', 
        data:{
            user_id:user_id,
            object:object,
            jenisPermohonan:jenis_permohonan
        },
        success: function(data) {
            
            console.log(data);

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
    return   z(diff/60 | 0) + ':' + z(diff % 60); 
  }