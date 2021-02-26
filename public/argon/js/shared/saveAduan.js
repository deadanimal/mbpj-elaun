function saveAduan() {
    var tajukAduan = document.getElementById('bantuan-tajukAduan').value;
    var keteranganAduan = document.getElementById('bantuan-keteranganAduan').value;
    
    console.log(tajukAduan);
    console.log(keteranganAduan);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

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