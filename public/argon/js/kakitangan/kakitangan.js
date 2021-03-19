$(document).ready(function(){
    $('#permohonan').show();
    $('#tuntutan').hide();
    $('#lulus').hide();
    $('#tolak').hide();
})


    $(function () {

        $("#jenisTable").change(function () {
            if ($(this).val() == "permohonanan") {
                $('#permohonan').show();
                $("#tuntutan").hide();
                $('#lulus').hide();
                $('#tolak').hide();
            }
            else if ($(this).val() == "tuntutan") {
                $('#permohonan').hide();
                $("#tuntutan").show();
                $('#lulus').hide();
                $('#tolak').hide();

            }else if ($(this).val() == "lulus") {
                $('#permohonan').hide();
                $("#tuntutan").hide();
                $('#lulus').show();
                $('#tolak').hide();

            }else if ($(this).val() == "tolak") {
                $('#permohonan').hide();
                $("#tuntutan").hide();
                $('#lulus').hide();
                $('#tolak').show();

            }else{
            $('#datatable').hide();
            $('#datatable2').hide();
            $('#lulus').hide();
            $('#tolak').hide(); 
    
            }
    
        });
    });

$(document).ready(function(){

    showDashboardDatatableKT();

})

function showDashboardDatatableKT(){
    var id_user = $("#userID").val()
    var pilihan = $('#jenisTable').val()
    var permohonanDT = $("#datatable1").DataTable({
        dom: "lrtip",
        scrollX: false,
        destroy: true,
        lengthMenu: [ 5, 10, 25, 50 ],
        processing: true,
        serverSide: true,
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
            {data: 'jenis_permohonan'},
            {data: 'users[*].jumlah_tuntutan_elaun'},
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
                    formattedDate = moment(data).format("DD/MM/YYYY")
                    return formattedDate;
                }
            },
            {
                targets: [2],
                type: "date",
                render: function(data,type,row){
                    formattedDate = moment(data).format("DD/MM/YYYY")
                    return formattedDate;
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
        

    var tuntutanDT = $("#tuntutanDT").DataTable({
        dom: "lrtip",
        scrollX: false,
        destroy: true,
        lengthMenu: [ 5, 10, 25, 50 ],
        // processing: true,
        // serverSide: true,
    })   

    var lulusDT = $("#lulusDT").DataTable({
        dom: "lrtip",
        scrollX: false,
        destroy: true,
        lengthMenu: [ 5, 10, 25, 50 ],
        // processing: true,
        // serverSide: true,
    })   

    var tolakDT = $("#tolakDT").DataTable({
        dom: "lrtip",
        scrollX: false,
        destroy: true,
        lengthMenu: [ 5, 10, 25, 50 ],
        // processing: true,
        // serverSide: true,
    })   

}