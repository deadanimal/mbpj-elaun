function showBlockKadarJam(jenisHari) {
    var blockKadarJam = jenisHari+'Block';
    var jenisHariArray = ['hariBiasa', 'hariRehat', 'hariAm'];
    
    if (document.getElementById(jenisHari).checked) {
        document.getElementById(blockKadarJam).style.display = "block";
    }

    jenisHariArray.forEach(hari => {
        if (hari != jenisHari) {
            blockKadarJam = hari+'Block';
            document.getElementById(blockKadarJam).style.display = "none";
        }
    });
}