$("#modal-default-berkumpulan").modal("dispose");
$("#modal-default").modal("dispose");

// set default title of modal to Permohonan Kerja Lebih Masa
document.getElementById("modal-title-individu-title").innerHTML = "Permohonan Kerja Lebih Masa";
document.getElementById("modal-title-berkumpulan-title").innerHTML = "Permohonan Kerja Lebih Masa";
document.getElementById("titleTable").innerHTML = "Permohonan Baru Kerja Lebih Masa";

function retrieveTabPilihan(id) {
    // console.log(id);
    if (id == "tabPilihanTuntutanElaunLebihMasa") {
        document.getElementById("modal-title-individu-title").innerHTML = "Tuntutan Elaun Lebih Masa";
        document.getElementById("modal-title-berkumpulan-title").innerHTML = "Tuntutan Elaun Lebih Masa";
        document.getElementById("titleTable").innerHTML = "Tuntutan Baru Elaun Lebih Masa";
    } 
    else if (id == "tabPilihanPermohonanKerjaLebihMasa") {
        document.getElementById("modal-title-individu-title").innerHTML = "Permohonan Kerja Lebih Masa";
        document.getElementById("modal-title-berkumpulan-title").innerHTML = "Permohonan Kerja Lebih Masa";
        document.getElementById("titleTable").innerHTML = "Permohonan Baru Kerja Lebih Masa";
    } else {
        console.log("out of Tab Pilihan")
    }
} 

function changeDataTarget() {
    var pilihan = document.getElementById('selectJenisPermohonan').value;
    // console.log("changeDataTarget = "+pilihan);

    if (pilihan == "individu") {
        document.getElementById("buttonEdit").setAttribute("data-target", "#modal-default");
        document.getElementById("pilihanJenisPermohonanIndividuInModal").setAttribute("placeholder", "Permohonan Individu");
        $("#modal-default").modal("show");
        $("#modal-default-berkumpulan").modal("dispose");
    }
    else if (pilihan == "berkumpulan"){
        document.getElementById("buttonEdit").setAttribute("data-target", "#modal-default-berkumpulan");
        document.getElementById("pilihanJenisPermohonanBerkumpulanInModal").setAttribute("placeholder", "Permohonan Berkumpulan");
        $("#modal-default-berkumpulan").modal("show");
        $("#modal-default").modal("dispose");
    } else if (pilihan == "out"){
        console.log("out of Data Target");
    }
}
