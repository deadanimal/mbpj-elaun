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
            showTuntutanDatatableKT();
            
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
            showTuntutanDatatableKT();
            console.log(data.permohonan);

        },
        error: function(data) {
            console.log(data);
        } 
    });
}

function changeDataTarget(id_permohonan_baru,jenisPermohonanKT,jenisPermohonan){

    $.ajax({
        url: 'tuntutan/kemaskini-permohonan/' + id_permohonan_baru,
        type: 'GET', 
        data:{
            id_permohonan_baru : id_permohonan_baru,
            jenisPermohonanKT : jenisPermohonanKT,
            jenisPermohonan : jenisPermohonan
        },
        success: function(data) {
            $("#borangB1Modal input[name=tarikhKerjaMula]").val(data.permohonan.tarikh_permohonan);
            $("#borangB1Modal input[name=masaMula]").val(data.permohonan.masa_mula);
            $("#borangB1Modal input[name=masaAkhir]").val(data.permohonan.masa_akhir);
            $("#borangB1Modal input[name=jenisPermohonanKT]").val(data.permohonan.jenis_permohonan_kakitangan);
            $("#borangB1Modal input[name=jenisPermohonanReal]").val(data.permohonan.jenis_permohonan);
            $("#borangB1Modal textarea[id=tujuan]").val(data.permohonan.tujuan);
            $("#borangB1Modal input[name=idPermohonan]").val(data.permohonan.id_permohonan_baru);

            if(data.permohonan.kadar_jam == '1.125'){
                $("#borangB1Modal input[id=inlineJamRadio1]").prop("checked",true);

            }else if(data.permohonan.kadar_jam == '1.25'){
                $("#borangB1Modal input[id=inlineJamRadio2]").prop("checked",true);

            }
            if(data.permohonan.waktu  == 'Pagi'){
                $("#borangB1Modal input[id=inlineRadiobox1]").prop("checked",true);
            }else if(data.permohonan.waktu  == 'Petang'){
                $("#borangB1Modal input[id=inlineRadiobox2]").prop("checked",true);

            }else if(data.permohonan.waktu  == 'Malam'){
                $("#borangB1Modal input[id=inlineRadiobox3]").prop("checked",true);

            }
            $("#borangB1Modal").modal("show");
            
            // console.log(data.permohonan);

        },
        error: function(data) {
            console.log(data);
        } 
    });
}