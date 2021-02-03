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

var tabPilihan = '0';
$(document).ready(function(){
    $("#tabPilihanPermohonanKerjaLebihMasa").click(function(){
        tabPilihan = '0';
    });
    $("#tabPilihanTuntutanElaunLebihMasa").click(function(){
        tabPilihan = '1';
    });
});

function checkUser(){
    // OT1 = 00
    // EL1 = 01
    // OT2 = 10
    // EL2 = 11
    var pilihan = document.getElementById('selectJenisPermohonan').value;


    if (pilihan == 'individu') {
        pilihan = '0' + tabPilihan;
    }
    if (pilihan == 'berkumpulan') {
        pilihan = '1' + tabPilihan;
    }

    switch(pilihan) {
        case '00':
            showDatatable(pilihan);
            break;
        case '01':
            showDatatable(pilihan);
            break;
        case '10':
            showDatatable(pilihan);
            break;
        case '11':
            showDatatable(pilihan);
            break;
        default:
            alert('Sila pilih jenis permohonan');
    }
}

function showUser() {
    var id = document.querySelector("#noPekerja").value;

    $.ajax({
        type: 'GET',
        url: 'user/semakan-pekerja/' + id,
        success: function(data) {
            $("#formOTEL input[name=nama]").val(data.users.name);

            $('input').css('color', 'black')
        },
        error: function(data) {
            console.log(data);
        }
    });
}

function showDatatable(pilihan){
    var id_user = document.querySelector("#noPekerja").value;

                table = $('#datatable1').DataTable({
                destroy: true,
                processing: false,
                serverSide: true,
            ajax: {
                url: "penyelia-semakan/"+id_user,
                type: 'GET',
                data: {
                    pilihan: pilihan
                }
            },
                
                columns: [
            
                    {data: 'id_permohonan_baru', name:'id_permohonan_baru'},
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
                            var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center" onclick="changeDataTarget(); retrieveUserData('+id_user+', '+data.id_permohonan_baru+', '+ "'"+data.status+"'"+');"></i>' 
                            var button2 = '<i id="lulusBtn" data-toggle="modal" data-target="#modal-notification" class="btn btn-success btn-sm ni ni-check-bold" onclick="saveIDforKelulusan('+data.id_permohonan_baru+');" value=""></i>' 
                            var button3 = '<i id="tolakBtn" data-toggle="modal" data-target="#modal-reject" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="test('+data.id+')" value='+data.id+'></i>' 
                            var allButton = button1 + button2 + button3;
                            return allButton;
                        }
                    }
                ], 
            });        
}

$.fn.dataTableExt.ofnSearch['html-input'] = function(value) {
    return $(value).val();
};