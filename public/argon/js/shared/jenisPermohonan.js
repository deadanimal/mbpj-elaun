$("#modal-default-berkumpulan").modal("dispose");
$("#modal-default").modal("dispose");

// set default title of modal to Permohonan Kerja Lebih Masa
document.getElementById("modal-title-individu-title").innerHTML = "Permohonan Kerja Lebih Masa";
document.getElementById("modal-title-berkumpulan-title").innerHTML = "Permohonan Kerja Lebih Masa";
document.getElementById("titleTable").innerHTML = "Permohonan Baru Kerja Lebih Masa";

function retrieveTabPilihan(id) {
    switch (id) {
        case "tabPilihanTuntutanElaunLebihMasa":
            document.getElementById("modal-title-individu-title").innerHTML = "Tuntutan Elaun Lebih Masa";
            document.getElementById("modal-title-berkumpulan-title").innerHTML = "Tuntutan Elaun Lebih Masa";
            document.getElementById("titleTable").innerHTML = "Tuntutan Baru Elaun Lebih Masa";
            break;
        case "tabPilihanPermohonanKerjaLebihMasa":
            document.getElementById("modal-title-individu-title").innerHTML = "Permohonan Kerja Lebih Masa";
            document.getElementById("modal-title-berkumpulan-title").innerHTML = "Permohonan Kerja Lebih Masa";
            document.getElementById("titleTable").innerHTML = "Permohonan Baru Kerja Lebih Masa";
            break;
        default:
            document.getElementById("modal-title-individu-title").innerHTML = "Pengesahan Kerja Lebih Masa";
            document.getElementById("modal-title-berkumpulan-title").innerHTML = "Pengesahan Kerja Lebih Masa";
            document.getElementById("titleTable").innerHTML = "Pengesahan Baru Kerja Lebih Masa";
            break;
    }
} 

