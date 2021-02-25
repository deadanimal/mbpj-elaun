var counterPermohonan = 0;

function counterBuffer(counter) {
    counterPermohonan = counter;
}

function saveCatatan() {
    var catatan = document.getElementById('semakan-catatan').value;
    var id_permohonan = document.getElementById('tolakBtn'+counterPermohonan).getAttribute('value');
    var jenisPermohonan = document.getElementById('tolakBtn'+counterPermohonan).getAttribute('data-value');
    var is_kemaskini = 0;

    if (document.getElementById('perluKemaskini').checked) {
        is_kemaskini = 1;
    }  

    $.ajax({
        url: "catatan/" + id_permohonan,
        type: 'POST',
        data: {
            catatan : catatan,
            jenis_permohonan : jenisPermohonan,
            is_kemaskini : is_kemaskini
        },
        success: function() {
            console.log("Catatan saved");
            showDatatable(jenisPermohonan);
            
        },
        error: function() {
            console.log('Catatan failed');
        }
    });
}

function clearInputCatatan() {
    document.getElementById('semakan-catatan').value = "";
    document.getElementById('perluKemaskini2').checked = false;
    document.getElementById('perluKemaskini').checked = false;
}
