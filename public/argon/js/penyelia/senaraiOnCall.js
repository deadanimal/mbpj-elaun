$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    showAllUser();
}) 

function showAllUser(){
    var id_user = $('#userID').val()
    var senaraiOnCallDT = $('#senaraiOnCallDT').DataTable({
                dom: 'flrtip',
                destroy: true,
                processing: true,
                autoWidth: true,
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
                    {data: 'CUSTOMERID'},
                    {data: 'NIRC'},
                    {data: 'NAME'},
                    {data: 'role.name'},
                    {data: null},
                ],  
                columnDefs: [
                    {
                        targets: [5],
                        mRender: function(data,type,row){
                            if (!data.is_oncall) {
                                var button = '<button type="button" onclick="tambahOnCall('+data.CUSTOMERID+')" class="btn btn-sm btn-outline-primary"> Tambah On Call</button>' 
                            } else {
                                var button = '<button type="button" onclick="batalOnCall('+data.CUSTOMERID+')" class="btn btn-sm btn-outline-success"> On Call</button>' 
                            }
                            return button;
                        } 
                    }
                ], 
            });
            senaraiOnCallDT.on('draw.dt', function () {
                var info = senaraiOnCallDT.page.info();
                senaraiOnCallDT.column(0, { search: 'applied', order: 'applied', page: 'applied' }).nodes().each(function (cell, i) {
                    cell.innerHTML = i + 1 + info.start;
                });
            });
}