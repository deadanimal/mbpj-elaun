// var pilihanKT = ['OT1','OT2','PS1','PS2'];
// var pilihanReal = ['PS1','PS2','EL1','EL2'];

$(document).ready(function(){
    showSemakanDatatableKT()
})

function showSemakanDatatableKT(){
    var pilihanKT = ['OT1','OT2','PS1','PS2'];
    var pilihanReal = ['PS1','PS2','EL1','EL2'];
    var nopekerja = parseInt($('#noPekerjaB1').val());
    var is_semakan = 1;

    var permohonanDT = $('#permohonanDT').DataTable({
        dom: "lrtip",
        scrollX: false,
        destroy: true,
        lengthMenu: [ 5, 10, 25, 50 ],
        responsive: false,
        autoWidth:true,
        processing: true,
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
                url: "semakan/"+ nopekerja,
                type: 'GET',
                data:{
                        // nopekerja:nopekerja,
                        // pilihanKT:pilihanKT,
                        // pilihanReal:pilihanReal
                },
            },
            columns: [
                {data: null},
                {data: 'tarikh_mula_kerja'},
                {data: 'status'},
                {data: 'progres'},
                {data: 'masa_mula'},
                {data: 'masa_akhir'},
                {data: 'masa'},
                {data: 'tujuan'},
                {data: null},
                {data: 'jenis_permohonan'},
                {data: 'id_permohonan_baru'},
                {data: 'jenis_permohonan_kakitangan'}
            ],
            columnDefs: [
                {
                    searchable: false,
                    orderable: false,
                    targets: 0
                },
                {
                    targets: [1],
                    type: "date",
                    render: function(data,type,row){
                        formattedDate = moment(data,"DD-MM-YYYY").format("DD-MM-YYYY")
                        return formattedDate;
                    }
                },
                {
                    targets: 2,
                    render: function(data,type,row){
                        if(pilihanKT.includes(row['jenis_permohonan_kakitangan'])){
                            if(data == "DITERIMA" && row['progres'] == 'Sah P2' && (row['jenis_permohonan_kakitangan'] == ("OT1" || "OT2") )){
                                data = "SEMAK SEMULA";
                                return '<div id="status" class="text-black badge badge-pill badge-warning"  data-target=""  value="SS">'+data.toUpperCase()+'</div>' 
                            }else if(data == "DITERIMA") {
                                return '<div id="status" class="text-black badge badge-pill badge-success"  data-target=""  value="DT">'+data.toUpperCase()+'</div>' 
                            }else if(data == "DALAM PROSES") {
                                return '<div id="status" class="text-black badge badge-pill badge-info"  data-target=""  value="DP">'+data.toUpperCase()+'</div>' 
                            }else if(data == "DITOLAK") {
                                return '<div id="status" class="text-black badge badge-pill badge-danger"  data-target=""  value="DK">'+data.toUpperCase()+'</div>' 
                            }else if(data == "PERLU KEMASKINI" && (row['jenis_permohonan_kakitangan'] == ("OT1" || "OT2"))) {
                                return '<div id="status" class="text-black badge badge-pill badge-warning"  data-target=""  value="PK">'+data.toUpperCase()+'</div>' 
                            }else{
                                data = "DITERIMA"
                                return '<div id="status" class="text-black badge badge-pill badge-success"  data-target=""  value="DT">'+data.toUpperCase()+'</div>' 
                            }
                        } else{
                            return '<div id="status" class="text-black badge badge-pill badge-info"  data-target=""  value="DP">'+data.toUpperCase()+'</div>' 
                        }
                    }
                },
                {
                    targets: 3,
                    render: function(data,type,row){
                        if(data == "Sah P2" && row['status'] == "DITERIMA" && (row['jenis_permohonan_kakitangan'] == ("OT1" || "OT2"))){
                            return '<div id="progres" class="text-black badge badge-pill badge-success"  data-target=""  value="BSH" >BELUM DISAHKAN</div>' 
                        } else if(row['status'] == "PERLU KEMASKINI" && (row['jenis_permohonan_kakitangan'] == ("PS1" || "PS1"))){
                            return '<div id="progres" class="text-black badge badge-pill badge-success"  data-target=""  value="SP2">Sah P2</div>' 
                        } else{
                            return '<div id="progres" class="text-center text-black badge badge-pill badge-success"  data-target=""  value="DP">'+data.toUpperCase()+'</div>' 
                        }
                    }
                },
                {
                    targets: 8,
                    mRender: function(data,type,row)
                    {
                        // if(pilihanKT.includes(row['jenis_permohonan_kakitangan'])){
                        //     if(row['status'] == "DITERIMA" && row['progres'] == "Sah P2" && (row['jenis_permohonan_kakitangan'] == ("OT1" || "OT2"))){
                        //         var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center"  onclick="changeDataTargetSemakan('+"'"+data.id_permohonan_baru+"'"+','+"'"+data.jenis_permohonan+"'"+','+"'"+data.jenis_permohonan_kakitangan+"'"+');"></i>'  
                        //         var button2= '<i id="tolakBtn" data-toggle="modal" data-target="" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="deletePermohonan('+"'"+data.id_permohonan_baru+"'"+');"></i>' 
                        //         var allButton = button1 ;
                        //         return allButton;
                        //     } else if(row['status'] == 'DITOLAK' || 'DITERIMA'){
                        //         var button2= '<i id="tolakBtn" data-toggle="modal" data-target="" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="deletePermohonan('+"'"+data.id_permohonan_baru+"'"+');"></i>' 
                        //         var allButton = button2;
                        //         return allButton;
                                
                        //     } else if(row['status'] == 'PERLU KEMASKINI'){
                        //         var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center"  onclick="changeDataTargetSemakan('+"'"+data.jenis_permohonan+"'"+','+"'"+data.id_permohonan_baru+"'"+');"></i>'  
                        //         var button2= '<i id="tolakBtn" data-toggle="modal" data-target="" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="deletePermohonan('+"'"+data.id_permohonan_baru+"'"+');"></i>' 
                        //         var allButton = button1 + button2;
                        //         return allButton;

                        //     } else if(row['status'] == "DALAM PROSES" && (row['jenis_permohonan_kakitangan'] == ("PS1" || "PS2"))){
                        //         var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center"  onclick="changeDataTargetSemakan('+"'"+data.jenis_permohonan+"'"+','+"'"+data.id_permohonan_baru+"'"+');"></i>'  
                        //         var button2= '<i id="tolakBtn" data-toggle="modal" data-target="" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="deletePermohonan('+"'"+data.id_permohonan_baru+"'"+');"></i>' 
                        //         var allButton = button1 +  button2;
                        //         return allButton;
                        //     } 
                        // }
                        if(row['jenis_permohonan'] == 'EL1' || row['progres'] == "Sah P1"){
                            var button2= '<i id="tolakBtn" data-toggle="modal" data-target="" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="deletePermohonanKT('+"'"+data.id_permohonan_baru+"'"+', '+ "'mohonBaruIndividu'"+')"></i>' 
                            var allButton = button2;
                            return allButton;
    
                        } else if(row['progres'] == "Belum disahkan" || row['status'] == "PERLU KEMASKINI"){
                            var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center" onclick="changeDataTargetSemakan('+is_semakan+','+data.id_permohonan_baru +', '+"'"+data.jenis_permohonan_kakitangan+"'"+', '+"'"+data.jenis_permohonan+"'"+');"></i>'  
                            var button2= '<i id="tolakBtn" data-toggle="modal" data-target="" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="deletePermohonanKT('+"'"+data.id_permohonan_baru+"'"+', '+ "'mohonBaruIndividu'"+')"></i>' 
                            var allButton = button1 + button2;
                            return allButton;
    
                        }
                        else if(row['status'] == "DITOLAK" || "DALAM PROSES"){
                            var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center" onclick="changeDataTargetSemakan('+is_semakan+','+data.id_permohonan_baru +', '+"'"+data.jenis_permohonan_kakitangan+"'"+', '+"'"+data.jenis_permohonan+"'"+');"></i>'  
                            var button2 = '<i id="tolakBtn" data-toggle="modal" data-target="" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="deletePermohonanKT('+"'"+data.id_permohonan_baru+"'"+', '+ "'mohonBaruIndividu'"+')"></i>' 
                            var allButton = button1 + button2;
                            return allButton;
                            
                        }
                    }
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
                    visible: false,
                    searchable: true
                }
            ],
            order: [ 1, 'asc' ]
    });

    permohonanDT.on( 'order.dt search.dt', function () {
        permohonanDT.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
}

function editKemaskiniForm(id){
    $("#frmTuntutan input[name=name1]").val(id);
    $('#borangB1Modal').modal('show');
}

function closeModal(modal){
    $("#"+modal).modal("hide");
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
        }else {
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
                    }else {
                        valid = false;
                    }
                }
            });
        }
        return valid;
});

$("#btnGo").click(function () {
    $('#permohonanDT').DataTable().column().search(
        $('#carian').val(),
        $('#jenisTable').val()
        ).draw();
});

$('#min').datepicker({
    dateFormat: 'dd-mm-yy',
});

$('#max').datepicker({
    dateFormat: 'dd-mm-yy',
});

$('#tarikhKerjaAkhir').datepicker({
    dateFormat: 'dd-mm-yy',
});
$('#tarikhKerjaMula').datepicker({
    dateFormat: 'dd-mm-yy',
});

$('#masaMula').timepicker();

$('#masaAkhir').timepicker();