function fillInSenaraiKakitangan(senaraiKakitangan, jenisPermohonan) {

    // Clear up senarai Kakitangan
    $("#senaraiKakitanganBerkumpulan").html("");

    senaraiKakitangan.forEach(element => {
        $("#senaraiKakitanganBerkumpulan").append('<li class="nav-item mb-1" onclick="fillInKedatangan('+element.id+','+"'"+ jenisPermohonan +"'"+')" id="'+element.id+'" role="presentation"><a class="nav-link" data-bs-toggle="pill" href="#" role="tab" aria-controls="test1" aria-selected="true">'+element.name+'</a></li>');
    });

    // For making the last element border shorter
    $(document).ready(function(){
        $("#senaraiKakitanganBerkumpulan").append('<li class="" role=""><a class="" id="" data-bs-toggle="" href="" role="" aria-controls="" aria-selected=""></a></li>');
    });  
}