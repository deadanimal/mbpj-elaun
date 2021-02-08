var table = $('#datatable1').DataTable({
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

var tabPilihan = 'OT';
$(document).ready(function(){
    $("#tabPilihanPermohonanKerjaLebihMasa").click(function(){
        tabPilihan = 'OT';
    });
    $("#tabPilihanTuntutanElaunLebihMasa").click(function(){
        tabPilihan = 'EL';
    });
    $("#tabPilihanPengesahanKerjaLebihMasa").click(function(){
        tabPilihan = 'PS';
    });
});

function checkUser(){
    var pilihan = document.getElementById('selectJenisPermohonan').value;

    switch (pilihan) {
        case 'individu':
            pilihan = tabPilihan + '1';
            break;
        case 'berkumpulan':
            pilihan = tabPilihan + '2';
            break;
        default:
            alert('Sila pilih jenis permohonan');
            break;
    }

    showDatatable(pilihan);
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
                url: "ketua-bahagian-semakan/"+id_user,
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