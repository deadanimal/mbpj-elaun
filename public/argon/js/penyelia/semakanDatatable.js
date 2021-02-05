
let jenisPilihan = 'OT';
var tabPilihan = '0';

    
$(document).ready(function(){
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    getAllPermohonan();
}) 
$("#tabPilihanPermohonanKerjaLebihMasa").click(function(){
    jenisPilihan = 'OT';
    getAllPermohonan();
});
$("#tabPilihanTuntutanElaunLebihMasa").click(function(){
    jenisPilihan = 'EL';
    getAllPermohonan();
});
$("#tabPilihanPengesahanKerjaLebihMasa").click(function(){
    jenisPilihan = 'PS';
    getAllPermohonan();
});
$("#padamCarian").click(function(){
    getAllPermohonan();
});


function getAllPermohonan(){
    
    
    console.log('permohonan: ',jenisPilihan)
    var table = $('#semakanPYDT').DataTable({
        dom:'lrtip',
        destroy:true,
        lengthMenu: [ 5, 10, 25, 50 ],
        responsive:false,
        autoWidth:false,
        processing:false,
        serverSide:true,
        ajax: {
            url: "penyelia-semakan/",
            type: 'GET',
            data: {
                jenisPilihan: jenisPilihan 
            }
        },
            
            columns: [
        
                {data: 'id_permohonan_baru', name:'id_permohonan_baru'},
                {data: 'tarikh_permohonan'},
                {data: 'masa_mula', searchable:false},
                {data: 'masa_akhir', searchable:false},
                {data: 'masa', searchable:false},
                {data: 'hari', searchable:false},
                {data: 'waktu', searchable:false},
                {data: 'kadar_jam', searchable:false},
                {data: 'tujuan', searchable:false},
                {data: null, searchable:false},
                {data: 'users_id'},
                {data: 'jenis_permohonan'}
               
            ],  
            columnDefs: [
                {
                    targets: [1],
                    type: 'date',
                    render: function(data,type,row){
                        
                        formattedDate = moment(data).format("DD/MM/YYYY")
                        return formattedDate;
                    }
                },
                {
                    targets: 9,
                    mRender: function(data,type,row){
                        var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center" onclick="changeDataTarget(); retrieveUserData();"></i>' 
                        var button2 = '<i id="lulusBtn" data-toggle="modal" data-target="#modal-notification" class="btn btn-success btn-sm ni ni-check-bold" onclick="saveIDforKelulusan();" value=""></i>' 
                        var button3 = '<i id="tolakBtn" data-toggle="modal" data-target="#modal-reject" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="test()" value=></i>' 
                        var allButton = button1 + button2 + button3;
                        return allButton;
                    }
                },
                {
                    targets: [10],
                    // visible:false,
                    searchable: true,
                },
            ],
    });
}


function checkUser(){
    // OT1 = 00
    // EL1 = 01
    // OT2 = 10
    // EL2 = 11
    // PS1 = 02
    // PS2 = 12
    var id = document.querySelector("#noPekerja").value;
    var pilihan = document.getElementById('selectJenisPermohonan').value;

    switch (pilihan) {
        case 'individu':
            pilihan = '0' + tabPilihan;
            break;
        case 'berkumpulan':
            pilihan = '1' + tabPilihan;
            break;
        default:
            alert('Sila pilih jenis permohonan');
            break;
    }
    if(id != ''){
    showDatatable(pilihan);
    }else {
        alert('Sila isi no. pekerja');
    }
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
    var jenisPermohonan = '';
    if(pilihan == 00){
        jenisPermohonan = 'OT1'
    }else if(pilihan == 10){
        jenisPermohonan = 'OT2'
    }else if(pilihan == 01){
        jenisPermohonan = 'EL1'
    }else if(pilihan == 11){
        jenisPermohonan = 'EL2'
    }else if(pilihan == 02){
        jenisPermohonan = 'PS1'
    }else if(pilihan == 12){
        jenisPermohonan = 'PS2'
    }
                table = $('#semakanPYDT').DataTable({
                dom: 'lrtip',
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
                    {data: null},
                    {data: 'users_id'},
                    {data: 'jenis_permohonan'}

                   
                ],  
                columnDefs: [
                    {
                        targets: [1],
                        type: "date",
                        render: function(data,type,row){
                            newDate = new Date(data);
                            return newDate;
                        }
                        
                    },
                    {
                        targets: 9,
                        mRender: function(data,type,row){
                            var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center" onclick="changeDataTarget(); retrieveUserData('+id_user+', '+data.id_permohonan_baru+', '+ "'"+data.status+"'"+');"></i>' 
                            var button2 = '<i id="lulusBtn" data-toggle="modal" data-target="#modal-notification" class="btn btn-success btn-sm ni ni-check-bold" onclick="saveIDforKelulusan('+data.id_permohonan_baru+');" value=""></i>' 
                            var button3 = '<i id="tolakBtn" data-toggle="modal" data-target="#modal-reject" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="test('+data.id+')" value='+data.id+'></i>' 
                            var allButton = button1 + button2 + button3;
                            return allButton;
                        }
                    },
                    {
                        targets: [10],
                        // visible:false,
                        searchable: true,
                    },
                ],
                
            });

            $('#semakanPYDT').DataTable().search(
                $("#noPekerja").val(),
                jenisPermohonan
            ).draw();
         
}

$("#selectJenisPermohonan").on("change",function(){
    var pilihan = document.getElementById('selectJenisPermohonan').value;
    var jenisPermohonan = '';
    switch (pilihan) {
        case 'individu':
            pilihan = '0' + tabPilihan;
            break;
        case 'berkumpulan':
            pilihan = '1' + tabPilihan;
            break;
        default:
            getAllPermohonan();
            break;
    }
    console.log(pilihan)
        // OT1 = 00
    // EL1 = 01
    // OT2 = 10
    // EL2 = 11
    // PS1 = 02
    // PS2 = 12
    if(pilihan == 00){
        jenisPermohonan = 'OT1'
    }else if(pilihan == 10){
        jenisPermohonan = 'OT2'
    }else if(pilihan == 01){
        jenisPermohonan = 'EL1'
    }else if(pilihan == 11){
        jenisPermohonan = 'EL2'
    }else if(pilihan == 02){
        jenisPermohonan = 'PS1'
    }else if(pilihan == 12){
        jenisPermohonan = 'PS2'
    }
    $('#semakanPYDT').DataTable().search(
        
        jenisPermohonan
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