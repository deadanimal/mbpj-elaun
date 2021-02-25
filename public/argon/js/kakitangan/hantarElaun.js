$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function hantarElaun(id_permohonan_baru){
    $.ajax({
        url: 'tuntutan/hantar-tuntutan/' + id_permohonan_baru,
        type: 'put', 
        data:{
            id_permohonan_baru : id_permohonan_baru,

        },
        success: function(data) {
            Swal.fire(  
                'Tuntutan Elaun berjaya dihantar!',
                'Klik butang dibawah untuk tutup!',
                'success'
                )
            showDatatable();
            
            console.log(data.permohonan);

        },
        error: function(data) {
            console.log(data);
        } 
    });
};

function deletePermohonan(id_permohonan_baru){

    $.ajax({
        url: 'tuntutan/delete-permohonan/' + id_permohonan_baru,
        type: 'put', 
        data:{
            id_permohonan_baru : id_permohonan_baru
        },
        success: function(data) {
            showDatatable();
            console.log(data.permohonan);

        },
        error: function(data) {
            console.log(data);
        } 
    });
}