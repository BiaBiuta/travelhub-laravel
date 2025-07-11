

$(document).ready(function () {
    $(document).on('click', '.uploadButton', function () {
        console.log("am intrat in click");
        var form = document.getElementById('uploadForm');
        var formData = new FormData(form);
        $.ajax({
            type: "POST",
            url: 'http://localhost/backend_travel/users/uploadPost.php',
            data: formData,
       processData: false, // Prevent jQuery from automatically processing the data
            contentType: false,
            success: function (response) {
                console.log("s-a realizat cu succes");
                window.location.href = "./profile.php";
            },
            error: function (response) {
                console.log("Nu A mers");
                 window.location.href = "404.php";
            }
        });
        
    });
    // $(document).on('click', '.assignDepartment', function (evt) {
    //     var user_id = $(this).attr('data-user_id');
    //     console.log(user_id);
    //     $.ajax({
    //         type: "GET",
    //         url: 'http://localhost/backend_travel/users/assignDepartments.php',
    //         data: {
    //             user_id: user_id
    //         },
    //         success: function(response) {
    //             console.log("A mers");
    //             window.location.href = `assignedDepartment.php?user_id=${user_id}`;
    //         },
    //         error: function(response) {
    //             console.log("Nu A mers");
    //         }
    //     });
    // });
});