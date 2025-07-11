$(document).ready(function () {
    var user_id = getParameterByName('user_id');
    console.log(user_id);
    var selectForm = $('#selectForm');

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
                
            selectForm.append('<option value="">Selectați un departament</option>');
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
    selectForm.on('change', function (event) {
        event.preventDefault();
        var selectedDeptId = $(this).val(); 
        if (!selectedDeptId) {
            console.warn("Niciun departament nu a fost selectat.");
            return;
        }

        $.ajax({
            type: "POST",
            url: 'http://localhost/backend_travel/users/lipireDepartment.php',
            data: {
                user_id: user_id,
                department_id: selectedDeptId 
            },
            success: function (response) {
                console.log("A mers");
                window.location.href = './tables.php?assigned_department';
            },
            error: function (response) {
                console.log("Nu A mers");
                 window.location.href = "404.php";
            }
        });
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

