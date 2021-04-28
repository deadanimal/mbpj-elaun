
var pindaanSahDT = $('#pindaanSahDT').DataTable({
        dom: "<'row'<'col ml--4'l><'col text-right'B>>rtip",
        destroy: true,
        processing: true,
        buttons: [{
            text: 'Hantar semua', 
            className:'btn btn-sm btn-outline-primary text-right',
            attr: {
                id: 'sendAllPermohonanButton',
                onclick: 'terimaSemuaPermohonan()'
            }
        }],
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
        serverSide: false,
            ajax: {
                url: "kerani-pemeriksa-semakan/"+id_user,
                type: 'GET',
            },
            columns: [
        
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
                    type: "date",
                    render: function(data,type,row){
                        formattedDate = moment(data).format("DD-MM-YYYY")
                        return formattedDate;
                    }
                },
                {
                    targets: 6,
                    mRender: function(data,type,row){
                        if(id_user != "noID"){
                            counter++;
                            var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center" onclick="changeDataTarget('+"'"+data.jenis_permohonan+"'"+'); retrieveUserData('+id_user+', '+data.id_permohonan_baru+', '+ "'"+data.jenis_permohonan+"'"+');"></i>' 
                            var button2 = '<i id="lulusBtn" class="btn btn-success btn-sm ni ni-check-bold" onclick="approvedKelulusan('+data.id_permohonan_baru+','+""+')" value=""></i>' 
                            var button3 = '<i id="tolakBtn'+ counter +'" onclick="counterBuffer('+ counter +')" data-toggle="modal" data-target="#modal-reject" class="btn btn-danger btn-sm ni ni-fat-remove" data-value="'+data.jenis_permohonan.substr(0, 2)+'" value="'+data.id_permohonan_baru+'"></i>' 
                            var allButton = button1 + button2 + button3;
                            return allButton;
                        } 
                        else {
                            counter++;
                            var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center" onclick="changeDataTarget('+"'"+data.jenis_permohonan+"'"+'); retrieveUserData('+data.users[0].CUSTOMERID+', '+data.id_permohonan_baru+', '+ "'"+data.jenis_permohonan+"'"+');"></i>' 
                            var button2 = '<i id="lulusBtn" class="btn btn-success btn-sm ni ni-check-bold" onclick="approvedKelulusan('+data.id_permohonan_baru+','+""+');" value=""></i>' 
                            var button3 = '<i id="tolakBtn'+ counter +'" onclick="counterBuffer('+ counter +')" data-toggle="modal" data-target="#modal-reject" class="btn btn-danger btn-sm ni ni-fat-remove" data-value="'+data.jenis_permohonan.substr(0, 2)+'" value="'+data.id_permohonan_baru+'"></i>' 
                            var allButton = button1 + button2 + button3;
                            return allButton;
                        }
                    }
                },
                {
                    targets: 7,
                    visible: false,
                    searchable: true
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
                    targets:10,
                    orderable:false,
                    searchable:false,
                    visible:false
                },
            ], 
                
            });
            pindaanSahDT.on('draw.dt', function () {
                var info = pindaanSahDT.page.info();
                pindaanSahDT.column(0, { search: 'applied', order: 'applied', page: 'applied' }).nodes().each(function (cell, i) {
                    cell.innerHTML = i + 1 + info.start;
                });
            });
            if(id_user != ''){
                $('#pindaanSahDT').DataTable().search(
                    $("#noPekerja").val(),
                ).draw();
            } else{}


$.fn.dataTable.ext.search.push(
    function (settings, data, dataIndex) {

          
        var valid = true;
        var min = moment($("#min").val(),'DD-MM-YYYY');
        if (!min.isValid()) { min = null; }
      console.log(min);

        var max = moment($("#max").val(),'DD-MM-YYYY');
        if (!max.isValid()) { max = null; }

        if (min === null && max === null) {
            // no filter applied or no date columns
            valid = true;
        }
        else {

            $.each(settings.aoColumns, function (i, col) {
              
                if (col.type == "date") {
                    var cDate = moment(data[i],'DD-MM-YYYY');
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

$("#btnGo").click(function () {
    $('#pindaanSahDT').DataTable().draw();
});

$('#min').datepicker({
    dateFormat: 'dd-mm-yy',
});

$('#max').datepicker({
    dateFormat: 'dd-mm-yy',
});