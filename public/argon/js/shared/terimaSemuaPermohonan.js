function terimaSemuaPermohonan() {
    var markedCheckbox = document.getElementsByName('cboxSemakanPermohonan');  
    var individuOrBerkumpulan = document.getElementById('selectJenisPermohonan').value;
    var cboxMarked = 0;

    pilihan = individuOrBerkumpulan == 'out' ? tabPilihan : jenisPilihan;    

    for (var checkbox of markedCheckbox) {  
      if (checkbox.checked) {
        approvedKelulusanAjax(checkbox.value, pilihan);
        cboxMarked = 1;
      }  
    }
    
    if (!cboxMarked){
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Pilih sekurang-kurangnya satu permohonan',
      })
    }

}

function toggleCheckboxSemakan(source) {
    checkboxes = document.getElementsByName('cboxSemakanPermohonan');
    
    for(var i=0, n=checkboxes.length;i<n;i++) {
        checkboxes[i].checked = source.checked;
    }
}