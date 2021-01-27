table = $('#aduanDT').DataTable({
    scrollX: false,
    destroy: true,
    "lengthMenu": [ 5, 10, 25, 50 ],
    processing: true,
    serverSide: true,
    // responsive:true,
    // autoWidth:false,
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

$.fn.dataTableExt.ofnSearch['html-input'] = function(value) {
    return $(value).val();
};