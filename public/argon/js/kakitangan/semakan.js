var pilihanKT = ['OT1','OT2','PS1','PS2'];
var pilihanReal = ['PS1','PS2','EL1','EL2'];
$(document).ready(function(){
    
    showDatatable()

})

function showDatatable(){
    var nopekerja = document.querySelector("#nopekerja").value;
    var permohonanDT = $('#permohonanDT').DataTable({
        dom: "lrtip",
        scrollX: false,
        destroy: true,
        lengthMenu: [ 5, 10, 25, 50 ],
        responsive: false,
        autoWidth:true,
        // processing: true,
        // serverSide: true,
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
                {data: 'tarikh_permohonan'},
                {data: 'status'},
                {data: 'masa_mula'},
                {data: 'masa_akhir'},
                {data: 'masa'},
                {data: 'hari'},
                {data: 'waktu'},
                {data: 'kadar_jam'},
                {data: 'tujuan'},
                {data: null},
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
                        formattedDate = moment(data).format("DD/MM/YYYY")
                        return formattedDate;
                    }
                },
                {
                    targets: 2,
                    render: function(data,type,row){
                        if(pilihanKT.includes(row['jenis_permohonan_kakitangan'])){
                            if(data == "DITERIMA" && row['progres'] == 'Sah P2' && (row['jenis_permohonan_kakitangan'] == ("OT1" || "OT2") )){
                                return '<div id="status" class="container text-white bg-success btn-sm "  data-target=""  value="SS">SEMAK SEMULA</div>' 
                            }else{
                                return '<div id="status" class="container text-white bg-success btn-sm "  data-target=""  value="DP">'+data.toUpperCase()+'</div>' 
                            }
                        }else{
                            
                            return '<div id="status" class="container text-white bg-success btn-sm "  data-target=""  value="DP">'+data.toUpperCase()+'</div>' 
                        }
                    }
                },
                {
                    targets: 10,
                    mRender: function(data,type,row){
                        return '<div>asd</div>';
                    }
                },
                {
                    targets: 11,
                    mRender: function(data,type,row)
                    {
                        if(pilihanKT.includes(row['jenis_permohonan_kakitangan'])){
                            if(row['status'] == "DITERIMA"){
                                console.log(data.id_permohonan_baru);
                                var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center"  onclick="changeDataTarget('+"'"+data.id_permohonan_baru+"'"+','+"'"+data.jenis_permohonan+"'"+','+"'"+data.jenis_permohonan_kakitangan+"'"+');"></i>'  
                                // var button2= '<i id="tolakBtn" data-toggle="modal" data-target="" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="deletePermohonan('+"'"+data.id_permohonan_baru+"'"+');"></i>' 
                                var allButton = button1 ;
                                return allButton;
                            }else{
                                // var button1 = '<i id="buttonEdit" data-toggle="modal" data-target="" class="btn btn-primary btn-sm ni ni-align-center"  onclick="changeDataTarget('+"'"+data.jenis_permohonan+"'"+','+"'"+data.id_permohonan_baru+"'"+');"></i>'  
                                var button2= '<i id="tolakBtn" data-toggle="modal" data-target="" class="btn btn-danger btn-sm ni ni-fat-remove" onclick="deletePermohonan('+"'"+data.id_permohonan_baru+"'"+');"></i>' 
                                var allButton = button2;
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
                }
                
            ],
            order: [ 1, 'asc' ]
            
                // {
                //     targets: 9,
                //     render: function(data,type,row){
                //         // console.log(data.id);
                //         var button1 = '<button data-toggle="modal" id="buttonEdit" class="btn btn-primary btn-sm align-center" onclick="editKemaskiniForm('+data.id+')" data-target=""  >Kemaskini</button>' 
                //         var allButton = button1 
                //         return allButton;
                //     }
                // }
            
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
    
    console.log(id);
}

function closeModal(modal){
    $("#"+modal).modal("hide");
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
    $('#permohonanDT').DataTable().column().search(
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