$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    showDatatable(jenisPilihan);
    revealJumlahPersamaanJamMasa('OT');

    $('#min').datepicker({
        dateFormat: 'dd-mm-yy',
    });

    $('#max').datepicker({
        dateFormat: 'dd-mm-yy',
    });
}) 

$("#padamCarian").click(function(){
    $("#noPekerja").val("");
    $("#nama-semakan").val("");
    $("#selectJenisPermohonan").val("out").trigger("change")
    showDatatable();
});

function showUser(id, jabatan) {
        $.ajax({
            type: 'GET',
            url: 'user/semakan-pekerja/' + id,
            success: function(data) {
                $("#formOTEL input[name=nama]").val(data.users.NAME);
                $("#formOTEL input[name=noKPbaru]").val(data.users.NIRC);
                $("#formOTEL input[name=jabatan]").val(data.users.maklumat_pekerjaan.jabatan.GE_KETERANGAN_JABATAN);
                $("#formOTEL input[name=jawatan]").val(data.users.maklumat_pekerjaan.jawatan.HR_NAMA_JAWATAN);
                $('#pindaanLulusDT').DataTable().columns(9).search(     
                    id
                )

                revealJumlahPersamaanJamMasa('EL');

                $('input').css('color', 'black')
            },
            error: function(data) {
                console.log(data);
            }
        });
}

function showDatatable(){
    var counterPermohonan = 0;
    var id_user = document.querySelector("#noPekerja").value;

    if(id_user == ''){
        id_user = 'noID';
    }

    pindaanLulusDT = $('#pindaanLulusDT').DataTable({
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
            title: 'Permohonan - Pelulus Pindaan Lulus',
            extend:'pdfHtml5',
            exportOptions: {
                columns: [2, 3, 4, 5, 6]
            },
            className:'btn btn-sm btn-outline-warning text-right',
            attr: {
                id: 'cetakPermohonanPelulusPindaanLulus',
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
                url: "dashboard/"+ id_user,
                type: 'GET',
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
                {data: 'users[*].id'},
                {data: 'users[*].maklumat_pekerjaan.HR_JABATAN'},
                {data: 'id_permohonan_baru', name:'id_permohonan_baru'}
            ],  
            columnDefs: [
                {
                    targets:0,
                    orderable:false,
                    searchable:false,
                },
                {
                    targets: 1,
                    orderable: false,
                    mRender: function(data,type,row) {
                        return '<input type="checkbox" name="cboxSemakanPermohonan" value="'+data.id_permohonan_baru+'">';
                    }
                },
                {
                    targets: 2,
                    type: "date",
                    render: function(data,type,row){
                        formattedDate = moment(data).format("DD-MM-YYYY")
                        return formattedDate;
                    }
                },
                {
                    targets: 7,
                    mRender: function(data,type,row){
                        if(id_user != "noID"){
                            counterPermohonan++;
                            var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center" onclick="changeDataTarget('+"'"+data.jenis_permohonan+"'"+'); retrieveUserData('+id_user+', '+data.id_permohonan_baru+', '+ "'"+data.jenis_permohonan+"'"+');"></i>' 
                            var button2 = '<i id="lulusBtn" class="btn btn-success btn-sm ni ni-check-bold" onclick="approvedKelulusan('+data.id_permohonan_baru+','+""+')" value=""></i>' 
                            var button3 = '<i id="tolakBtn'+ counterPermohonan +'" onclick="counterBuffer('+ counterPermohonan +')" data-toggle="modal" data-target="#modal-reject" class="btn btn-danger btn-sm ni ni-fat-remove" data-value="'+data.jenis_permohonan.substr(0, 2)+'" value="'+data.id_permohonan_baru+'"></i>' 
                            var allButton = button1 + button2 + button3;
                            return allButton;
                        } 
                        else {
                            counterPermohonan++;
                            var button1  = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center" onclick="changeDataTarget('+"'"+data.jenis_permohonan+"'"+'); retrieveUserData('+data.users[0].CUSTOMERID+', '+data.id_permohonan_baru+', '+ "'"+data.jenis_permohonan+"'"+');"></i>' 
                            var button2 = '<i id="lulusBtn" class="btn btn-success btn-sm ni ni-check-bold" onclick="approvedKelulusan('+data.id_permohonan_baru+','+""+');" value=""></i>' 
                            var button3 = '<i id="tolakBtn'+ counterPermohonan +'" onclick="counterBuffer('+ counterPermohonan +')" data-toggle="modal" data-target="#modal-reject" class="btn btn-danger btn-sm ni ni-fat-remove" data-value="'+data.jenis_permohonan.substr(0, 2)+'" value="'+data.id_permohonan_baru+'"></i>' 
                            var allButton = button1 + button2 + button3;
                            return allButton;
                        }
                    }
                },
                {
                    targets: 8,
                    visible: false,
                    searchable: true
                },
                {
                    targets: 9,
                    visible: false,
                    searchable: true
                },
                {
                    targets: 10,
                    visible: false,
                    searchable: true
                },
                {
                    targets: 11,
                    orderable:false,
                    searchable:false,
                    visible:false
                },
            ],  
    });

    pindaanLulusDT.on('draw.dt', function () {
        var info = pindaanLulusDT.page.info();
        pindaanLulusDT.column(0, { search: 'applied', order: 'applied', page: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1 + info.start;
        });
    });

    if(id_user != ''){
        $('#pindaanLulusDT').DataTable().search(
            $("#noPekerja").val(),
        ).draw();
    } 
}


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
                    else {
                        valid = false;
                    }
                }
            });
        }
        return valid;
});

$("#semakPelulusPindaanLulus").click(function () {
    var id = document.querySelector("#noPekerja").value;
    var jabatan = document.getElementById('selectJabatan').value;
    
    if(id) { showUser(id, jabatan); }

    // filter search result by jabatan
    $('#pindaanLulusDT').DataTable().columns(10).search(      
    jabatan
    ).draw();
});
