var selectStatus = {
    "Aktif" : 1,
    "Nyahaktif" : 0
};

var selectRole = {
    "Pentadbir Sistem" : 1,
    "Penyelia" : 2,
    "Datuk Bandar" : 3,
    "Ketua Bahagian" : 4,
    "Ketua Jabatan" : 5,
    "Kerani Semakan" : 6,
    "Kerani Pemeriksa" : 7,
    "Kakitangan" : 8,
    "Pelulus Pindaan" : 9
};

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    showPengurusanPengguna();
})

function showPengurusanPengguna(){
    var counterPermohonan = 0;
    var pengurusanDT = $('#pengurusanDT').DataTable({
        dom: 'flrtip',
        responsive:false,
        autoWidth:false,
        processing: false,
        destroy: true,
        serverSide: true,
        lengthMenu: [ 15, 30, 50 ],
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
        ajax: {
            url: "pengurusan-pengguna",
            type: 'GET',
            },
        columns: [
            {data: null, name: null},
            {data: 'CUSTOMERID', name: 'CUSTOMERID'},
            {data: 'NAME', name: 'NAME'},
            {data: 'role_id', name: 'role_id'},
            {data: 'is_active', name: 'is_active'},
            {data: null, name: null},
            {data: 'maklumat_pekerjaan.HR_JABATAN'},
        ],
        columnDefs:[
            {
                targets: 3, 
                type: "html-input",
                searchable: true, 
                render: function(data,type,row){
                var role;
                if(type == 'display' || row != null){
                    if(data == 1){
                        role = "Pentadbir Sistem";
    
                    }else if(data == 2){
                        role = "Penyelia";
    
                    }else if(data == 3){
                        role = "Datuk Bandar";
    
                    }else if(data == 4){
                        role = "Ketua Bahagian";
    
                    }else if(data == 5){
                        role = "Ketua Jabatan";
    
                    }else if(data == 6){
                        role = "Kerani Semakan";
    
                    }else if(data == 7){
                        role = "Kerani Pemeriksa";
    
                    }else if(data == 8){
                        role = "Kakitangan";
    
                    }else if(data == 9){
                        role = "Pelulus Pindaan";
    
                    }
                }

                var $select = $("<select id='role"+counterPermohonan+"' class='form-select form-select-sm'></select>", {});

                $.each(selectRole, function(key,value){
                    var $option = $("<option></option>", {
                        "text": key,
                        "value": value
                    });
                    
                    if(role == key){
                        $option.attr("selected", "selected")
                    }
                    $select.append($option);
                });
                return $select.prop("outerHTML");
    
            }},
            {
                targets: 4, 
                render:function(data,type,row){
                    var status = 'Nyahaktif';

                    if(type == 'display' || row != null){
                        if(data){
                            status = "Aktif";
                        }

                        var $select = $("<select id='is_active"+counterPermohonan+"' class='form-select form-select-sm'></select>", {});

                        $.each(selectStatus, function(key,value){
                            var $option = $("<option></option>", {
                                "text": key,
                                "value": value
                            });

                            if(status == key){
                                $option.attr("selected", "selected")
                            }
                            $select.append($option);
                        });
                        return $select.prop("outerHTML");
                    }
                }},
            {
            targets: 5,
                render: function(data,type,row){
                    var CUSTOMERID = parseInt(data.CUSTOMERID, 10);
                    var button = '<button data-toggle="modal" id="buttonEdit" class="btn btn-primary btn-sm align-center" onclick="kemaskiniPengguna('+CUSTOMERID+','+"'"+data.NAME+"'"+','+counterPermohonan+')" data-target="">Kemaskini</button>' 

                    counterPermohonan++;
                    return button;
            }},
            {
                targets: 6,
                visible: false,
                searchable: true
            }
        ],
    
    });
    
    pengurusanDT.on('draw.dt', function () {
        var info = pengurusanDT.page.info();
        pengurusanDT.column(0, { search: 'applied', order: 'applied', page: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1 + info.start;
        });
    });
    
    // $.fn.dataTable.ext.search.push(
    //     function (settings, data, dataIndex) {
    //         $.each(settings.aoColumns, function (i, col) {
    //             if (col.type == "CUSTOMERID") {
    //                 return data[i]; 
    //             }
    //         });
    // });
}

function optionJabatan() {
    var jabatan = document.querySelector("#selectJabatan").value; 
    
    if (jabatan == 'out') {
        showPengurusanPengguna();
    } else {
        // filter search result by jabatan
        var regex = '\\b'+ jabatan + '\\b';
        $('#pengurusanDT').DataTable().columns(6).search(    
            regex, true, false
        ).draw();
    }
}
   