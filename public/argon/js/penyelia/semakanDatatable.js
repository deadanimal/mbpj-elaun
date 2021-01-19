var table = $("#datatable1").DataTable();
    table = $('#datatable1').DataTable({
        destroy:true,
    "lengthMenu": [ 5, 10, 25, 50 ],
    // processing: false,
    // serverSide: true,
    responsive:true,
    autoWidth:false,
// ajax: {
//     url: "penyelia-semakan",
//     type: 'GET',
//     },
    
//     columns: [

//         {data: 'id', name: 'id'},

//         {data: 'name', name: 'name'},

//         {data: 'email', name: 'email'},

//         {data: 'created_at', name: 'created_at'},
        
//         {data: 'status', name: 'status'},

//         {data: null , name: null},

//         // {data: null, name: null},

       
//     ],

});
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
})

function checkUser(){
    showDatatable();
}
function showDatatable(){
    var id = document.querySelector("#noPekerja").value
    
    
    // $.ajax({
    //     url: "/penyelia/penyelia-semakan/"+id,
    //     type: 'GET',
    //     // dataType: 'json',
    //     // data:{ id: id},
    //     success: function (result) {
            // data = JSON.parse(result);

                table = $('#datatable1').DataTable({
                destroy: true,
                "lengthMenu": [ 5, 10, 25, 50 ],
                processing: false,
                serverSide: true,
                responsive:true,
                autoWidth:false,
            ajax: {
                url: "penyelia-semakan/"+id,
                type: 'GET',
                },
                
                columns: [
            
                    {data: 'id', name: 'id'},
            
                    {data: 'name', name: 'name'},
            
                    {data: 'email', name: 'email'},
            
                    {data: 'created_at', name: 'created_at'},
                    
                    {data: 'status', name: 'status'},
            
                    {data: null , name: null},
            
                    // {data: null, name: null},
            
                   
                ],
                columnDefs: [
                    {
                        targets: 5,
                        render: function(data,type,row){
                            console.log(data.id);
                            var button = $("<i></i>",{
                                "id": data[0] + "button",
                                "value":data.id,
                                "type": "button",
                                "onclick":test(data.id),
                                "class": "btn btn-primary btn-sm ni ni-align-center"
                            });
                            return button.prop("outerHTML");
                        }
                    }
                ],
                
            });

               
        //   },error: function(result){
        //       console.log('Error:',result)
        //   }
        // });
       
}

function test(id){
    console.log("masuk", id);
}

$.fn.dataTableExt.ofnSearch['html-input'] = function(value) {
    return $(value).val();
};

// $("#datatable td select").on('change', function() {
//     var $td = $(this).parent();
//     var value = this.value;
//     $td.find('option').each(function(i, o) {
//       $(o).removeAttr('selected');
//       if ($(o).val() == value) $(o).attr('selected', true);
//     })
//     table.cell($td).invalidate().draw();
// });    



// function editTaskForm(todo_id) {
//     $.ajax({
//         type: 'GET',
//         url: '/todolist/' + todo_id,
//         success: function(data) {
//             $("#edit-error-bag").hide();
//             $("#frmEditTodo input[name=todo]").val(data.title.title);
//             $("#frmEditTodo input[name=description]").val(data.title.description);
//             $("#frmEditTodo input[name=todo_id]").val(data.title.id);
//             $('#editTodoModal').modal('show');
//         },
//         error: function(data) {
//             console.log(data);
//         }
//     });
// }


// CONTROLLER FOR AJAX GET
// public function show($id)
// {
//     $todos = Todo::find($id);

//     return response()->json([
//         'error' => false,
//         'title'  => $todos,
//     ], 200);
// }