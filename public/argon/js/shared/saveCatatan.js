var counterPermohonan = 0;

function counterBuffer(counter) {
    counterPermohonan = counter;
}

function saveCatatan() {
    var is_kemaskini = 0;
    var id_permohonan = document.getElementById('tolakBtn'+counterPermohonan).getAttribute('value');

    if (document.getElementById('perluKemaskini').checked) { is_kemaskini = 1; }  

    $.ajax({
        url: "catatan/" + id_permohonan,
        type: 'POST',
        data: {
            catatan : document.getElementById('semakan-catatan').value,
            jenis_permohonan : document.getElementById('tolakBtn'+counterPermohonan).getAttribute('data-value'),
            is_kemaskini : is_kemaskini
        },
        success: function() {
            console.log("Catatan saved");
            showDatatable(jenisPermohonan);
        },
        error: function() { console.log('Catatan failed'); }
    });
}

function clearInputCatatan() {
    document.getElementById('semakan-catatan').value = "";
    document.getElementById('perluKemaskini2').checked = false;
    document.getElementById('perluKemaskini').checked = false;
}
