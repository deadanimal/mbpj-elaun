var jenisPilihan = 'OT';
var tabPilihan = 'OT';

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#min').datepicker({
        dateFormat: 'dd-mm-yy',
    });
    
    $('#max').datepicker({
        dateFormat: 'dd-mm-yy',
    });

    showDatatable(jenisPilihan);
    revealJumlahPersamaanJamMasa('OT');
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
    revealJumlahPersamaanJamMasa('EL');
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
    var pilihan = document.getElementById('selectJenisPermohonan').value;
    
    switch (pilihan) {
        case 'individu':
            jenisPilihan = tabPilihan + '1';
            showUser();
            showDatatable(jenisPilihan);
            break;
        case 'berkumpulan':
            jenisPilihan = tabPilihan + '2';
            showUser();
            showDatatable(jenisPilihan);
            break;
        default:
            Swal.fire(
                'Sebentar...',
                'Sila pilih jenis permohonan',
                'info'
              )
            break;
        }
}

function showUser() {
    var id = document.querySelector("#noPekerja").value;

    if (!id) {
        Swal.fire(
            'Sebentar...',
            'Sila masukkan 5 digit nombor pekerja',
            'info'
          )
    } else {
        $.ajax({
            url: 'user/semakan-pekerja/' + id,
            type: 'GET',
            success: function(data) {
                if (!data.user) {
                    Swal.fire(
                        'Pekerja tidak dijumpai',
                        'Sila semak semula maklumat',
                        'error'
                        )
                } else {
                    $("#formOTEL input[name=nama]").val(data.user.NAME);
                    $("#formOTEL input[name=noKPbaru]").val(data.user.NIRC);
                    $("#formOTEL input[name=jabatan]").val(data.user.maklumat_pekerjaan.jabatan.GE_KETERANGAN_JABATAN);
                    $("#formOTEL input[name=jawatan]").val(data.user.maklumat_pekerjaan.jawatan.HR_NAMA_JAWATAN);

                    $('input').css('color', 'black')
                }
            },
            error: function(data) { console.log(data); }
        });
    }
}

function showDatatable(pilihan){
    var minDateReformatted;
    var maxDateReformatted;
    var counterPermohonan = 0;
    var id_user = document.querySelector("#noPekerja").value;
    var minDate = document.querySelector("#min").value;
    var maxDate = document.querySelector("#max").value;

    if (minDate == '') {
        minDateReformatted = 0;
    } else {
        minDateReformatted = moment(minDate, "DD-MM-YYYY").format("YYYY-MM-DD");
    }

    if (maxDate == '') {
        maxDateReformatted = 0;
    } else {
        maxDateReformatted = moment(maxDate, "DD-MM-YYYY").format("YYYY-MM-DD");
    }

    if(id_user == ''){
        id_user = 'noID';
    }

    semakanPYDT = $('#semakanPYDT').DataTable({
    dom: "<'row'<'col ml--4'l><'col text-right'B>>rtip",
    destroy: true,
    processing: true,
    buttons: [
        {
            text: 'Hantar semua', 
            className:'btn btn-sm btn-outline-primary text-right',
            attr: {
                id: 'sendAllPermohonanButton',
                onclick: 'terimaSemuaPermohonan()'
            }
        },
        {
            text: 'Cetak', 
            extend:'pdfHtml5',
            title: 'Permohonan - Penyelia',
            className:'btn btn-sm btn-outline-warning text-right',
            exportOptions: {
                columns: [2, 3, 4, 5, 6]
            },
            attr: {
                id: 'cetakPermohonanPenyelia',
            }
        },
    ],
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
    serverSide: true,
    ajax: {
        url: "penyelia-semakan/"+id_user,
        type: 'GET',
        data: {
            // pilihan : id_user != '' ? pilihan : jenisPilihan,
            pilihan : pilihan,
            minDate : minDateReformatted,
            maxDate : maxDateReformatted
        }
    },
    columns: [
        {data: null},
        {data: null},
        {data: 'created_at'},
        {data: 'masa_mula'},
        {data: 'masa_akhir'},
        {data: 'masa'},
        {data: 'tujuan'},
        {data: null},
        {data: 'jenis_permohonan'},
        {data: 'id_permohonan_baru', name:'id_permohonan_baru'},
    ],  
    columnDefs: [
        {
            targets: [0],
            searchable: false,
            orderable: true
        },
        {
            targets: [1],
            orderable: false,
            mRender: function(data,type,row) {
                return '<input type="checkbox" name="cboxSemakanPermohonan" value="'+data.id_permohonan_baru+'">';
            }
        },
        {
            targets: [2],
            type: "date",
            render: function(data,type,row){
                formattedDate = moment(data,"YYYY-MM-DD").format("DD-MM-YYYY");
                return formattedDate;
            }
        },
        {
            targets: [7],
            mRender: function(data,type,row){
                if(id_user != "noID"){
                    counterPermohonan++;
                    var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center" onclick="changeDataTarget('+"'"+data.jenis_permohonan+"'"+'); retrieveUserData('+id_user+', '+data.id_permohonan_baru+', '+ "'"+data.jenis_permohonan+"'"+');"></i>' 
                    var button2 = '<i id="lulusBtn" class="btn btn-success btn-sm ni ni-check-bold" onclick="approvedKelulusan('+data.id_permohonan_baru+','+"'"+pilihan+"'"+');" value=""></i>' 
                    var button3 = '<i id="tolakBtn'+ counterPermohonan +'" onclick="counterBuffer('+ counterPermohonan +')" data-toggle="modal" data-target="#modal-reject" class="btn btn-danger btn-sm ni ni-fat-remove" data-value="'+data.jenis_permohonan.substr(0, 2)+'" value="'+data.id_permohonan_baru+'"></i>' 
                    var allButton = button1 + button2 + button3;
                    return allButton;
                } 
                else {
                    counterPermohonan++;
                    var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center" onclick="changeDataTarget('+"'"+data.jenis_permohonan+"'"+'); retrieveUserData('+data.users[0].CUSTOMERID+', '+data.id_permohonan_baru+', '+ "'"+data.jenis_permohonan+"'"+');"></i>' 
                    var button2 = '<i id="lulusBtn" class="btn btn-success btn-sm ni ni-check-bold" onclick="approvedKelulusan('+data.id_permohonan_baru+','+"'"+pilihan+"'"+');" value=""></i>' 
                    var button3 = '<i id="tolakBtn'+ counterPermohonan +'" onclick="counterBuffer('+ counterPermohonan +')" data-toggle="modal" data-target="#modal-reject" class="btn btn-danger btn-sm ni ni-fat-remove" data-value="'+data.jenis_permohonan.substr(0, 2)+'" value="'+data.id_permohonan_baru+'"></i>' 
                    var allButton = button1 + button2 + button3;
                    return allButton;
                }
            }
        },
        {
            targets: [8],
            visible: false,
            searchable: true,
        },
        {
            targets: [9],
            visible: false,
            searchable: true
        },
    ]
        
    });
    
    semakanPYDT.on('draw.dt', function () {
        var info = semakanPYDT.page.info();
        semakanPYDT.column(0, { search: 'applied', order: 'applied', page: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1 + info.start;
        });
    });

    if(id_user != ''){
        $('#semakanPYDT').DataTable().search(
            $("#noPekerja").val(),
            pilihan
        ).draw();
    }
}

$("#selectJenisPermohonan").on("change",function(){
    var pilihan = document.getElementById('selectJenisPermohonan').value;
    switch (pilihan) {
        case 'individu':
            pilihan = tabPilihan + '1';
            $('#semakanPYDT').DataTable().search(       
                pilihan
            ).draw();
            break;
        case 'berkumpulan':
            pilihan = tabPilihan + '2';
            $('#semakanPYDT').DataTable().search(       
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
        var min = moment($("#min").val(),"DD-MM-YYYY");
        if (!min.isValid()) { min = null; }

        var max = moment($("#max").val(),"DD-MM-YYYY");
        if (!max.isValid()) { max = null; }

        if (min === null && max === null) {
            valid = true;
        }
        else {
            $.each(settings.aoColumns, function (i, col) {
                if (col.type == "date") {
                    var cDate = moment(data[i],'DD-MM-YYYY');
                    if (cDate.isValid()) {
                        if (max !== null && max.isBefore(cDate)) {
                            valid = false;
                        }
                        if (min !== null && cDate.isBefore(min)) {
                            valid = false;
                        }
                    }
                    else { valid = false; }
                }
            });
        }
        return valid;
});

$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    var target = $(e.target).attr("value")
    tabPilihan = target;
});
