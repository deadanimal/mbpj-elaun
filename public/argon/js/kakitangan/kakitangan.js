var id_user = $("#userID").val()
var pilihan = $('#jenisTable').val()
var type = $("#type").val()

    $(function () {

        $("#jenisTable").change(function () {
            if ($(this).val() == "permohonan") {
                pilihan = $('#jenisTable').val()
                showDatatableKT();
                $("#footerDT").html('Lihat selanjutnya di semakan permohonan');
                $("#footerDT").attr("href", "/"+type+"/semakan");
            }
            else if ($(this).val() == "tuntutan") {
                pilihan = $('#jenisTable').val()
                showDatatableKT();
                $("#footerDT").html('Lihat selanjutnya di tuntutan permohonan');
                $("#footerDT").attr("href", "/"+type+"/tuntutan");

            }else if ($(this).val() == "lulus") {
                pilihan = $('#jenisTable').val()
                showDatatableKT();
                $("#footerDT").html('Lihat selanjutnya di semakan permohonan');
                $("#footerDT").attr("href", "/"+type+"/semakan");

            }else if ($(this).val() == "tolak") {
                pilihan = $('#jenisTable').val()
                showDatatableKT();
                $("#footerDT").html('Lihat selanjutnya di semakan permohonan');
                $("#footerDT").attr("href", "/"+type+"/semakan");

            }else{
            }
    
        });
    });


$(document).ready(function(){
    showDatatableKT();

})

function showDatatableKT(){

    var permohonanDT = $("#datatable1").DataTable({
        dom: "lrtip",
        scrollX: true,
        destroy: true,
        lengthMenu: [ 5, 10, 25, 50 ],
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
        processing: true,
        serverSide: true,
        responsive:true,
        autoWidth:false,
        ajax:{
            url:'dashboard/'+id_user,
            type:'GET',
            data:{
                pilihan : pilihan
            }
        },
        columns:[
            {data: null},
            {data: 'created_at'},
            {data: 'tarikh_mula_kerja'},
            {data: 'updated_at'},
            {data: 'jenis_permohonan'},
            {data: 'permohonan_with_users.jumlah_tuntutan_elaun'},
            {data: 'status'}
        ],
        columnDefs:[
            {
                targets:0,
                orderable:false,
                searchable:false,
            },
            {
                targets: [1],
                type: "date",
                render: function(data,type,row){
                    formattedDate = moment(data).format("DD-MM-YYYY")
                    return formattedDate;
                }
            },
            {
                targets: [2],
                type: "date",
                render: function(data,type,row){
                    formattedDate = moment(data,"DD-MM-YYYY").format("DD-MM-YYYY")
                    return formattedDate;
                }
            },
            {
                targets: [3],
                type: "date",
                render: function(data,type,row){
                    formattedDate = moment(data).format("DD-MM-YYYY")
                    return formattedDate;
                }
            },
            {
                targets: 5,
                render: function(data,type,row){
                    console.log(data);
                    return data;
                }
            },
        ],
        order: [ 1, 'asc' ]
        });
        
        permohonanDT.on('draw.dt', function () {
            var info = permohonanDT.page.info();
            permohonanDT.column(0, { search: 'applied', order: 'applied', page: 'applied' }).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1 + info.start;
            });
        });
        

}