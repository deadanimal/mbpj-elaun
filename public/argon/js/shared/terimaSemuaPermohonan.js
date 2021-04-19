function terimaSemuaPermohonan() {
    var markedCheckbox = document.getElementsByName('cboxSemakanPermohonan');  
    var individuOrBerkumpulan = document.getElementById('selectJenisPermohonan').value;

    pilihan = individuOrBerkumpulan == 'out' ? tabPilihan : jenisPilihan;    

    for (var checkbox of markedCheckbox) {  
      if (checkbox.checked) {
        approvedKelulusanAjax(checkbox.value, pilihan);
      }  
    }
}

function toggleCheckboxSemakan(source) {
    checkboxes = document.getElementsByName('cboxSemakanPermohonan');
    
    for(var i=0, n=checkboxes.length;i<n;i++) {
        checkboxes[i].checked = source.checked;
    }
}