var selectStatus = [
    "Enabled",
    "Disabled"
];

var selectRole = [
    "Pentadbir Sistem",
    "Penyelia",
    "Datuk Bandar",
    "Ketua Bahagian",
    "Ketua Jabatan",
    "Kerani Semakan",
    "Kerani Pemeriksa",
    "Kakitangan",
    "Pelulus Pindaan"
];

 
var table = $('#datatable').DataTable({
    columns: [

        {data: 'id', name: 'id'},

        {data: 'name', name: 'name'},

        {data: 'email', name: 'email'},

        {data: 'created_at', name: 'created_at'},
        
        {data: 'role_id', name: 'role_id'},
        
        {data: 'status', name: 'status'},

       
    ],
    columnDefs:[
        
        {
        targets:3, render:function(data){
            console.log(data)
            return moment(data).format('DD/MM/YYYY');
        }},
        {
        type: "html-input",
        targets:4, render:function(data,type,row){
            var role;
            if(type == 'display' || row != null){
                if(data == 1){
                    role = "Pentadbir Sistem";

                }else if(data == 2){
                    role = "Penyelia";

                }else if(data == 3){
                    role = "Datuk Bandar";

                }else if(data == 4){
                    role = "Ketua Bahagian";

                }else if(data == 5){
                    role = "Ketua Jabatan";

                }else if(data == 6){
                    role = "Kerani Semakan";

                }else if(data == 7){
                    role = "Kerani Pemeriksa";

                }else if(data == 8){
                    role = "Kakitangan";

                }else if(data == 9){
                    role = "Pelulus Pindaan";

                }
            }
            var $select = $("<select></select>", {
                "id": row[0]+"start",
                "value": role
            });
            $.each(selectRole, function(k,v){
                var $option = $("<option></option>", {
                    "text": v,
                    "value": v
                });
                if(role === v){
                    $option.attr("selected", "selected")
                }
                $select.append($option);
            });
            console.log(role)
            return $select.prop("outerHTML");

        }},
        {
        type: "html-input",
        targets:5, render:function(data,type,row){
            var status;
            if(type == 'display' || row != null){
                if(data == 01){
                    status = 'Enabled';
                    var $select = $("<select></select>", {
                    	"id": row[0]+"start",
                        "value": status
                    });
                	$.each(selectStatus, function(k,v){
                    	var $option = $("<option></option>", {
                        	"text": v,
                            "value": v
                        });
                        if(status === v){
                        	$option.attr("selected", "selected")
                        }
                    	$select.append($option);
                    });
                    return $select.prop("outerHTML");

                }else if(data == 00){
                    status = 'Disabled';
                    var $select = $("<select></select>", {
                    	"id": row[0]+"start",
                        "value": status
                    });
                	$.each(selectStatus, function(k,v){
                    	var $option = $("<option></option>", {
                        	"text": v,
                            "value": v
                        });
                        if(status === v){
                        	$option.attr("selected", "selected")
                        }
                    	$select.append($option);
                    });
                    return $select.prop("outerHTML");
                }

            }
            // var $select = $("<select></select>", {
            //     	"id": row[0]+"start",
            //         "value": status
            //     });
            //     $.each(selectStatus, function(k,v){
            //     	var $option = $("<option></option>", {
            //         	"text": v,
            //             "value": v
            //         });
            //         if(status === v){
            //         	$option.attr("selected", "selected")
            //         }
            //     	$select.append($option);
            //     });
            //     return $select.prop("outerHTML");

        }},
    ],

    processing: true,
    serverSide: false,
    
    ajax: {
        url: "pengurusan-pengguna",
        type: 'GET',
        },
        "lengthMenu": [ 5, 10, 25, 50 ],
    
  responsive:true,
  autoWidth:false,
  
});

$.fn.dataTableExt.ofnSearch['html-input'] = function(value) {
    return $(value).val();
};

// $("#datatable td select").on('change', function() {
//     var $td = $(this).parent();
//     var value = this.value;
//     $td.find('option').each(function(i, o) {
//       $(o).removeAttr('selected');
//       if ($(o).val() == value) $(o).attr('selected', true);
//     })
//     table.cell($td).invalidate().draw();
// });    