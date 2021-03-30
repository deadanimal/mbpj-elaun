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
           console.log(data.permohonan.permohonan_with_users.id)
            if( jenis_permohonan == 'OT1'){
                var tarikhKerjaID = moment(data.permohonan.tarikh_mula_kerja,"YYYY-MM-DD").format("DD / MM / YYYY")
                $("#permohonanbaruModal").modal("show");
                $("#jenisPermohonan").val("frmPermohonanIndividu");
                document.getElementById("jenisPermohonan").disabled = true;
                document.getElementById('modaldialog').className = "modal-dialog modal-dialog-scrollable modal-lg"
                document.getElementById('selectpermohonan').className = "col-sm-12"
                $('#divPermohonanIndividu').show();
                $("#divPermohonanBerkumpulan").hide();
                $("#permohonanbaruModal input[name=namaPekerjaID]").val(data.permohonan.permohonan_with_users.id);
                $("#permohonanbaruModal input[name=tarikh-kerjaID]").val(tarikhKerjaID);
                $("#permohonanbaruModal").modal("show");
                console.log('ot1',jenis_permohonan)
            }else if(jenis_permohonan == 'OT2'){
                var tarikhKerjaBK = moment(data.permohonan.tarikh_mula_kerja,"YYYY-MM-DD").format("DD / MM / YYYY")
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
    var tarikhKerjaBK = moment(document.querySelector("#tarikh-kerjaBK").value,"DD / MM / YYYY").format("YYYY-MM-DD");
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
    var object = {
        tarikh_akhir_kerja:'2021-01-01',
        id_peg_pelulus:pegPelulusBK,
        id_peg_sokong:5,
        tarikh_permohonan:tarikhKerjaBK,
        masa_mula:masaMulaBK,
        masa_akhir:masaAkhirBK,
        masa:masa,
        hari:hari,
        waktu:waktu,
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
    var namaPekerjaID = document.querySelector("#namaPekerjaID").value;
    var pegPelulusID = document.querySelector("#pegawaiLulusID").value;
    var pegSokongID = document.querySelector("#pegawaiSokongID").value;
    var tarikhKerjaID = moment(document.querySelector("#tarikh-kerjaID").value,"DD / MM / YYYY").format("YYYY-MM-DD");
    var tarikhAkhirKerjaID = moment(document.querySelector("#tarikh-akhir-kerjaID").value,"DD / MM / YYYY").format("YYYY-MM-DD");
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
    var tarikhMula = moment(tarikhKerjaID).format("YYYY/MM/DD")
    var masaMula = tarikhMula + " " + masaMulaID + ":00"
    var tarikhAkhir = moment(tarikhAkhirKerjaID).format("YYYY/MM/DD")
    var masaAkhir = tarikhAkhir + " " + masaAkhirID + ":00"
    console.log(masaMula,masaAkhir)
    console.log('difference',timeDiffCalc(new Date(masaMula),new Date(masaAkhir)));
    
    totalhours = totalhours.toFixed(2)
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

    console.log("hari",hari,"masa",masa,"waktu",waktu);
    var user_id = namaPekerjaID;
    var object = {tarikh_akhir_kerja:'2020-01-01',id_peg_pelulus:pegPelulusID,id_peg_sokong:pegSokongID,tarikh_permohonan:tarikhKerjaID,
                    masa_mula:masaMulaID,masa_akhir:masaAkhirID,masa:totalhours,hari:hari,waktu:waktu,kadar_jam:"1.125",status:status,
                    jenis_permohonan:jenis_permohonan,tujuan:sebab,jenis_permohonan_kakitangan:individu};
    console.log(object,individu);
    if (edit != 1){
    $.ajax({
        url: 'permohonan-baru/hantar-permohonan',
        type: 'POST', 
        data:{
            user_id:user_id,
            object:object,
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
    }else if(edit == 1){
        var objectUpdate = {
            tarikh_akhir_kerja:'2020-01-01',
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
    const days = Math.floor(diffInMilliSeconds / 86400);
    diffInMilliSeconds -= days * 86400;
    console.log('calculated days', days);

    // calculate hours
    const hours = Math.floor(diffInMilliSeconds / 3600) % 24;
    diffInMilliSeconds -= hours * 3600;
    console.log('calculated hours', hours);

    // calculate minutes
    const minutes = Math.floor(diffInMilliSeconds / 60) % 60;
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