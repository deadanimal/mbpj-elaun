function saveAduan() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: 'bantuan/aduan',
        type: 'POST', 
        data: {
            tajukAduan : document.getElementById('bantuan-tajukAduan').value,
            keteranganAduan : document.getElementById('bantuan-keteranganAduan').value
        },
        success: function() { console.log('Aduan saved'); },
        error: function() { console.log('Aduan failed'); } 
    });
}