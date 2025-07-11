$(document).ready(function () {
    var user_id = getParameterByName('id_user');
    console.log(user_id);
    var checkForm = $('#checkForm');

    $.ajax({
        type: "GET",
        url: 'http://localhost/backend_travel/users/access.php',
        data: {
            user_id: user_id
        },
        success: function (response) {
            console.log("A mers");
            console.log(response);
            checkForm.empty();
            response.data.forEach(function (dep) {
                console.log(dep.access);
                console.log(dep.access_all);
                for (var i = 0; i < dep.access_all.length; i++) {
                    console.log(dep.access_all[i]);
                    var ok = 0;
                    for (var j = 0; j < dep.access.length; j++) {
                        if (dep.access_all[i].id == dep.access[j]) {
                            console.log("Am intrat aici");
                            ok = 1;
                            checkForm.append(" <input type='checkbox' id='q[]' name='q[]' value='" + dep.access_all[i].id + "'checked>");
                            checkForm.append("<label for='q[]'> " + dep.access_all[i].name + " </label><br>");
                        }
                    }
                    if (ok == 0) {
                        checkForm.append(" <input type='checkbox' id='q' name='q[]' value='" + dep.access_all[i].id + "'>");
                        checkForm.append("<label for='q[]'> " + dep.access_all[i].name + " </label><br>");
                    }
                }
                checkForm.append('<button type="button" class="btn btn-primary updateAcces">Submit</button>')
            });
         
        },
                
            
           
        error: function (response) {
            console.log("Nu A mers");
            //window.location.href = "Error404.php";
        }
    });
});
$(document).on('click', '.updateAcces', function () {
     var user_id = getParameterByName('id_user');
    console.log("am intrat in click");
    var form = document.getElementById('checkForm');
    var formData = new FormData(form);
    formData.append('user_id', user_id);
    console.log("trebuie sa trimit");
    console.log(formData);
    $.ajax({
        type: "POST",
        url: 'http://localhost/backend_travel/users/updateAccess.php',
        data:  formData,
        processData: false,
        contentType: false,
        success: function (response) {
            console.log("s-a realizat cu succes");
            window.location.href = "./tables.php";
        },
        error: function (response) {
            console.log("Nu A mers");
            //window.location.href = "404.php";
        }
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