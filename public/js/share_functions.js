$(document).ready(function () {
    var user_id = "<?php echo $_SESSION['user_id']; ?>";
    console.log(user_id);
    var id_post=getParameterByName('id_post');
    var selectForm = $('#selectFormShare');

        $.ajax({
            type: "GET",
            url: 'http://localhost/backend_travel/users/share.php',
            data: {
                user_id: user_id,
              
            },
            success: function (response) {
                console.log("A mers");
                console.log(response);
                selectForm.empty();
                selectForm.append('<option value="-1">ALL</option>');
                response.data.forEach(function (dep) {
               selectForm.append('<option value="' + dep.id + '">' + dep.lastName + '</option>');

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
            console.warn("Niciun user nu a fost selectat.");
            return;
        }

        $.ajax({
            type: "POST",
            url: 'http://localhost/backend_travel/users/sharePost.php',
            data: {
                user_id: user_id,
                user_to_id: selectedDeptId,
                id_post:id_post
            },
            success: function (response) {
                console.log("A mers");
                window.location.href = './forum.php?assigned_department';
            },
            error: function (response) {
                console.log("Nu A mers");
                 window.location.href = "404.php";
            }
        });
    });
    // var selectedDeptId = $(this).val(); 
    // if (!selectedDeptId) {
    //     console.warn("Niciun departament nu a fost selectat.");
    //     return;
    // }

    // $tabelUsers.DataTable().ajax.url('http://localhost/backend_travel/users/tables.php?department_id=' + selectedDeptId).load();
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
    
