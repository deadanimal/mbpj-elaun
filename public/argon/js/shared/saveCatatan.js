// var id_permohonan;

// function bufferIDPermohonan(id_permohonan_baru) {
//     id_permohonan = id_permohonan_baru;
//     console.log('buffer '+ id_permohonan);
// }

function saveCatatan() {
    var catatan = document.getElementById('semakan-catatan').value;
    var id_permohonan = document.getElementById('tolakBtn').getAttribute('value');
    console.log('savecatatan '+ id_permohonan);
    console.log('catatan '+ catatan);
    
    $.ajax({
        url: "permohonan-baru/semakan-kelulusan/catatan/" + id_permohonan,
        type: 'POST',
        data: {
            catatan : catatan
        },
        success: function() {
            console.log("Catatan saved");
            // $("#modal-reject").modal("hide");
        },
        error: function() {
            console.log('Catatan failed');
        }
    });
}