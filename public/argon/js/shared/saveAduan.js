function saveAduan() {
    var tajukAduan = document.getElementById('bantuan-tajukAduan').value;
    var keteranganAduan = document.getElementById('bantuan-keteranganAduan').value;

    $.ajax({
        url: 'bantuan/aduan',
        type: 'POST', 
        data: {
            tajukAduan : tajukAduan,
            keteranganAduan : keteranganAduan
        },
        success: function() {
            console.log('Aduan saved');
        },
        error: function() {
            console.log('Aduan failed');
        } 
    });
}