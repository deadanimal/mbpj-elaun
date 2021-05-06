var counterPermohonan = 0;

function counterBuffer(counter) {
    counterPermohonan = counter;
}

function saveCatatan() {
    var textAlert = 'Tolak permohonan';
    var is_kemaskini = 0;
    var id_permohonan = document.getElementById('tolakBtn'+counterPermohonan).getAttribute('value');
    var jenis_permohonan = document.getElementById('tolakBtn'+counterPermohonan).getAttribute('data-value');

    if (document.getElementById('perluKemaskini').checked) { 
        is_kemaskini = 1; 
        textAlert = 'Permohonan perlu dikemaskini';
    }

    Swal.fire({
        icon: 'info',
        title: textAlert,
        text: '',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tutup'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "catatan/" + id_permohonan,
                type: 'PUT',
                data: {
                    is_kemaskini : is_kemaskini,
                    jenis_permohonan : jenis_permohonan,
                    catatan : document.getElementById('semakan-catatan').value,
                },
                success: function() {
                    if (is_kemaskini) {
                        permohonanPerluKemaskiniAlert();
                    } else {
                        permohonanDitolakAlert()
                    }
        
                    showDatatable(jenis_permohonan);
                },
                error: function() { console.log('Catatan failed'); }
            });  
        } else if (result.isDenied) { 
            Swal.fire('', '', 'info') 
        }        
        })
}

function clearInputCatatan() {
    document.getElementById('semakan-catatan').value = "";
    document.getElementById('perluKemaskini2').checked = false;
    document.getElementById('perluKemaskini').checked = false;
}

function permohonanDitolakAlert() {
    Swal.fire({
        icon: 'success',
        title: 'Tolak Ditolak',
        text: 'Permohonan telah ditolak',
        confirmButtonText : 'Tutup'
    })
}

function permohonanPerluKemaskiniAlert() {
    Swal.fire({
        icon: 'success',
        title: 'Permohonan Perlu Kemaskini',
        text: 'Permohonan telah dihantar untuk kemaskini',
        confirmButtonText : 'Tutup'
    })
}
