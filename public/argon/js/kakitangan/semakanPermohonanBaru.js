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
    edit = 1;   


    $("#submitBtnID").attr('value', id_permohonan_baru)
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
            } else if(data.permohonan.jenis_permohonan_kakitangan == "OT2"){
                getBerkumpulanDT();
            }
        },
        error: function(data) {
            console.log(data);
        } 
    });
}

function getPermohonan(id_permohonan_baru, jenis_permohonan){
    $.ajax({
        url: 'permohonan-baru/semak-permohonan/' + id_permohonan_baru,
        type: 'GET', 
        data:{
            jenis_permohonan: jenis_permohonan
        },
        dataType:"JSON",
        success: function(data) {
            if( jenis_permohonan == 'OT1'){
                var tarikhKerjaID = moment(data.permohonan.tarikh_mula_kerja,"DD-MM-YYYY").format("DD-MM-YYYY")
                $("#permohonanbaruModal").modal("show");
                $("#jenisPermohonan").val("frmPermohonanIndividu");

                document.getElementById("jenisPermohonan").disabled = true;
                document.getElementById('modaldialog').className = "modal-dialog modal-dialog-scrollable modal-lg"
                document.getElementById('selectpermohonan').className = "col-sm-12"
                $('#divPermohonanIndividu').show();
                $("#divPermohonanBerkumpulan").hide();

                $("#permohonanbaruModal input[name=tarikh-kerjaID]").val(tarikhKerjaID);
                $("#permohonanbaruModal input[name=tarikh-akhir-kerjaID]").val(data.permohonan.tarikh_akhir_kerja);
                $("#permohonanbaruModal input[name=masa-mulaID]").val(data.permohonan.masa_mula);
                $("#permohonanbaruModal input[name=masa-akhirID]").val(data.permohonan.masa_akhir);
                $("#permohonanbaruModal textarea[name=sebabID]").val(data.permohonan.tujuan);
                $("#permohonanbaruModal textarea[name=lokasiID]").val(data.permohonan.lokasi);

                $("#permohonanbaruModal textarea[name=masaMulaSebenar-individu]").val(data.permohonan.permohonan_with_users.masa_mula_sebenar);
                $("#permohonanbaruModal textarea[name=masaAkhirSebenar-individu]").val(data.permohonan.permohonan_with_users.masa_akhir_sebenar);

                getPegawai(data.permohonan.id_peg_sokong, data.permohonan.id_peg_pelulus);
                
                $('input').css('color', 'black');
                $('textarea' ).css('color', 'black');

                $("#permohonanbaruModal").modal("show");

            } else if(jenis_permohonan == 'OT2'){
                var tarikhKerjaBK = moment(data.permohonan.tarikh_mula_kerja,"DD-MM-YYYY").format("DD-MM-YYYY")

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

                    for(var i = 0; i< formlength; i++){
                        var nopekerjas = this.children[i];
                        nopekerjas.getElementsByClassName("inputnopekerja")[j].value = arr[i] 
                    }
                })
                
                $("#permohonanbaruModal").modal("show");

                $("#jenisPermohonan").val("frmPermohonanBerkumpulan");
                document.getElementById("jenisPermohonan").disabled = true;
                document.getElementById('modaldialog').className = "modal-dialog modal-dialog-scrollable modal-xl"
                document.getElementById('selectpermohonan').className = "col-sm-6"
                $('#divPermohonanIndividu').hide();
                $('#divPermohonanBerkumpulan').show();
                
                $("#permohonanbaruModal input[name=tarikh-kerjaBK]").val(tarikhKerjaBK);
                $("#permohonanbaruModal input[name=tarikh-akhir-kerjaBK]").val(data.permohonan.tarikh_akhir_kerja);
                $("#permohonanbaruModal input[name=masa-mulaBK]").val(data.permohonan.masa_mula);
                $("#permohonanbaruModal input[name=masa-akhirBK]").val(data.permohonan.masa_akhir);

                document.getElementById('sebabBK').value = data.permohonan.tujuan;
                document.getElementById('lokasiBK').value = data.permohonan.lokasi;

                getPegawai(data.permohonan.id_peg_sokong, data.permohonan.id_peg_pelulus);
                $('input').css('color', 'black');

                $("#permohonanbaruModal").modal("show");
            }

            
        },
        error: function(data) {
            console.log(data);
        } 
    });
}

function getPegawai(pegSokongID, pegLulusID){
    var id_user = ($('#noPekerja').val());

    $.ajax({
        url: 'permohonan-baru/pegawai/',
        type:'post',
        data:{
            id_user: id_user 
        },
        dataType: 'json',
        success: function(data){
            var pegawaiSokong = data.pegawaiSokong
            var pegawaiLulus = data.pegawaiLulus
            var jabatans = data.jabatans
            var jabatan;

            jabatans.forEach((element,index) => {
                jabatan = element.GE_KOD_JABATAN;
                var optgroup = "<optgroup label='"+element.GE_KETERANGAN_JABATAN+"'style='height:auto;'>"
                $('#pegawaiSokongID').append(optgroup)
                $('#pegawaiSokongBK').append(optgroup)
                $('#pegawaiLulusID').append(optgroup)
                $('#pegawaiLulusBK').append(optgroup)

                pegawaiSokong.forEach((element,index) => {
                    if(element.DEPARTMENTCODE.length > 5 ){
                        var kodJabatan = element.DEPARTMENTCODE.substring(0,2) 
                    } else{
                        var kodJabatan = element.DEPARTMENTCODE.substring(0,1) 
                    }

                    if(kodJabatan == jabatan){
                        var option = "<option id='peg-sokong-"+element.CUSTOMERID+"' value='"+element.CUSTOMERID+"'>"+element.NAME+"</option>"

                        if (pegSokongID == element.CUSTOMERID) {
                            option = "<option id='peg-sokong-"+element.CUSTOMERID+"' value='"+element.CUSTOMERID+"' selected>"+element.NAME+"</option>"
                        }
                        
                        $('#pegawaiSokongID').append(option)
                        $('#pegawaiSokongBK').append(option)
                    }
                })

                pegawaiLulus.forEach((element,index) => {
                    if(element.DEPARTMENTCODE.length > 5 ){
                        var kodJabatan = element.DEPARTMENTCODE.substring(0,2) 
                    } else{
                        var kodJabatan = element.DEPARTMENTCODE.substring(0,1) 
                    }

                    if(kodJabatan == jabatan){
                        var option = "<option id='peg-lulus-"+element.CUSTOMERID+"' value='"+element.CUSTOMERID+"'>"+element.NAME+"</option>"

                        if (pegLulusID == element.CUSTOMERID) {
                            var option = "<option id='peg-lulus-"+element.CUSTOMERID+"' value='"+element.CUSTOMERID+"' selected>"+element.NAME+"</option>"
                        } 

                        $('#pegawaiLulusID').append(option)
                        $('#pegawaiLulusBK').append(option)
                    }
                })
            })
        }
    })
}

function hantarPermohonanBerkumpulan(){
    var idPermohonan = $('#submitBtnID').val();
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
    // var masa = getTimeDifference(masaMulaBK,masaAkhirBK);
    // var waktu = "";
    var hour = masaMulaBK.substring(0,2);
    var status = "DALAM PROSES";
    var jenis_permohonan = berkumpulan;

    // if(hour >= 6 && hour < 12)
    // {
    //     waktu = "Pagi";
    // }else if(hour >= 12 && hour <= 19)
    // {
    //     waktu = "Petang"
    // }else
    // {
    //     waktu = "Malam"
    // }
    var nopekerja = [namaPekerja];

    $(".pekerjasform").each(function(j){

        var formlength = this.children.length

        for(var i = 0; i< formlength; i++){
            var nopekerjas = this.children[i];
            var input = nopekerjas.getElementsByClassName("inputnopekerja")[0].value
            nopekerja.push(input) 
        }

    })

    var object = {
        tarikh_akhir_kerja:tarikhAkhirKerjaBK,
        id_peg_pelulus:pegPelulusBK,
        id_peg_sokong:pegSokongBK,
        tarikh_permohonan:tarikhKerjaBK,
        masa_mula:masaMulaBK,
        masa_akhir:masaAkhirBK,
        // masa:masa,
        hari:hari,
        // waktu:waktu,
        lokasi:lokasi,
        kadar_jam:"1.125",
        status:status,
        jenis_permohonan:jenis_permohonan,
        tujuan:sebab,
        jenis_permohonan_kakitangan:berkumpulan
    };

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
                $('#permohonanbaruModal').modal('hide');
                successAlert();
                getBerkumpulanDT();
            },
            error: function(data) {
                console.log(data);
            } 
        });
    } else if(edit == 1){
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
            },
            error: function(data) {
                console.log(data);
            } 
        });
    }

}

function hantarPermohonanIndividu(){
    var idPermohonan = $('#submitBtnID').val();
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
    // var masa = getTimeDifference(masaMulaID,masaAkhirID);
    // var waktu = "";
    // var hour = masaMulaID.substring(0,2);
    var status = "DALAM PROSES";
    var jenis_permohonan = individu;
    var tarikhMula = moment(tarikhKerjaID,"DD-MM-YYYY").format("YYYY-MM-DD")
    var masaMula = tarikhMula + " " + masaMulaID + ":00"
    var tarikhAkhir = moment(tarikhAkhirKerjaID,"DD-MM-YYYY").format("YYYY-MM-DD")
    var masaAkhir = tarikhAkhir + " " + masaAkhirID + ":00"

    // totalhours = totalhours.toFixed(2)
    // if(hour >= 6 && hour < 12){
    //     waktu = "Pagi";
    // }else if(hour >= 12 && hour <= 19){
    //     waktu = "Petang"
    // } else {
    //     waktu = "Malam"
    // }

    var nopekerja = [noPekerjaID];
    var user_id = noPekerjaID;
    var object = {
                    tarikh_akhir_kerja:tarikhAkhirKerjaID,
                    id_peg_pelulus:pegPelulusID,
                    id_peg_sokong:pegSokongID,
                    tarikh_permohonan:tarikhKerjaID,
                    masa_mula:masaMulaID,
                    masa_akhir:masaAkhirID,
                    hari:hari,
                    lokasi:lokasi,
                    kadar_jam:"1.125",
                    status:status,
                    jenis_permohonan:jenis_permohonan,
                    tujuan:sebab,
                    jenis_permohonan_kakitangan:individu
                };

    if (edit != 1){
        console.log('edit0');
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
                $('#permohonanbaruModal').modal('hide');
                successAlert();
                getIndividuDT();
            },
            error: function(data) {
                console.log(data);
            } 
        });

    } else if(edit == 1){
        $.ajax({
            url: 'permohonan-baru/kemaskini-permohonan/'+idPermohonan,
            type: 'put', 
            data: {
                jenisPermohonan : jenis_permohonan,
                tarikh_permohonan : tarikhKerjaID,
                tarikh_akhir_kerja : tarikhAkhirKerjaID,
                id_peg_pelulus : pegPelulusID,
                id_peg_sokong : pegSokongID,
                masa_mula : masaMulaID,
                masa_akhir : masaAkhirID,
                hari : hari, 
                tujuan : sebab,
                lokasi : lokasi,
                id_user : noPekerjaID 
            },
            success: function() {
                $('#permohonanbaruModal').modal('hide');
                successAlert();
                getIndividuDT();
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

//   function timeDiffCalc(dateFuture, dateNow) {
//     let diffInMilliSeconds = Math.abs(dateFuture - dateNow) / 1000;

//     // calculate days
//     days = Math.floor(diffInMilliSeconds / 86400);
//     diffInMilliSeconds -= days * 86400;

//     // calculate hours
//     hours = Math.floor(diffInMilliSeconds / 3600) % 24;
//     diffInMilliSeconds -= hours * 3600;

//     // calculate minutes
//     minutes = Math.floor(diffInMilliSeconds / 60) % 60;
//     diffInMilliSeconds -= minutes * 60;

//     let difference = '';
//     if (days > 0) {
//       difference += (days === 1) ? `${days} day, ` : `${days} days, `;
//     }

//     difference += (hours === 0 || hours === 1) ? `${hours} hour, ` : `${hours} hours, `;

//     difference += (minutes === 0 || hours === 1) ? `${minutes} minutes` : `${minutes} minutes`; 

//     var minuteToHours = minutes / 60
//     totalhours = (24 * days) + (hours) + minuteToHours

//     return difference;
//   }