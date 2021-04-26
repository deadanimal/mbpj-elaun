table = $('#aduanDT').DataTable({
    dom: 'lrtip',
    scrollX: false,
    destroy: true,
    "lengthMenu": [ 5, 10, 25, 50 ],
    // processing: true,
    serverSide: true,
    responsive:true,
    autoWidth:false,
    language: {
        paginate: {
            previous: "<",
            next: ">"
        },
        lengthMenu:     "Tunjuk _MENU_ rekod",
        search: "Carian:",
        zeroRecords:    "Tiada rekod yang sepadan dijumpai",
        emptyTable:     "Tiada rekod",
        info:           "_START_ ke _END_ daripada _TOTAL_ rekod",
        infoEmpty:      "0 ke 0 daripada 0 rekod",
        infoFiltered:   "(ditapis daripada _MAX_ rekod)",
        processing:     "Dalam proses...",
    },
ajax: {
    url: "modul-aduan/",
    type: 'GET',
    },
    
    columns: [

        {data: 'id', name: 'id'},

        {data: 'created_at', name: 'created_at'},

        {data: null , name: null, searchable:false},

        {data: null, name: null, searchable:false},

        {data: null, name: null, searchable:false},
        
        {data: null , name: null, searchable:false},



       
    ],
    columnDefs: [
        {
            targets: [1],
            type: "date"
        },
        {
            targets: 2,
            render:function(data,type,row){
                return "<span>Aduan</span>"
            }
        },
        {
            targets: 3,
            render:function(data,type,row){
                return "<span>Catatan</span>"
            }
        },
        {
            targets: 4,
            render:function(data,type,row){
                return "<div class='container mx--3 rounded-pill text-center bg-success text-white'>Sudah Selesai</div>"
            }
        },
        {
            targets: 5,
            render: function(data,type,row){
                console.log(data.id);
                var button1 = '<button data-toggle="modal" id="buttonEdit" class="btn btn-success btn-sm " onclick="changeDataTarget('+data.id+')" data-target=""  >Balas</button>' 
                var button2 = '<button id="lulusBtn" data-toggle="modal" data-target="#modal-notification" class="btn btn-primary btn-sm " onclick="test('+data.id+')" value='+data.id+'>Semak</button>' 
                var button3 = '<button id="tolakBtn" data-toggle="modal" data-target="#modal-reject" class="btn btn-danger btn-sm" onclick="test('+data.id+')"  value='+data.id+'>Padam</button>' 
                var allButton = button1 + button2 + button3;
                return allButton;
            }
        }
    ],
    
});


$.fn.dataTable.ext.search.push(
    function (settings, data, dataIndex) {

        console.log(data);
        var valid = true;
        var min = moment($("#min").val(),"DD-MM-YYYY");
        if (!min.isValid()) { min = null; }
      console.log(min);

        var max = moment($("#max").val(),"DD-MM-YYYY");
        if (!max.isValid()) { max = null; }

        if (min === null && max === null) {
            
            valid = true;
        }
        else {

            $.each(settings.aoColumns, function (i, col) {
              
                if (col.type == "date") {
                    var cDate = moment(data[i],'DD-MM-YYYY');
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
    
    $('#aduanDT').DataTable().draw();
});

$('#min').datepicker({
    dateFormat: 'dd-mm-yy',
});

$('#max').datepicker({
    dateFormat: 'dd-mm-yy',
});