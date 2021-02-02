var table = $('#adminDT').DataTable({
    dom:'lrtip',
    responsive:true,
    autoWidth:false,
    "lengthMenu": [ 5, 10, 25, 50 ],
    buttons:[
      {
        extend: 'pdfHtml5',
        className: 'pdf',
        title: 'Audit Trail',
        text: '<span id="printButton" style="cursor: pointer"><i class="fa fa-print fa-3x" ></i></span>'
        }
    ],
    columnDefs:[
      {
        type:'date',
        targets:3,
        render:function(data){
          return moment(data).format('DD/MM/YYYY');
        }
      }
    ]
});

$.fn.dataTable.ext.search.push(
  function (settings, data, dataIndex) {

      console.log(data);
      var valid = true;
      var min = moment($("#min").val());
      if (!min.isValid()) { min = null; }
    console.log(min);

      var max = moment($("#max").val());
      if (!max.isValid()) { max = null; }

      if (min === null && max === null) {
          
          valid = true;
      }
      else {

          $.each(settings.aoColumns, function (i, col) {
            
              if (col.type == "date") {
                  var cDate = moment(data[i],'DD/MM/YYYY');
                console.log(cDate);
              
                  if (cDate.isValid()) {
                      if (max !== null && max.isBefore(cDate)) {
                          valid = false;
                      }
                      if (min !== null && cDate.isBefore(min)) {
                          valid = false;
                      }
                  }
                  else {
                      valid = false;
                  }
              }
          });
      }
      return valid;
});

$("#btnGo").click(function () {
  console.log("searching")
  $('#adminDT').DataTable().draw();
});
function printTuntutan(){
  console.log("gfhj")
  table.button( '.buttons-pdf' ).trigger();
  }