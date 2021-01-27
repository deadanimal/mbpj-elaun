$('#datatable').dataTable({
    scrollX: false,
    destroy: true,
    "lengthMenu": [ 5, 10, 25, 50 ],
    processing: true,
    serverSide: true,
    ajax: {
        url: "semakan/",
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
            // {
            //     type: "html-input",
            //     targets: 4,
            //     render:function(data,type,row){
            //         return moment(data).format("DD/MM/YYYY")
            //     }
            // },
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
                    // console.log(data.id);
                    var button1 = '<button data-toggle="modal" id="buttonEdit" class="btn btn-primary btn-sm align-center" onclick="editKemaskiniForm('+data.id+')" data-target=""  >Kemaskini</button>' 
                    var allButton = button1 
                    return allButton;
                }
            }
        ],
});


function editKemaskiniForm(id){
    $("#frmTuntutan input[name=name1]").val(id);
    $('#borangB1Modal').modal('show');
    
    console.log(id);
}

function closeModal(modal){
    $("#"+modal).modal("hide");
}