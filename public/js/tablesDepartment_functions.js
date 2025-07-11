 $.ajax({
        type: "GET",
        url: "http://localhost/backend_travel/users/verifyAccess.php",
        data: {
            
        },
        success: function (response) {
             console.log(response.data)
            response.data.forEach(function (dep) {
                console.log(response.data);
                var x = verify_function(dep.access, "2");
                console.log(x);
                if (x==0) {
                    window.location.href = "Error403.php";
                }
            });
        },
        error: function (response) {
            console.log("Nu A mers");
            console.log(response.data);
            window.location.href = "Error404.php";
        }
    })
$(document).ready(function () {
    
    var $tabelUsers = $('#dataDepartmentTable');
    var optionTabelUsers = {
        "pageLength": 25,
        "processing": true,
        "serverSide": true,
        "deferRender": true,
        "autoWidth": false,
        "orderCellsTop": false,
        "fixedHeader": false,
        "bFilter": true,
        "ajax": {
            "url": "http://localhost/backend_travel/users/tablesDepartments.php",
            "data": function (c) {
        
            },
        },
        'order': [[0]],
        "columns": [
            { "data": "index", "className": "text-center", "width": "30px" },
            { "data": "name", "className": "center", "sortable": false },
            { "data": "description", "className": "center", "sortable": false }
        ],
        "createdRow": function (row, data, index) {
        },
        columnDefs: [
            { orderable: false, targets: [0, -1] }
        ],
    };
    var init_data_table = $tabelUsers.dataTable(optionTabelUsers).api();
 
});
function verify_function(string_access, id) {
    console.log("Am intrat in functie");
    var elements = [];
    elements = string_access.split(",");
    var ok = false;
    for (i = 0; i < elements.length; i++){
        console.log(elements[i]);
        if (elements[i] == id) {
            ok = true;
        }
    }
    return ok;
}
