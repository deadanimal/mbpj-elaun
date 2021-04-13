$(document).ready(function(){

    showDatatable();
    $('#dashboardKJDT_paginate').addClass('mb-4');

})

function showDatatable(){
    var id_user = $('#userID').val()
                dashboardKJDT = $('#dashboardKJDT').DataTable({
                dom: 'lrtip',
                destroy: true,
                lengthMenu: [ 5, 10, 25, 50 ],
                processing: true,
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
                url: "ketua-jabatan-dashboard/"+id_user,
                type: 'GET',
            },

            columns: [
                {data: null},
                {data: 'id_permohonan_baru', name:'id_permohonan_baru'},
                {data: 'created_at'},
                {data: 'masa_mula'},
                {data: 'masa_akhir'},
                {data: 'masa'},
                {data: null},
                {data: 'jenis_permohonan'},
                {data: 'status_akhir'}
            ],  
            columnDefs: [
                {
                    searchable: false,
                    orderable: false,
                    targets: 0
                },
                {
                    targets:1,
                    visible: false,
                    searchable:true
                },
                {
                    targets: [2],
                    type: "date",
                    render: function(data,type,row){
                        formattedDate = moment(data).format("DD/MM/YYYY")
                        return formattedDate;
                    }
                },
                {
                    targets: 6,
                    mRender: function(data,type,row){

                        // var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center" onclick="changeDataTarget('+"'"+data.jenis_permohonan+"'"+'); retrieveUserData('+id_user+', '+data.id_permohonan_baru+', '+ "'"+data.jenis_permohonan+"'"+');"></i>' 
                        // var button2 = '<i id="lulusBtn" class="btn btn-success btn-sm ni ni-check-bold" onclick="approvedKelulusan('+data.id_permohonan_baru+','+"'"+pilihan+"'"+');" value=""></i>' 
                        // var button3 = '<i id="tolakBtn'+ counter +'" onclick="counterBuffer('+ counter +')" data-toggle="modal" data-target="#modal-reject" class="btn btn-danger btn-sm ni ni-fat-remove" data-value="'+data.jenis_permohonan.substr(0, 2)+'" value="'+data.id_permohonan_baru+'"></i>' 
                        // var allButton = button1 + button2 + button3;
                        // return allButton;
                        return '';
                        
                        
                    }
                },
                {
                    targets: 7,
                    visible: false,
                    searchable: true
                },
                {
                    targets: 8,
                    visible: false,
                    searchable: true
                }
            ], 
            order: [ 1, 'asc' ]
        });
        
        dashboardKJDT.on('draw.dt', function () {
            var info = dashboardKJDT.page.info();
            dashboardKJDT.column(0, { search: 'applied', order: 'applied', page: 'applied' }).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1 + info.start;
            });
        });
}

$("#selectJenisPermohonan").on('change',function(){

    var statusPilihan = $("#selectJenisPermohonan").val()
    if(statusPilihan == "lulus"){
        $('#dashboardKJDT').DataTable().columns(11).search(
            "0"
        ).draw();
    }else if(statusPilihan == "tolak"){
        $('#dashboardKJDT').DataTable().columns(11).search(
            "1"
        ).draw();
    }else if(statusPilihan == "dp"){
        $('#dashboardKJDT').DataTable().columns(11).search(
            "2"
        ).draw();
    }else{
        $('#dashboardKJDT').DataTable().columns(11).search(
            ""
        ).draw();
    }

})

