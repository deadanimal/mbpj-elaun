// $("#modal-default-berkumpulan").modal("dispose");
// $("#modal-default").modal("dispose");

function changeDataTarget() {
    let pilihan = document.getElementById('selectJenisPermohonan').value;

    if (pilihan == "individu") {
        document.getElementById("buttonEdit").setAttribute("data-target", "#modal-default");
        $("#modal-default-berkumpulan").modal("dispose");
        console.log("1");

    }
    else if (pilihan == "berkumpulan"){
        document.getElementById("buttonEdit").setAttribute("data-target", "#modal-default-berkumpulan");
        $("#modal-default").modal("dispose");
        console.log("2");

    } else if (pilihan == "out"){
        console.log("out");
    }
}

