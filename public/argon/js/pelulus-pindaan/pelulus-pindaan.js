var pindaanDT = $("#pindaanDT").DataTable({
    dom: 'lrtip',
    scrollX: false,
    destroy: true,
    lengthMenu: [ 5, 10, 25, 50 ],
    responsive: true,
    autoWidth:false,
    // processing: true,
    // serverSide: true,
    ajax:{
        url:'dashboard/',
        type:'GET'
    },
    columns:[
        {data:null,         name:null},

        {data:'name',       name:'name'},

        {data:'created_at', name:'created_at'},

        {data:'id',         name:'id'},

        {data:null,         name:null,  searchable:false},

        {data:null,         name:null,  searchable:false},

        {data:'status',     name:'status'},

        {data:null,         name:null,  searchable:false}
    ],
    columnDefs:[
        {
            targets:0,
            searchable: false,
            // "class": "index",
            orderable: true,
            mRender: function(data,type,row,meta){
                return  meta.row + 1;
            }
        },
        {
            targets: 2,
            type: 'date'
        },
        {
            targets:4,
            mRender: function(data,type,row){
                return "<span>En. Sarip</span>"
            }
        },
        {
            targets:5,
            mRender: function(data,type,row){
                return "<span>Claim </span>"
            }
        },
        {
            targets:6,
            mRender: function(data,type,row){
                if(data == "01"){
                    return '<div id="buttonEdit" class="container text-white bg-success btn-sm text-center"  data-target=""  >Lulus</div>' 
                }else if(data =="00"){
                    return '<div id="buttonEdit" class="container text-white bg-danger btn-sm text-center"  data-target=""  >Tolak</div>' 
                }
            }
        },
        {
            targets:7,
            mRender: function(data,type,row){
                var allbutton;
                var button2 = '<button id="lulusBtn" data-toggle="modal" data-target="#modal-notification" class="btn btn-success btn-sm ni ni-check-bold" onclick="test('+data.id+')" value='+data.id+'></button>' 
                var button3 = '<button id="tolakBtn" data-toggle="modal" data-target="#modal-reject" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="test('+data.id+')"  value='+data.id+'></button>' 
                return allbutton = button2 + button3;
            }
        },
    ],
   
}) 


$.fn.dataTable.ext.search.push(
    function (settings, data, dataIndex) {

          
        var valid = true;
        var min = moment($("#min").val(),'DD-MM-YYYY');
        if (!min.isValid()) { min = null; }
      console.log(min);

        var max = moment($("#max").val(),'DD-MM-YYYY');
        if (!max.isValid()) { max = null; }

        if (min === null && max === null) {
            // no filter applied or no date columns
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
    $('#pindaanDT').DataTable().draw();
});

$('#min').datepicker({
    dateFormat: 'dd-mm-yy',
});

$('#max').datepicker({
    dateFormat: 'dd-mm-yy',
});