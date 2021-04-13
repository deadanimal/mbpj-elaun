var pilihanKT = ['PS1','PS2','EL1','EL2'];
var pilihanReal = ['EL1','EL2'];

$(document).ready(function(){

    showTuntutanDatatableKT();
});


function showTuntutanDatatableKT(){
    var nopekerja = $("#idpekerja").val();
    var tuntutansDT = $('#tuntutansDT').DataTable({
        dom: "lrtip",
        scrollX: false,
        destroy: true,
        lengthMenu: [ 5, 10, 25, 50 ],
        responsive: false,
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
        },
        autoWidth:true,
        // processing: true,
        // serverSide: true,
        buttons: [
        {
        extend:'pdfHtml5',
        title:'Senarai Permohonan Tuntutan'  
        }
    ],
    ajax: {
        url: "semakan/"+nopekerja,
        type: 'GET',
        data:{
            nopekerja:nopekerja,
            pilihanKT:pilihanKT,
            pilihanReal:pilihanReal
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
            {data: 'hari'},
            {data: 'waktu'},
            {data: 'kadar_jam'},
            {data: 'tujuan'},
            {data: null},
            {data: 'jenis_permohonan'},
            {data: 'id_permohonan_baru'},
            {data: 'jenis_permohonan_kakitangan'},
            
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
                    formattedDate = moment(data,'DD / MM / YYYY').format("DD/MM/YYYY")
                    return formattedDate;
                }
            },
            {
                targets: 2,
                render: function(data,type,row){
                    if(pilihanKT.includes(row['jenis_permohonan_kakitangan'])){
                        if(data == "DITERIMA" && row['progres'] == 'Sah P2' && (row['jenis_permohonan_kakitangan'] == ("PS1" || "PS2") )){
                            data = "SEMAK SEMULA"
                            return '<div id="status" class=" text-center text-white bg-warning btn-sm "  data-target=""  value="SS">'+data.toUpperCase()+'</div>' 
                        }else if(data == "DITERIMA") {
                            return '<div id="status" class="container text-white bg-success btn-sm "  data-target=""  value="DT">'+data.toUpperCase()+'</div>' 
                        }else if(data == "DALAM PROSES") {
                            return '<div id="status" class="container text-white bg-info btn-sm "  data-target=""  value="DP">'+data.toUpperCase()+'</div>' 
                        }else if(data == "DITOLAK") {
                            return '<div id="status" class="container text-white bg-danger btn-sm "  data-target=""  value="DK">'+data.toUpperCase()+'</div>' 
                        }else if(data == "PERLU KEMASKINI") {
                            return '<div id="status" class="container text-white bg-warning btn-sm "  data-target=""  value="PK">'+data.toUpperCase()+'</div>' 
                        }
                    }else{
                        
                        return '<div id="status" class="container text-white bg-info btn-sm "  data-target=""  value="DP">'+data.toUpperCase()+'</div>' 
                    }
                }
            }, 
            {
                targets: 3,
                render: function(data,type,row){
                    if(data == "Sah P2" && row['status'] == "DITERIMA" && (row['jenis_permohonan_kakitangan'] == ("PS1" || "PS2"))){
                        return '<div id="progres" class="container text-white bg-success btn-sm "  data-target=""  value="BSH" >BELUM DISAHKAN</div>' 

                    }else{
                        return '<div id="progres" class="text-center text-white bg-success btn-sm "  data-target=""  value="DP">'+data.toUpperCase()+'</div>' 
                    
                    // }else{
                    
                    // return '<div id="status" class=" text-center text-white bg-success btn-sm "  data-target=""  value="DP">'+data.toUpperCase()+'</div>' 
                    }
                }
            },

            {
                targets: 11,
                mRender: function(data,type,row)
                {
                    if(pilihanKT.includes(row['jenis_permohonan_kakitangan'])){
                        // FOR STATUS SEMAK SEMULA
                        if(row['status'] == "DITERIMA" && (row['jenis_permohonan_kakitangan'] == ("PS1"||"PS2"))){
                            console.log(data.id_permohonan_baru);
                            var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-success btn-sm ni ni-check-bold"  onclick="hantarElaun('+"'"+data.id_permohonan_baru+"'"+');"></i>'  
                            // var button2= '<i id="tolakBtn" data-toggle="modal" data-target="" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="deletePermohonan('+"'"+data.id_permohonan_baru+"'"+');"></i>' 
                            var allButton = button1 ;
                            return allButton;
                        }
                        // FOR STATUS DITERIMA
                        else if(row['status'] == "DITERIMA" && (row['jenis_permohonan_kakitangan'] == ("EL1"||"EL2"))){ 
                            // var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center"  onclick="changeDataTarget('+"'"+data.jenis_permohonan+"'"+','+"'"+data.id_permohonan_baru+"'"+');"></i>'  
                            var button1 = '<i id="tolakBtn" data-toggle="modal" data-target="" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="deletePermohonan('+"'"+data.id_permohonan_baru+"'"+');"></i>' 
                            var allButton = button1;
                            return allButton;
                        }
                        // FOR STATUS DALAM PROSES
                        else if(row['status'] == "DALAM PROSES"){
                            var button1 = '<i id="tolakBtn" data-toggle="modal" data-target="" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="deletePermohonan('+"'"+data.id_permohonan_baru+"'"+');"></i>' 
                            var allButton = button1;
                            return allButton;
                        }
                        // FOR STATUS DITOLAK
                        else if(row['status'] == "DITOLAK"){
                            var button1 = '<i id="tolakBtn" data-toggle="modal" data-target="" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="deletePermohonan('+"'"+data.id_permohonan_baru+"'"+');"></i>' 
                            var allButton = button1;
                            return allButton;
                        }
                        // FOR STATUS PERLU KEMASKINI
                        else if(row['status'] == "PERLU KEMASKINI"){
                            var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center"  onclick="changeDataTarget('+"'"+data.jenis_permohonan+"'"+','+"'"+data.id_permohonan_baru+"'"+');"></i>'  
                            // var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-success btn-sm ni ni-check-bold"  onclick="hantarElaun('+"'"+data.id_permohonan_baru+"'"+');"></i>'  
                            var allButton = button1;
                            return allButton;
                        }

                    
                    }
                    else{
                        
                    }
                }
                
            },
            {
                targets: 12,
                visible: false,
                searchable: true
            },
            {
                targets: 13,
                visible: false,
                searchable: true
            },
            {
                targets: 14,
                visible: true,
                searchable: true
            },
            
        ],
        order: [ 1, 'asc' ]
    });
    tuntutansDT.on( 'order.dt search.dt', function () {
        tuntutansDT.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
}
function printTuntutan(){
console.log("gfhj")
table.button( '.buttons-pdf' ).trigger();
}

$.fn.dataTable.ext.search.push(
    function (settings, data, dataIndex) {

        console.log(data);
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

$("#btnGo").click(function () {
    console.log("searching")
    console.log($('#jenisTable').val())
    console.log($('#carian').val())
    
    $('#tuntutansDT').DataTable().column().search(
        $('#carian').val(),
        $('#jenisTable').val()
        ).draw();
});

$('#min').datepicker({
    dateFormat: 'dd/mm/yy',
});

$('#max').datepicker({
    dateFormat: 'dd/mm/yy',
});