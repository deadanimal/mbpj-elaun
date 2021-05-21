var hour = 0;
var realhour = 0;
var hourSiang = "22:00";
var hourMalam = 07;
var totalShiftSiang = "0"
var totalShiftMalam = "0"
let difference = '';
var siang;
var malam;

function fillInEkedatanganKT(idKakitangan, id_permohonan_baru) { 
    $.ajax({
        url: 'ekedatangan/semakan-ekedatangan/' + idKakitangan,
        type: 'GET',
        data: { 
            id_permohonan_baru : id_permohonan_baru
        },
        success: function(data) {      
            $("#borangB1Modal input[name=namaPekerja]").val(data.user_name);

            if (data.ekedatangans === null) {
                noEkedatanganWithDefaultValue();
                return 0;
            }

            // eKedatangan
            $("#borangB1Modal input[name=tarikh]").val(data.ekedatangans.tarikh);
            $("#borangB1Modal input[name=waktuMasuk]").val(data.ekedatangans.waktu_masuk);
            $("#borangB1Modal input[name=waktuKeluar]").val(data.ekedatangans.waktu_keluar);
            $("#borangB1Modal input[name=jumlahMasa]").val(data.ekedatangans.jumlah_waktu_kerja);
            $("#borangB1Modal input[name=mulaKerja]").val(data.ekedatangans.waktu_masuk_OT_1);
            $("#borangB1Modal input[name=akhirKerja]").val(data.ekedatangans.waktu_keluar_OT_1);
            $("#borangB1Modal input[name=jumlahKerja]").val(data.ekedatangans.jumlah_OT_1);
            $("#borangB1Modal input[name=jumlahOTKeseluruhan]").val(data.ekedatangans.jumlah_OT_keseluruhan);
            $("#borangB1Modal input[name=waktuAnjal]").val(data.ekedatangans.waktu_anjal);
                
            },
        error: function(data) { console.log(data); }
    });
}

function noEkedatanganWithDefaultValue() {
    var ekedatanganAttributes = new Array (
        'tarikh',
        'waktuMasuk',
        'waktuKeluar',
        'jumlahWaktuKerja',
        'waktuMasukOT1',
        'waktuKeluarOT1',
        'jumlahOT1',
        'waktuMasukOT2',
        'waktuKeluarOT2',
        'jumlahOT2',
        'waktuMasukOT3',
        'waktuKeluarOT3',
        'jumlahOT3',
        'jumlahOTKeseluruhan',
        'waktuAnjal'
    );

    ekedatanganAttributes.forEach(att => {
        $("#borangB1Modal input[name="+att+"]").val("N/A");
    });
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
    // console.log('calculated days', days);

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