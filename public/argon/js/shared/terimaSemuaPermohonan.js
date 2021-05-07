function terimaSemuaPermohonan() {
    var markedCheckbox = document.getElementsByName('cboxSemakanPermohonan');  
    var individuOrBerkumpulan = document.getElementById('selectJenisPermohonan').value;
    var cboxMarked = 0;

    pilihan = individuOrBerkumpulan == 'out' ? tabPilihan : jenisPilihan;    

    for (var checkbox of markedCheckbox) {  
      if (checkbox.checked) {
        cboxMarked = 1;
      }  
    }

    Swal.fire({
      icon: 'info',
      title: 'Luluskan semua permohonan yang dipilih?',
      text: '',
      showCloseButton: true,
      showCancelButton: true,
      confirmButtonText: 'Ya',
      cancelButtonText: 'Tutup'
    }).then((result) => {
        if (result.isConfirmed) {
          if (!cboxMarked){
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Pilih sekurang-kurangnya satu permohonan',
            })
          } else {

            for (var checkbox of markedCheckbox) {  
              if (checkbox.checked) {
                approvedKelulusanAjax(checkbox.value);
              }  
            }

            showDatatable(pilihan);   
      
            Swal.fire(
              'Permohonan Diluluskan',
              'Sedang Diproses',
              'success'
            );
          }
        } else if (result.isDenied) { Swal.fire('', '', 'info') }        
      })
}

function toggleCheckboxSemakan(source) {
    checkboxes = document.getElementsByName('cboxSemakanPermohonan');
    
    for(var i=0, n=checkboxes.length;i<n;i++) {
        checkboxes[i].checked = source.checked;
    }
}