$(document).ready(function () {
   
    var $tabelUsers = $('#dataTable');
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
            "url": "http://localhost/backend_travel/users/tables.php",
            "data": function (c) {
                c.department_id = $('#selectFormDepartment').val();
                c.searchTotal = $('.dataTables_filter input').val();
            },
        },
        'order': [[0]],
        "columns": [
            { "data": "index", "className": "text-center", "width": "30px" },
            { "data": "firstName", "className": "center", "sortable": false },
            { "data": "lastName", "className": "center", "sortable": false },
           
            { "data": "email", "className": "center", "sortable": false },
            { "data": "address", "className": "center", "width": "60px", "sortable": false },
            
            {
                "data": "actions", "className": "center", "sortable": false,
                "render": function(data, type, row, meta) {
            // Assuming actions is an array, you can join them without commas
            return data.join(' '); // Join with a space or any other separator
        }
             },
            { "data": "nameDepartment", "className": "center", "sortable": false }
        ],
        "createdRow": function (row, data, index) {
        },
        columnDefs: [
            { orderable: false, targets: [0, -1] }
        ],
    };
    var init_data_table = $tabelUsers.dataTable(optionTabelUsers).api();
    $(document).ready(function() {
    $(document).on('click', '.assignDepartment', function (evt) {
        var user_id = $(this).attr('data-user_id');
        console.log(user_id);
        $.ajax({
            type: "GET",
            url: 'http://localhost/backend_travel/users/assignDepartments.php',
            data: {
                user_id: user_id
            },
            success: function(response) {
                console.log("A mers");
                window.location.href = `./assignedDepartment.php?user_id=${user_id}`;
            },
            error: function(response) {
                console.log("Nu A mers");
                 window.location.href = "404.php";
            }
        });
    });
    });
     $(document).on('click', '.editButton', function (evt) {
        var user_id = $(this).attr('data-user_id');
        console.log(user_id);
        $.ajax({
            type: "POST",
            url: 'http://localhost/backend_travel/users/editStatus.php',
            data: {
                user_id:user_id
            },
            success: function(response) {
                console.log("A mers");
                console.log(response);
                window.location.href = './tables.php?editedButton';
            },
            error: function(response) {
                console.log("Nu A mers");
                 window.location.href = "404.php";
            }
        })
    });

    $(document).on('click', '.deleteUser', function (evt) {
        var user_id = $(this).attr('data-user_id');
        console.log(user_id);
        $.ajax({
            type: "POST",
            url: 'http://localhost/backend_travel/users/deleteTables.php',
            data: {
                user_id:user_id
            },
            success: function(response) {
                console.log("A mers");
                window.location.href = './tables.php?deleted_succes';
            },
            error: function(response) {
                console.log("Nu A mers");
                 window.location.href = "404.php";
            }
        })
    });
    var user_id = getParameterByName('user_id');
    console.log(user_id);
   
    var selectForm = $('#selectFormDepartment');

        $.ajax({
            type: "GET",
            url: 'http://localhost/backend_travel/users/assignDepartments.php',
            data: {
                user_id: user_id
            },
            success: function (response) {
                console.log("A mers");
                console.log(response);
                selectForm.empty();
                selectForm.append('<option value="-1">ALL</option>');
            response.forEach(function (dep) {
               selectForm.append('<option value="' + dep.id + '">' + dep.name + '</option>');

            });
                console.log("am afisat");
            },
            error: function (response) {
                console.log("Nu A mers");
                 window.location.href = "404.php";
            }
        });
     $(document).on('click', '.accessButton', function (evt) {
        var user_id = $(this).attr('data-user_id');
        console.log(user_id);
         window.location.href = "http://localhost/aplicatie_travel/accessModified.php?id_user="+user_id;
    });
   selectForm.on('change', function (event) {
       event.preventDefault();
       init_data_table.ajax.reload();
       
    // var selectedDeptId = $(this).val(); 
    // if (!selectedDeptId) {
    //     console.warn("Niciun departament nu a fost selectat.");
    //     return;
    // }

    // $tabelUsers.DataTable().ajax.url('http://localhost/backend_travel/users/tables.php?department_id=' + selectedDeptId).load();
   });
    

});
    

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}


document.addEventListener('DOMContentLoaded', () => {
     const currentUrl = window.location.href;
        if (currentUrl.includes('deleted_succes')) {
            document.getElementById("alertDiv").removeAttribute("hidden");
        }
        else if (currentUrl.includes('editedButton')) {
             $('#alertDivButton strong').text('s-a editat cu succes');
             document.getElementById("alertDivButton").removeAttribute("hidden");
           
           
        }
})

    
