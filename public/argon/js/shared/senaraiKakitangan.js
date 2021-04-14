function fillInSenaraiKakitangan(senaraiKakitangan, jenisPermohonan) {

    // Clear up senarai Kakitangan
    $("#senaraiKakitanganBerkumpulan").html("");

    senaraiKakitangan.forEach((element, index) => {
        var content = '<li>' +
                      '<div class="row">' +
                      '<div class="nav-item col-11" onclick="fillInKedatangan('+element['CUSTOMERID']+','+"'"+ jenisPermohonan +"'"+','+element.permohonan_with_users.id_permohonan_baru+')" role="presentation"><a class="nav-link" id="'+ element.id +'" data-toggle="pill" href="#" role="tab" aria-controls="test1" aria-selected="true">'+element.NAME+'</a></div>' +
                      '<div class="col-1 align-self-center">' +
                      '<button type="button" onclick="rejectIndividually('+element.permohonan_with_users.id_permohonan_baru+','+element.CUSTOMERID+','+ "'" + element.NAME + "'" +')" class="close"><span aria-hidden="true">×</span></button>' +
                      '</div>' +
                      '</div>' +
                      '</li>';
        $("#senaraiKakitanganBerkumpulan").append(content);
    });
}