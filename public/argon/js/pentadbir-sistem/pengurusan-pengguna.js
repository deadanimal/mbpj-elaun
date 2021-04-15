var selectStatus = [
    "Aktif",
    "Nyahaktif"
];

var selectRole = [
    "Pentadbir Sistem",
    "Penyelia",
    "Datuk Bandar",
    "Ketua Bahagian",
    "Ketua Jabatan",
    "Kerani Semakan",
    "Kerani Pemeriksa",
    "Kakitangan",
    "Pelulus Pindaan"
];

var pengurusanDT = $('#pengurusanDT').DataTable({
    dom: 'flrtip',
    responsive:false,
    autoWidth:false,
    processing: false,
    serverSide: true,
    lengthMenu: [ 20, 50, 100 ],
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
        // {data: 'created_at', name: 'created_at'},
        {data: 'role_id', name: 'role_id'},
        // {data: 'email', name: 'email'},
        {data: 'status', name: 'status'},
        {data: null, name: null},
        {data: 'users[*].maklumat_pekerjaan.HR_JABATAN'}
    ],
    columnDefs:[
        
        // {
        //     targets:3, 
        //     render:function(data){
        //         return moment(data).format('DD/MM/YYYY');
        //     }
        // },
        {
            type: "html-input",
            targets: [1],
            mRender: function(data,type,row){
                return data.toString().padStart(5, "0");
            } 
        },
        {
            type: "html-input",
            targets: 3, 
            render:function(data,type,row){
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
            var $select = $("<select class='form-select form-select-sm'></select>", {
                "id": row[0]+"start",
                "value": role
            });
            $.each(selectRole, function(k,v){
                var $option = $("<option></option>", {
                    "text": v,
                    "value": v
                });
                if(role === v){
                    $option.attr("selected", "selected")
                }
                $select.append($option);
            });
            return $select.prop("outerHTML");

        }},
            // {
            // targets: 5, render:function(data,type,row){
            //     return "<span class='text-primary'>"+data+"</span>";
            // }
            // },
        {
        type: "html-input",
        targets: 4, render:function(data,type,row){
            var status;
            if(type == 'display' || row != null){
                if(data == 01){
                    status = 'Enabled';
                    var $select = $("<select class='form-select form-select-sm'></select>", {
                    	"id": row[0]+"start",
                        "value": status
                    });
                	$.each(selectStatus, function(k,v){
                    	var $option = $("<option></option>", {
                        	"text": v,
                            "value": v
                        });
                        if(status === v){
                        	$option.attr("selected", "selected")
                        }
                    	$select.append($option);
                    });
                    return $select.prop("outerHTML");

                }else if(data == 00){
                    status = 'Disabled';
                    var $select = $("<select class='form-select form-select-sm'></select>", {
                    	"id": row[0]+"start",
                        "value": status
                    });
                	$.each(selectStatus, function(k,v){
                    	var $option = $("<option></option>", {
                        	"text": v,
                            "value": v
                        });
                        if(status === v){
                        	$option.attr("selected", "selected")
                        }
                    	$select.append($option);
                    });
                    return $select.prop("outerHTML");
                }

            }

        }},
        {
        targets: 5,
            render: function(data,type,row){
            var button1 = '<button data-toggle="modal" id="buttonEdit" class="btn btn-primary btn-sm align-center" onclick="kemaskiniPengguna('+data.CUSTOMERID+')" data-target=""  >Kemaskini</button>' 
            return button1;
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




$.fn.dataTable.ext.search.push(
    function (settings, data, dataIndex) {
        $.each(settings.aoColumns, function (i, col) {
            if (col.type == "CUSTOMERID") {
                return data[i]; 
            }
        });
});

$.fn.dataTableExt.ofnSearch['html-input'] = function(value) {
        return $(value).val();
};

function filter() {
    $('#pengurusanDT').DataTable().search(
        $('#carianPengguna').val()
    ).draw();
}

$('#carianPengguna').on( 'keyup click', function () {
    filter();
});

function filter() {
    $('#pengurusanDT').DataTable().search(
        $('#carianPengguna').val()
    ).draw();
}

function optionJabatan() {
    var jabatan = document.querySelector("#selectJabatan").value; 
    
    // filter search result by jabatan
    $('#pengurusanDT').DataTable().columns(1).search(    
        jabatan 
    ).draw();
}

// $("#datatable td select").on('change', function() {
//     var $td = $(this).parent();
//     var value = this.value;
//     $td.find('option').each(function(i, o) {
//       $(o).removeAttr('selected');
//       if ($(o).val() == value) $(o).attr('selected', true);
//     })
//     table.cell($td).invalidate().draw();
// });    