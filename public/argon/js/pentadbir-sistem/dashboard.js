var table = $('#datatable').DataTable({
                
                "lengthMenu": [ 5, 10, 25, 50 ],
              columnDefs:[{targets:3, render:function(data){
                  return moment(data).format('DD/MM/YYYY');
                }}],
                buttons: [
                  {
                  extend: 'pdfHtml5',
                  title: 'Audit Trail'
                  }
              ],
              responsive:true,
              autoWidth:false,
            });

function printAudit(){
  table.button( '.buttons-pdf' ).trigger();
}