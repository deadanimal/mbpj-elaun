var table = $('#adminDT').DataTable({
                
  "lengthMenu": [ 5, 10, 25, 50 ],
columnDefs:[{targets:3, render:function(data){
    return moment(data).format('DD/MM/YYYY');
  }}],
  
responsive:true,
autoWidth:false,
});

// function printAudit(){
//   console.log('hgfhg')
//   console.log(table.button('.buttons-pdf'));
//   table.button( '.buttons-pdf' ).trigger();
//   // table.buttons( $('a.dt-button.pdf') ).trigger();
// }

var buttons = new $.fn.dataTable.Buttons(table, {
buttons: [
{
extend: 'pdfHtml5',
className: 'pdf',
title: 'Audit Trail',
text: '<span id="printButton" style="cursor: pointer"><i class="fa fa-print fa-3x" ></i></span>'
}
],
}).container().appendTo($('#printdiv'));
// $("#printButton").on("click",function(){
//   console.log(table)
//   table.button( '.buttons-pdf' ).trigger();
// })