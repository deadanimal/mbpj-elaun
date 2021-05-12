var days;
var minutes;
var hours;

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function changeDataTarget(jenis_permohonan,id_permohonan_baru){
    getPermohonan(id_permohonan_baru,jenis_permohonan);
    
    console.log(idPermohonan)
    edit = 1;
    console.log(edit)
    // $(".modal-footer").hide();
    
}

function deletePermohonan(id_permohonan_baru){

    $.ajax({
        url: 'permohonan-baru/delete-permohonan/' + id_permohonan_baru,
        type: 'put', 
        data:{
            id_permohonan_baru : id_permohonan_baru
        },
        success: function(data) {
            if(data.permohonan.jenis_permohonan_kakitangan == "OT1"){
            getIndividuDT();
            }else if(data.permohonan.jenis_permohonan_kakitangan == "OT2"){
            getBerkumpulanDT();
            }
            console.log(data.permohonan);

        },
        error: function(data) {
            console.log(data);
        } 
    });
}

function getPermohonan(id_permohonan_baru,jenis_permohonan){
    idPermohonan = id_permohonan_baru
    console.log(jenis_permohonan)
    $.ajax({
        url: 'permohonan-baru/semak-permohonan/' + id_permohonan_baru,
        type: 'GET', 
        data:{
            id_permohonan_baru : id_permohonan_baru,
            jenis_permohonan:jenis_permohonan
        },
        dataType:"JSON",
        success: function(data) {
            if( jenis_permohonan == 'OT1'){
                var id_user = data.permohonan.permohonan_with_users.CUSTOMERID.toString();
                var paddedUserID = id_user.padStart(5, '0');
                var tarikhKerjaID = moment(data.permohonan.tarikh_mula_kerja,"DD-MM-YYYY").format("DD-MM-YYYY")
                $("#permohonanbaruModal").modal("show");
                $("#jenisPermohonan").val("frmPermohonanIndividu");
                document.getElementById("jenisPermohonan").disabled = true;
                document.getElementById('modaldialog').className = "modal-dialog modal-dialog-scrollable modal-lg"
                document.getElementById('selectpermohonan').className = "col-sm-12"
                $('#divPermohonanIndividu').show();
                $("#divPermohonanBerkumpulan").hide();
                $("#permohonanbaruModal input[name=noPekerjaID]").val(paddedUserID);
                $("#permohonanbaruModal input[name=tarikh-kerjaID]").val(tarikhKerjaID);
                $("#permohonanbaruModal input[name=tarikh-akhir-kerjaID]").val(data.permohonan.tarikh_akhir_kerja);
                $("#permohonanbaruModal input[name=masa-mulaID]").val(data.permohonan.masa_mula);
                $("#permohonanbaruModal input[name=masa-akhirID]").val(data.permohonan.masa_akhir);
                $("#permohonanbaruModal input[name=]").val(data.permohonan.masa_mula);
                $("#permohonanbaruModal input[name=masa-akhirID]").val(data.permohonan.masa_akhir);
                document.getElementById('sebabID').value = data.permohonan.tujuan;
                document.getElementById('lokasiID').value = data.permohonan.lokasi;
                $("#permohonanbaruModal").modal("show");
                console.log('ot1',jenis_permohonan)
            }else if(jenis_permohonan == 'OT2'){
                var tarikhKerjaBK = moment(data.permohonan.tarikh_mula_kerja,"DD-MM-YYYY").format("DD-MM-YYYY")
                console.log(data);
                for(i = 0;i<data.permohonanUsers.length;i++){
                    if(data.permohonanUsers[i].id != data.userId){
                        add();
                    }
                }
                $(".pekerjasform").each(function(j){
                    var formlength = this.children.length
                    
                    for(var k = 0; k < data.permohonanUsers.length; k++){
                        if(data.permohonanUsers[k].id != data.userId){
                            arr.push(data.permohonanUsers[k].id)
                        }
                    }
                    console.log(arr);
                        for(var i = 0; i< formlength; i++){
                            var nopekerjas = this.children[i];
                            nopekerjas.getElementsByClassName("inputnopekerja")[j].value = arr[i] 
                        }
                })
                console.log(data.permohonanUsers.length)
                // console.log(data.permohonan[1].id)
                $("#permohonanbaruModal").modal("show");
                // $("#divbuttonAdd").hide();
                $("#jenisPermohonan").val("frmPermohonanBerkumpulan");
                document.getElementById("jenisPermohonan").disabled = true;
                document.getElementById('modaldialog').className = "modal-dialog modal-dialog-scrollable modal-xl"
                document.getElementById('selectpermohonan').className = "col-sm-6"
                $('#divPermohonanIndividu').hide();
                $('#divPermohonanBerkumpulan').show();
                
                $("#permohonanbaruModal input[name=namaPekerjaBK]").val(data.userId);
                $("#permohonanbaruModal input[name=tarikh-kerjaBK]").val(tarikhKerjaBK);
                // console.log(data.permohonan)
                $("#permohonanbaruModal").modal("show");
                // console.log('ot2',jenis_permohonan)
            }
            // console.log(data.permohonan);

        },
        error: function(data) {
            console.log(data);
        } 
    });

}


function hantarPermohonanBerkumpulan(){
    console.log(edit)
    var namaPekerja = document.querySelector("#namaPekerjaBK").value;
    var pegPelulusBK = document.querySelector("#pegawaiLulusBK").value;
    var pegSokongBK = document.querySelector("#pegawaiSokongBK").value;
    var tarikhKerjaBK = moment(document.querySelector("#tarikh-kerjaBK").value,"DD-MM-YYYY").format("DD-MM-YYYY");
    var tarikhAkhirKerjaBK = moment(document.querySelector("#tarikh-akhir-kerjaBK").value,"DD-MM-YYYY").format("DD-MM-YYYY");
    var masaMulaBK = document.querySelector("#masa-mulaBK").value;
    var masaAkhirBK = document.querySelector("#masa-akhirBK").value;
    var tarikhMulaBK = moment(tarikhKerjaBK,"DD-MM-YYYY").format("YYYY-MM-DD")
    var masaMula = tarikhMulaBK + " " + masaMulaBK + ":00"
    var tarikhAkhirBK = moment(tarikhAkhirKerjaBK,"DD-MM-YYYY").format("YYYY-MM-DD")
    var masaAkhir = tarikhAkhirBK + " " + masaAkhirBK + ":00"
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
    var object = {
        tarikh_akhir_kerja:tarikhAkhirKerjaBK,
        id_peg_pelulus:pegPelulusBK,
        id_peg_sokong:pegSokongBK,
        tarikh_permohonan:tarikhKerjaBK,
        masa_mula:masaMulaBK,
        masa_akhir:masaAkhirBK,
        masa:masa,
        hari:hari,
        waktu:waktu,
        lokasi:lokasi,
        kadar_jam:"1.125",
        status:status,
        jenis_permohonan:jenis_permohonan,
        tujuan:sebab,
        jenis_permohonan_kakitangan:berkumpulan
    };
    console.log(object,berkumpulan);
    if(edit != 1){
    $.ajax({
        url: 'permohonan-baru/hantar-permohonan',
        type: 'POST', 
        data:{
            object:object,
            masaMula:masaMula,
            masaAkhir:masaAkhir,
            jenisPermohonan:jenis_permohonan,
            pekerja:nopekerja
        },
        success: function(data) {
            // $("#permohonanbaruModal").modal("hide");
            $('#permohonanbaruModal').modal('hide');
            // $(".modal").modal("hide");
            successAlert();
            getBerkumpulanDT();
            console.log(data);

        },
        error: function(data) {
            console.log(data);
        } 
    });
    }else if(edit == 1){
    $.ajax({
        url: 'permohonan-baru/kemaskini-permohonan/'+idPermohonan,
        type: 'put', 
        data:{
            reject:reject,
            object:object,
            jenisPermohonan:jenis_permohonan,
            idPermohonan:idPermohonan
        },
        success: function(data) {
            
            closeModal("permohonanbaruModal");
            successAlert();
            getBerkumpulanDT();
            console.log(data);

        },
        error: function(data) {
            console.log(data);
        } 
    });
}

}

function hantarPermohonanIndividu(){
    
    console.log(edit)
    var noPekerjaID = document.querySelector("#noPekerjaID").value;
    var pegPelulusID = document.querySelector("#pegawaiLulusID").value;
    var pegSokongID = document.querySelector("#pegawaiSokongID").value;
    var tarikhKerjaID = moment(document.querySelector("#tarikh-kerjaID").value,"DD-MM-YYYY").format("DD-MM-YYYY");
    var tarikhAkhirKerjaID = moment(document.querySelector("#tarikh-akhir-kerjaID").value,"DD-MM-YYYY").format("DD-MM-YYYY");
    var masaMulaID = document.querySelector("#masa-mulaID").value;
    var masaAkhirID = document.querySelector("#masa-akhirID").value;
    var sebab = document.querySelector("#sebabID").value;
    var lokasi = document.querySelector("#lokasiID").value;
    var hari = moment(tarikhKerjaID,"DD-MM-YYYY").format("dddd");
    var masa = getTimeDifference(masaMulaID,masaAkhirID);
    var waktu = "";
    var hour = masaMulaID.substring(0,2);
    var status = "DALAM PROSES";
    var jenis_permohonan = individu;
    var tarikhMula = moment(tarikhKerjaID,"DD-MM-YYYY").format("YYYY-MM-DD")
    var masaMula = tarikhMula + " " + masaMulaID + ":00"
    var tarikhAkhir = moment(tarikhAkhirKerjaID,"DD-MM-YYYY").format("YYYY-MM-DD")
    var masaAkhir = tarikhAkhir + " " + masaAkhirID + ":00"
    console.log(masaMula,masaAkhir)
    console.log('difference',timeDiffCalc(new Date(masaMula),new Date(masaAkhir)));
    var differences = timeDiffCalc(new Date(masaMula),new Date(masaAkhir));
    console.log(differences);
    totalhours = totalhours.toFixed(2)
    console.log(hours,' ni badskdmaklsm')
    console.log("hours",totalhours)
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

    console.log("hari",hari,"masa",totalhours,"waktu",waktu);

    var nopekerja = [noPekerjaID];
    var user_id = noPekerjaID;
    var object = {tarikh_akhir_kerja:tarikhAkhirKerjaID,id_peg_pelulus:pegPelulusID,id_peg_sokong:pegSokongID,tarikh_permohonan:tarikhKerjaID,
                    masa_mula:masaMulaID,masa_akhir:masaAkhirID,masa:totalhours,hari:hari,waktu:waktu,lokasi:lokasi,kadar_jam:"1.125",status:status,
                    jenis_permohonan:jenis_permohonan,tujuan:sebab,jenis_permohonan_kakitangan:individu};
    console.log(object,individu);
    if (edit != 1){
    $.ajax({
        url: 'permohonan-baru/hantar-permohonan',
        type: 'POST', 
        data:{
            masaMula:masaMula,
            masaAkhir:masaAkhir,
            user_id:user_id,
            pekerja:nopekerja,
            object:object,
            jenisPermohonan:jenis_permohonan
        },
        success: function(data) {
            // $(".modal").modal("hide");
            
            $('#permohonanbaruModal').modal('hide');

            // $("#permohonanbaruModal").modal("hide");
            successAlert();
            getIndividuDT();
            // console.log(data);

        },
        error: function(data) {
            console.log(data);
        } 
    });
    }else if(edit == 1){
        var objectUpdate = {
            tarikh_akhir_kerja:tarikhAkhirKerjaID,
            id_peg_pelulus:pegPelulusID,
            id_peg_sokong:pegSokongID,
            tarikh_permohonan:tarikhKerjaID,
            masa_mula:masaMulaID,
            masa_akhir:masaAkhirID,
            masa:totalhours,
            hari:hari,
            waktu:waktu,
            status:status,
            tujuan:sebab,
            };
        $.ajax({
            url: 'permohonan-baru/kemaskini-permohonan/'+idPermohonan,
            type: 'put', 
            data:{
                idPermohonan:idPermohonan,
                object:objectUpdate,
                jenisPermohonan:jenis_permohonan
            },
            success: function(data) {
                // $(".modal").modal("hide");
                
                $('#permohonanbaruModal').modal('hide');
    
                // $("#permohonanbaruModal").modal("hide");
                successAlert();
                getIndividuDT();
                console.log(data);
    
            },
            error: function(data) {
                console.log(data);
            } 
        });
    }
}

function successAlert(){
    Swal.fire(  
        'Permohonan anda telah dihantar dan akan diproses',
        'Klik butang dibawah untuk tutup!',
        'success'
        )
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

  function timeDiffCalc(dateFuture, dateNow) {
    let diffInMilliSeconds = Math.abs(dateFuture - dateNow) / 1000;

    // calculate days
    days = Math.floor(diffInMilliSeconds / 86400);
    diffInMilliSeconds -= days * 86400;
    console.log('calculated days', days);

    // calculate hours
    hours = Math.floor(diffInMilliSeconds / 3600) % 24;
    diffInMilliSeconds -= hours * 3600;
    console.log('calculated hours', hours);

    // calculate minutes
    minutes = Math.floor(diffInMilliSeconds / 60) % 60;
    diffInMilliSeconds -= minutes * 60;
    console.log('minutes', minutes);

    let difference = '';
    if (days > 0) {
      difference += (days === 1) ? `${days} day, ` : `${days} days, `;
    }

    difference += (hours === 0 || hours === 1) ? `${hours} hour, ` : `${hours} hours, `;

    difference += (minutes === 0 || hours === 1) ? `${minutes} minutes` : `${minutes} minutes`; 

    var minuteToHours = minutes / 60
    console.log("convert", minuteToHours.toFixed(2))
    totalhours = (24 * days) + (hours) + minuteToHours

    return difference;
  }