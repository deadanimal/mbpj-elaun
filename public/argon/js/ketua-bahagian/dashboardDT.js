$(document).ready(function(){

    showDatatable();
    $('#dashboardKBDT_paginate').addClass('mb-4');
})

function showDatatable(){
    var id_user = $('#userID').val()
                table = $('#dashboardKBDT').dataTable({
                dom: 'lrtip',
                destroy: true,
                lengthMenu: [ 5, 10, 25, 50 ],
                pagingType: "simple_numbers",
                processing: true,
                serverSide: false,
            ajax: {
                url: "ketua-bahagian-dashboard/"+id_user,
                type: 'GET',
            },

                columns: [
            
                    {data: 'id_permohonan_baru', name:'id_permohonan_baru'},
                    {data: 'tarikh_mula_kerja'},
                    {data: 'masa_mula'},
                    {data: 'masa_akhir'},
                    {data: 'masa'},
                    {data: 'hari'},
                    {data: 'waktu'},
                    {data: 'kadar_jam'},
                    {data: 'tujuan'},
                    {data: null},
                    {data: 'jenis_permohonan'},
                    {data: 'status_akhir'}

                ],  
                columnDefs: [
                    {
                        targets: [1],
                        type: "date",
                        render: function(data,type,row){
                            formattedDate = moment(data).format("DD/MM/YYYY")
                            return formattedDate;
                        }
                    },
                    {
                        targets: 9,
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
                        targets: 10,
                        visible: false,
                        searchable: true
                    },
                    {
                        targets: 11,
                        visible: false,
                        searchable: true
                    }
                ], 
                
            });
 
}

$("#selectJenisPermohonan").on('change',function(){

    var statusPilihan = $("#selectJenisPermohonan").val()
    if(statusPilihan == "lulus"){
        $('#dashboardKBDT').DataTable().columns(11).search(
            "0"
        ).draw();
    }else if(statusPilihan == "tolak"){
        $('#dashboardKBDT').DataTable().columns(11).search(
            "1"
        ).draw();
    }else if(statusPilihan == "dp"){
        $('#dashboardKBDT').DataTable().columns(11).search(
            "2"
        ).draw();
    }else{
        $('#dashboardKBDT').DataTable().columns(11).search(
            ""
        ).draw();
    }

})

