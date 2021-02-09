var jenisPilihan = 'OT';
var tabPilihan = 'OT';

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    showDatatable(jenisPilihan);
}) 

$("#tabPilihanPermohonanKerjaLebihMasa").click(function(){
    jenisPilihan = 'OT';
    $("#selectJenisPermohonan").val("out").trigger("change")
    showDatatable(jenisPilihan);
});

$("#tabPilihanTuntutanElaunLebihMasa").click(function(){
    jenisPilihan = 'EL';
    $("#selectJenisPermohonan").val("out").trigger("change")
    showDatatable(jenisPilihan);
});

$("#tabPilihanPengesahanKerjaLebihMasa").click(function(){
    jenisPilihan = 'PS';
    $("#selectJenisPermohonan").val("out").trigger("change")
    showDatatable(jenisPilihan);
});

$("#padamCarian").click(function(){
    $("#noPekerja").val("");
    $("#nama-semakan").val("");
    $("#selectJenisPermohonan").val("out").trigger("change")
    showDatatable(jenisPilihan);
});

function checkUser(){
    var id = document.querySelector("#noPekerja").value;
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
    var pilihan = document.getElementById('selectJenisPermohonan').value;

    if(id != '' || pilihan != 'out'){
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
}

function showDatatable(pilihan){
    
    var id_user = document.querySelector("#noPekerja").value;
    if(id_user == ''){
        id_user = 'noID';
    }
            console.log(id_user, pilihan)
                table = $('#semakanKJDT').dataTable({
                dom: 'lrtip',
                destroy: true,
                processing: true,
                serverSide: false,
            ajax: {
                url: "ketua-jabatan-semakan/"+id_user,
                type: 'GET',
                data: {
                    pilihan: id_user != '' ? pilihan : jenisPilihan
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
                    {data: null},
                    {data: 'status'}
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
                            if(id_user != "noID"){
                                console.log(id_user,',',data.id_permohonan_baru,',',data.status)
                                var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center" onclick="changeDataTarget('+"'"+data.status+"'"+'); retrieveUserData('+id_user+', '+data.id_permohonan_baru+', '+ "'"+data.status+"'"+');"></i>' 
                                var button2 = '<i id="lulusBtn" data-toggle="modal" data-target="#modal-notification" class="btn btn-success btn-sm ni ni-check-bold" onclick="saveIDforKelulusan('+data.id_permohonan_baru+');" value=""></i>' 
                                var button3 = '<i id="tolakBtn" data-toggle="modal" data-target="#modal-reject" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="test('+id_user+')" value='+data.id+'></i>' 
                                var allButton = button1 + button2 + button3;
                                return allButton;
                            }else 
                            {
                                console.log(data.users[0].id);
                                var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center" onclick="changeDataTarget('+"'"+data.status+"'"+'); retrieveUserData('+data.users[0].id+', '+data.id_permohonan_baru+', '+ "'"+data.status+"'"+');"></i>' 
                                var button2 = '<i id="lulusBtn" data-toggle="modal" data-target="#modal-notification" class="btn btn-success btn-sm ni ni-check-bold" onclick="saveIDforKelulusan('+data.id_permohonan_baru+');" value=""></i>' 
                                var button3 = '<i id="tolakBtn" data-toggle="modal" data-target="#modal-reject" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="test('+data.users[0].id+')" value='+data.id+'></i>' 
                                var allButton = button1 + button2 + button3;
                                return allButton;
                            }
                        }
                    },
                    {
                        targets: 10,
                        visible: false,
                        searchable: true
                    }
                ],
                
            });
            if(id_user != ''){
            $('#semakanKJDT').DataTable().search(
                $("#noPekerja").val(),
                pilihan
            ).draw();
            }else
            {
                
            }
}

function test(a){
    console.log('test',a);
}

$("#selectJenisPermohonan").on("change",function(){
    var pilihan = document.getElementById('selectJenisPermohonan').value;
    var jenisPermohonan = '';
    switch (pilihan) {
        case 'individu':
            pilihan = tabPilihan + '1';
            break;
        case 'berkumpulan':
            pilihan = tabPilihan + '2';
            break;
        default:
            showDatatable(jenisPilihan);
            break;
    }
    console.log(pilihan)
   
    $('#semakanKJDT').DataTable().search(       
        pilihan
    ).draw();
});

$.fn.dataTable.ext.search.push(
    function (settings, data, dataIndex) {

        console.log(data);
        console.log(moment($("#min").val()))
        var valid = true;
        var min = moment($("#min").val(),"DD/MM/YYYY");
        if (!min.isValid()) { min = null; }
      console.log(min);

        var max = moment($("#max").val(),"DD/MM/YYYY");
        if (!max.isValid()) { max = null; }

        if (min === null && max === null) {
            valid = true;
        }
        else {

            $.each(settings.aoColumns, function (i, col) {
              
                if (col.type == "date") {
                    var cDate = moment(data[i],'DD/MM/YYYY');
                  console.log(cDate);
                
                    if (cDate.isValid()) {
                        if (max !== null && max.isBefore(cDate)) {
                            valid = false;
                        }
                        if (min !== null && cDate.isBefore(min)) {
                            valid = false;
                        }
                    }
                    else {
                        valid = false;
                    }
                }
            });
        }
        return valid;
});

$("#semakPenyelia").click(function () {
    checkUser();
    showUser();    
});

$('#min').datepicker({
    dateFormat: 'dd/mm/yy',
});

$('#max').datepicker({
    dateFormat: 'dd/mm/yy',
});

$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    var target = $(e.target).attr("value")
    tabPilihan = target;
});
