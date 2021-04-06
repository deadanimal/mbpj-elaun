var hour = 0;
var realhour = 0;
var hourSiang = "22:00";
var hourMalam = 07;
var totalShiftSiang = "0"
var totalShiftMalam = "0"
let difference = '';
var siang;
var malam;
function fillInKedatangan(idKakitangan) {  
    // let is_individu = jenisPermohonan[2] == 1 ? 'individu' : 'berkumpulan';

    // Clear up ekedatangan nama and no. pekerja
    $("#borangB1Modal input[name=ekedatanganNama]").val('');
    $("#borangB1Modal input[name=ekedatanganNoPekerja]").val('');

    // fillInMasaSebenar(idKakitangan, id_permohonan_baru, is_individu);

    $.ajax({
        url: 'ekedatangan/semakan-ekedatangan/' + idKakitangan,
        type: 'GET',
        success: function(data) {
            let array =  ['PS', 'EL', 'KP', 'KS'];

            // let jenisPermohonanShortened = jenisPermohonan.substr(0,2);
      
            $("#borangB1Modal input[name=namaPekerja]").val(data.user_name);
            // $("#borangB1Modal input[name=]").val(idKakitangan);

            // eKedatangan
            // if (array.includes(jenisPermohonanShortened)) {
                $("#borangB1Modal input[name=tarikh]").val(data.ekedatangans.tarikh);
                $("#borangB1Modal input[name=waktuMasuk]").val(data.ekedatangans.waktu_masuk);
                $("#borangB1Modal input[name=waktuKeluar]").val(data.ekedatangans.waktu_keluar);
                $("#borangB1Modal input[name=jumlahMasa]").val(data.ekedatangans.jumlah_waktu_kerja);
                $("#borangB1Modal input[name=mulaKerja]").val(data.ekedatangans.waktu_masuk_OT_1);
                $("#borangB1Modal input[name=akhirKerja]").val(data.ekedatangans.waktu_keluar_OT_1);
                $("#borangB1Modal input[name=jumlahKerja]").val(data.ekedatangans.jumlah_OT_1);
                $("#borangB1Modal input[name=jumlahOTKeseluruhan]").val(data.ekedatangans.jumlah_OT_keseluruhan);
                $("#borangB1Modal input[name=waktuAnjal]").val(data.ekedatangans.waktu_anjal);
            // }  
                
                    },
                error: function(data) { console.log(data); }
            });
            var waktuMasuk = $("#borangB1Modal input[name=waktuMasuk]").val()
            var waktuKeluar = $("#borangB1Modal input[name=waktuKeluar]").val()
            var mulaKerja = $("#borangB1Modal input[name=mulaKerja]").val()
            var akhirKerja = $("#borangB1Modal input[name=akhirKerja]").val()

            hour = timeDiffCalc(new Date(waktuKeluar),new Date(waktuMasuk))
            realhour = diff(mulaKerja,akhirKerja)
            var jamkerja = parseInt(realhour.substring(0,2))
            var hourMasuk = mulaKerja.substring(0,2)
            var hourKeluar = akhirKerja.substring(0,2)
            hourMasuk = parseInt(hourMasuk)
            hourKeluar = parseInt(hourKeluar)
            var shiftSiang = "00:00"
            var shiftSiang2 = "00:00"
            var shiftMalam = "00:00"
            var shiftMalam2 = "00:00"
            
            console.log('sadsa',difference)

            // while(realhour != "00:00"){
            if((difference >=1 && jamkerja >= 24) || (difference > 1)){
                console.log(difference)
                siang = difference * 16
                malam = difference * 8
            }
            if((hourMasuk >= 06 && hourMasuk < 22) && (hourKeluar < 22 && hourKeluar >= 06 )){
                console.log("1st")
                shiftSiang = diff(mulaKerja,akhirKerja)
            }
            if((hourMasuk >= 06 && hourMasuk < 22) && ((hourKeluar >=22 && hourKeluar <=24) || (hourKeluar < 06))){
                console.log("2nd")
                shiftSiang = diff(mulaKerja,"22:00")
                shiftMalam = diff("22:00",akhirKerja)
            } 
            if((jamkerja < 8 && difference <= 1) && ((hourMasuk >= 22 && hourMasuk <=24) || hourMasuk < 06 ) && (hourKeluar < 06 || (hourKeluar >=22 && hourKeluar <=24))){
                console.log("3rd")
                shiftMalam = diff(mulaKerja,akhirKerja)
            }
            if(((hourMasuk >= 22 && hourMasuk <=24) || hourMasuk < 06 ) && ((hourKeluar >= 06 && hourKeluar < 22))){
                console.log("4th")
                shiftMalam = diff(mulaKerja,"06:00")
                shiftSiang = diff("06:00",akhirKerja)
            }
            if((hourMasuk >= 06 && hourMasuk < 22) && (hourKeluar >= 06 && hourKeluar < 22)){
                console.log("5th")
                shiftSiang = diff(mulaKerja,"22:00")
                shiftMalam = diff("22:00","06:00")
                shiftSiang2 = diff("06:00",akhirKerja)
                
            }
            if((jamkerja >= 8 || difference >=1) && ((hourMasuk >= 22 && hourMasuk <= 24) || hourMasuk < 06 ) && ((hourKeluar >= 22 && hourKeluar <= 24) || (hourKeluar < 06))){
                console.log("6th")
                shiftMalam = diff(mulaKerja,"06:00")
                shiftSiang = diff("06:00","22:00")
                shiftMalam2 = diff("22:00",akhirKerja)
            }

            totalShiftHour = moment(shiftSiang2, "h:mm").add(shiftSiang.substring(0,2),"h").format("HH:mm")
            totalShiftSiang = moment(totalShiftHour, "h:mm").add(shiftSiang.substring(3,5),"m").format("HH:mm")
            totalShiftMHour = moment(shiftMalam2, "h:mm").add(shiftMalam.substring(0,2),"h").format("HH:mm")
            totalShiftMalam = moment(totalShiftMHour, "h:mm").add(shiftMalam.substring(3,5),"m").format("HH:mm")

            if(siang != 0){
                
                // siang = siang.toString()
                console.log('siang oi',siang)
                totalShiftSiang = parseInt(totalShiftSiang.split) + siang
                totalShiftSiang = moment.duration(totalShiftSiang,"hours").format("HH:mm")
                console.log('ahxnkjas',totalShiftSiang)

            }
            if(malam != 0){
                
                malam = malam.toString()
                console.log('malam oi',malam)
                totalShiftMalam = moment(totalShiftMalam,"h:mm").add(malam,"h").format("HH:mm")
                console.log('mlalmslamslml',totalShiftMalam)

            }


            console.log(shiftSiang,shiftSiang2,shiftMalam,shiftMalam2,totalShiftMalam,totalShiftSiang)
            console.log("dayssss",siang,malam)
            console.log(realhour,"before")
            realhour = moment(realhour,"h:mm").subtract(totalShiftMalam.substring(0,2),"h").format("HH:mm")
            realhour = moment(realhour,"h:mm").subtract(totalShiftMalam.substring(3,5),"m").format("HH:mm")
            realhour = moment(realhour,"h:mm").subtract(totalShiftSiang.substring(0,2),"h").format("HH:mm")
            realhour = moment(realhour,"h:mm").subtract(totalShiftSiang.substring(3,5),"m").format("HH:mm")
            console.log(realhour,"after")
            // }        
        
}

function diff(start, end) {
    start = start.split(":");
    end = end.split(":");
    var startDate = new Date(0, 0, 0, start[0], start[1], 0);
    var endDate = new Date(0, 0, 0, end[0], end[1], 0);
    var diff = endDate.getTime() - startDate.getTime();
    var hours = Math.floor(diff / 1000 / 60 / 60);
    diff -= hours * 1000 * 60 * 60;
    var minutes = Math.floor(diff / 1000 / 60);

    // If using time pickers with 24 hours format, add the below line get exact hours
    if (hours < 0)
       hours = hours + 24;

    return (hours <= 9 ? "0" : "") + hours + ":" + (minutes <= 9 ? "0" : "") + minutes;
}
function timeDiffCalc(dateFuture, dateNow) {
    let diffInMilliSeconds = Math.abs(dateFuture - dateNow) / 1000;

    // calculate days
    const days = Math.floor(diffInMilliSeconds / 86400);
    diffInMilliSeconds -= days * 86400;
    console.log('calculated days', days);

    // calculate hours
    // const hours = Math.floor(diffInMilliSeconds / 3600) % 24;
    // diffInMilliSeconds -= hours * 3600;
    // console.log('calculated hours', hours);

    // // calculate minutes
    // const minutes = Math.floor(diffInMilliSeconds / 60) % 60;
    // diffInMilliSeconds -= minutes * 60;
    // console.log('minutes', minutes);

    if (days > 0) {
      difference += days
    }

    // difference += (hours === 0 || hours === 1) ? `${hours} hour, ` : `${hours} hours, `;

    // difference += (minutes === 0 || hours === 1) ? `${minutes} minutes` : `${minutes} minutes`; 

    // var minuteToHours = minutes / 60
    // console.log("convert", minuteToHours.toFixed(2))
    // totalhours = (24 * days) + (hours) + minuteToHours

    return difference;
    }

// function fillInMasaSebenar(idKakitangan, id_permohonan_baru, is_individu) {
//     $.ajax({
//         url: 'masa-sebenar/' + idKakitangan,
//         type: 'GET',
//         data: {
//             id_permohonan_baru : id_permohonan_baru
//         },
//         success: function(data) {
//             let {error, masa_mula_sebenar, masa_akhir_sebenar} = data;

//             $('#formModalEdit input[name=masaMulaSebenar-'+is_individu+']').val(masa_mula_sebenar); 
//             $('#formModalEdit input[name=masaAkhirSebenar-'+is_individu+']').val(masa_akhir_sebenar);

//             // VALUE STORES THE ID OF USER FOR KEMASKINI
//             document.getElementById('semakan-modal-'+is_individu+'-masaMulaSebenar').setAttribute("value", idKakitangan);
//             document.getElementById('semakan-modal-'+is_individu+'-masaAkhirSebenar').setAttribute("value", id_permohonan_baru);
//         },
//         error: function(data) { console.log(data); }
//     });
// }