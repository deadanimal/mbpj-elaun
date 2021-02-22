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
    var counter = 0;
    var id_user = document.querySelector("#noPekerja").value;

    if(id_user == ''){
        id_user = 'noID';
    }
                table = $('#semakanKSDT').dataTable({
                dom: 'lrtip',
                destroy: true,
                processing: true,
                serverSide: false,
            ajax: {
                url: "kerani-semakan-semakan/"+id_user,
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
                    {data: 'jenis_permohonan'},

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
                                counter++;
                                var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center" onclick="changeDataTarget('+"'"+data.jenis_permohonan+"'"+'); retrieveUserData('+id_user+', '+data.id_permohonan_baru+', '+ "'"+data.jenis_permohonan+"'"+');"></i>' 
                                var button2 = '<i id="lulusBtn" data-toggle="modal" data-target="#modal-notification" class="btn btn-success btn-sm ni ni-check-bold" onclick="approvedKelulusan('+data.id_permohonan_baru+','+"'"+pilihan+"'"+');" value=""></i>' 
                                var button3 = '<i id="tolakBtn'+ counter +'" onclick="counterBuffer('+ counter +')" data-toggle="modal" data-target="#modal-reject" class="btn btn-danger btn-sm ni ni-fat-remove" data-value="'+data.jenis_permohonan.substr(0, 2)+'" value="'+data.id_permohonan_baru+'"></i>' 
                                var allButton = button1 + button2 + button3;
                                return allButton;
                            } 
                            else {
                                counter++;
                                var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center" onclick="changeDataTarget('+"'"+data.jenis_permohonan+"'"+'); retrieveUserData('+data.users[0].id+', '+data.id_permohonan_baru+', '+ "'"+data.jenis_permohonan+"'"+');"></i>' 
                                var button2 = '<i id="lulusBtn" data-toggle="modal" data-target="#modal-notification" class="btn btn-success btn-sm ni ni-check-bold" onclick="approvedKelulusan('+data.id_permohonan_baru+','+"'"+pilihan+"'"+');" value=""></i>' 
                                var button3 = '<i id="tolakBtn'+ counter +'" onclick="counterBuffer('+ counter +')" data-toggle="modal" data-target="#modal-reject" class="btn btn-danger btn-sm ni ni-fat-remove" data-value="'+data.jenis_permohonan.substr(0, 2)+'" value="'+data.id_permohonan_baru+'"></i>' 
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
            $('#semakanKSDT').DataTable().search(
                $("#noPekerja").val(),
                pilihan
            ).draw();
            }else
            {
                
            }
}

$("#selectJenisPermohonan").on("change",function(){
    var pilihan = document.getElementById('selectJenisPermohonan').value;
    switch (pilihan) {
        case 'individu':
            pilihan = tabPilihan + '1';
            $('#semakanKSDT').DataTable().search(       
                pilihan
            ).draw();
            break;
        case 'berkumpulan':
            pilihan = tabPilihan + '2';
            $('#semakanKSDT').DataTable().search(       
                pilihan
            ).draw();
            break;
        default:
            showDatatable(tabPilihan);
            break;
    }
});

$.fn.dataTable.ext.search.push(
    function (settings, data, dataIndex) {

        var valid = true;
        var min = moment($("#min").val(),"DD/MM/YYYY");
        if (!min.isValid()) { min = null; }

        var max = moment($("#max").val(),"DD/MM/YYYY");
        if (!max.isValid()) { max = null; }

        if (min === null && max === null) {
            valid = true;
        }
        else {

            $.each(settings.aoColumns, function (i, col) {
              
                if (col.type == "date") {
                    var cDate = moment(data[i],'DD/MM/YYYY');
                
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

$("#semakKeraniSemakan").click(function () {
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
