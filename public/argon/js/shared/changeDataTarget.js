function changeDataTarget(status) {
    switch (status[2]) {
        case "1":
            document.getElementById("buttonEdit").setAttribute("data-target", "#modal-default");
            document.getElementById("pilihanJenisPermohonanIndividuInModal").setAttribute("placeholder", "Permohonan Individu");
            $("#modal-default").modal("show");
            $("#modal-default-berkumpulan").modal("dispose");
            break;
        case "2":
            document.getElementById("buttonEdit").setAttribute("data-target", "#modal-default-berkumpulan");
            document.getElementById("pilihanJenisPermohonanBerkumpulanInModal").setAttribute("placeholder", "Permohonan Berkumpulan");
            $("#modal-default-berkumpulan").modal("show");
            $("#modal-default").modal("dispose");
            break;
        default:
            console.log("out of Data Target");
            break;
    }
}