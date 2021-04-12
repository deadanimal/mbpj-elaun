$(document).ready(function(){
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
    showAllUser();
}) 

function showAllUser(){
    var id_user = $('#userID').val()
    var senaraiOnCallDT = $('#senaraiOnCallDT').DataTable({
                dom: 'lrtip',
                destroy: true,
                processing: true,
                autoWidth: true,
                language: {
                    paginate: {
                        previous: "<",
                        next: ">"
                    }
                },
                serverSide: true,
            ajax: {
                url: "penyelia-on-call/" + id_user,
                type: 'GET',
                data: {
                }
            },
                columns: [
                    {data: null},
                    {data: 'USERID'},
                    {data: 'NAME'},
                    {data: 'role.name'},
                    {data: null},
                ],  
                columnDefs: [
                    {
                        targets: [1],
                        function(data,type,row){
                            console.log({data})
                        }
                    },
                ], 
            });
            senaraiOnCallDT.on('draw.dt', function () {
                var info = senaraiOnCallDT.page.info();
                senaraiOnCallDT.column(0, { search: 'applied', order: 'applied', page: 'applied' }).nodes().each(function (cell, i) {
                    cell.innerHTML = i + 1 + info.start;
                });
            });
}