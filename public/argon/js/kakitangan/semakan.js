$('#datatable').dataTable({
    "lengthMenu": [ 5, 10, 25, 50 ],
    columnDefs:[{targets:3, render:function(data){
        return moment(data).format('DD/MM/YYYY');
      }}]
});

$('.timepicker').datetimepicker({

    format: 'HH:mm:ss'

}); 

function editKemaskiniForm(id){
    $('#borangB1Modal').modal('show');
    $("#frmTuntutan input[name=name1]").val(id);
    console.log(id);
}

function closeModal(modal){
    $("#"+modal).modal("hide");
}


// $(document).on("click","#modalB1",function(){
//     $('#borangB1Modal').modal('show');
//     var userId = $(this).data('id');
//     $(".modal-body #input-name1").data(userId);
//     console.log(userId);
// })
