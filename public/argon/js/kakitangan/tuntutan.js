$('#datatable').DataTable({
      dom: 'lBfrtip',
      "lengthMenu": [ 5, 10, 25, 50 ],
    columnDefs:[{targets:3, render:function(data){
        return moment(data).format('DD/MM/YYYY');
      }}],
      buttons: [
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5'
    ]
});