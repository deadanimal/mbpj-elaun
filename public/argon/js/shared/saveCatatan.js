var counterPermohonan = 0;

function counterBuffer(counter) {
    counterPermohonan = counter;
}

function saveCatatan() {
    var is_kemaskini = 0;
    var id_permohonan = document.getElementById('tolakBtn'+counterPermohonan).getAttribute('value');
    var jenis_permohonan = document.getElementById('tolakBtn'+counterPermohonan).getAttribute('data-value');

    if (document.getElementById('perluKemaskini').checked) { 
        is_kemaskini = 1; 
    } 

    $.ajax({
        url: "catatan/" + id_permohonan,
        // type: 'POST',
        type: 'PUT',
        data: {
            is_kemaskini : is_kemaskini,
            jenis_permohonan : jenis_permohonan,
            catatan : document.getElementById('semakan-catatan').value,
        },
        success: function() {
            if (is_kemaskini) {
                Swal.fire({
                    icon: 'success',
                    title: 'Permohonan Perlu Kemaskini',
                    text: 'Permohonan telah dihantar untuk kemaskini',
                    confirmButtonText : 'Tutup'
                })
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'Tolak Ditolak',
                    text: 'Permohonan telah ditolak',
                    confirmButtonText : 'Tutup'
                })
            }
            showDatatable(jenis_permohonan);
        },
        error: function() { console.log('Catatan failed'); }
    });    
}

function clearInputCatatan() {
    document.getElementById('semakan-catatan').value = "";
    document.getElementById('perluKemaskini2').checked = false;
    document.getElementById('perluKemaskini').checked = false;
}
