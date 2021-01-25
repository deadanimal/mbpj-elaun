var table = $("#datatable1").DataTable();
    table = $('#datatable1').DataTable({
        destroy:true,
    "lengthMenu": [ 5, 10, 25, 50 ],
    responsive:true,
    autoWidth:false,
});
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
})

function checkUser(){
    var pilihan = document.getElementById('selectJenisPermohonan').value;
    if (pilihan == 'individu' || pilihan == 'berkumpulan'){
        showDatatable();
    }else 
    alert('Sila pilih jenis permohonan');
}
function showDatatable(){
    var id = document.querySelector("#noPekerja").value

                table = $('#datatable1').DataTable({
                destroy: true,
                processing: false,
                serverSide: true,
            ajax: {
                url: "penyelia-semakan/"+id,
                type: 'GET',
                },
                
                columns: [
            
                    {data: 'id_permohonan_baru'},
                    {data: 'tarikh_permohonan'},
                    {data: 'masa_mula'},
                    {data: 'masa_akhir'},
                    {data: 'masa'},
                    {data: 'hari'},
                    {data: 'waktu'},
                    {data: 'kadar_jam'},
                    {data: 'tujuan'},
                    {data: null}
                   
                ],
                columnDefs: [
                    {
                        targets: 9,
                        mRender: function(data,type,row){
                            console.log(data.id);
                            // var button1 = '<i data-toggle="modal" id="buttonEdit" class="btn btn-primary btn-sm ni ni-align-center" onclick="changeDataTarget('+data.id+','+data.status+')" data-target=""></i>' 
                            var button1 = '<i data-toggle="modal" id="buttonEdit" class="btn btn-primary btn-sm ni ni-align-center" onclick="changeDataTarget('+data.id+')" data-target=""></i>' 
                            var button2 = '<i id="lulusBtn" data-toggle="modal" data-target="#modal-notification" class="btn btn-success btn-sm ni ni-check-bold" onclick="test('+data.id+')" value='+data.id+'></i>' 
                            var button3 = '<i id="tolakBtn" data-toggle="modal" data-target="#modal-reject" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="test('+data.id+')" value='+data.id+'></i>' 
                            var allButton = button1 + button2 + button3;
                            return allButton;
                        }
                    }
                ],
                
            });
       
}

function test(id){
    console.log("masuk", id);
}

$.fn.dataTableExt.ofnSearch['html-input'] = function(value) {
    return $(value).val();
};

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