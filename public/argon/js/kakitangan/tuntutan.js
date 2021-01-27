var table = $('#tuntutanDT').DataTable({
      
      "lengthMenu": [ 5, 10, 25, 50 ],
      buttons: [
        {
          extend:'pdfHtml5',
          title:'Senarai Permohonan Tuntutan'  
        }
    ],
    ajax: {
      url: "tuntutan/",
      type: 'GET',
      },
      
      columns: [
  
          {data: 'id', name: 'id'},
  
          {data: null , name: null, searchable:false},
  
          {data: null, name: null, searchable:false},
  
          {data: null, name: null, searchable:false},
  
          {data: 'created_at', name: 'created_at'},
  
          {data: null , name: null, searchable:false},
  
          {data: null , name: null, searchable:false},
          
          {data: 'status', name: 'status'},
  
          {data: null , name: null, searchable:false},
  
          {data: null , name: null, searchable:false},
  
          // {data: null, name: null},
  
         
      ],
      columnDefs: [
          {
              targets: 1,
              render:function(data,type,row){
                  return "<span>12/1/2020</span>"
              }
          },
          {
              targets: 2,
              render:function(data,type,row){
                  return "<span>2.30 PM</span>"
              }
          },
          {
              targets: 3,
              render:function(data,type,row){
                  return "<span>5.30 PM</span>"
              }
          },
          {
              targets: 5,
              render:function(data,type,row){
                  return "<span>Selasa</span>"
              }
          },
          {
              targets: 6,
              render:function(data,type,row){
                  return "<span>Petang</span>"
              }
          },
          {
              targets: 8,
              render:function(data,type,row){
                  return "<span>Before</span>"
              }
          },
          {
              targets: 9,
              render: function(data,type,row){
                  console.log(data.id);
                  var button1 = '<i data-toggle="modal" id="buttonEdit" class="btn btn-primary btn-sm ni ni-align-center" onclick="changeDataTarget('+data.id+')" data-target=""  ></i>' 
                  var button2 = '<i id="lulusBtn" data-toggle="modal" data-target="#modal-notification" class="btn btn-success btn-sm ni ni-check-bold" onclick="test('+data.id+')" value='+data.id+'></i>' 
                  var button3 = '<i id="tolakBtn" data-toggle="modal" data-target="#modal-reject" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="test('+data.id+')"  value='+data.id+'></i>' 
                  var allButton = button1 + button2 + button3;
                  return allButton;
                  
              }
          }
      ],
});

function printTuntutan(){
  console.log("gfhj")
  table.button( '.buttons-pdf' ).trigger();
}