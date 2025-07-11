$(document).ready(function () {
    console.log("am intrat on functie")
    // var user_id = getParameterByName('user_id');
    var user_id = "<?php echo $_SESSION['user_id']; ?>"; 
    console.log(user_id);
    console.log(user_id);
    var selectForm = $('#formEditContainer');
     var id_post = getParameterByName('id_post');
    $.ajax({
        type: "GET",
        url: 'http://localhost/backend_travel/users/view_edit_post.php',
        data: {
            id_post: id_post
        },
        success: function (response) {
            console.log("A mers");
            console.log(response);
            console.log(typeof response);
            
            response.data.forEach(function (dep) {
               
         var htmlString = "<div class=\"card\">" +
    "<div class=\"card-header\">" +
        "<h5 class=\"card-title\">Add New Post</h5>" +
    "</div>" +
    "<div class=\"card-body\">" +
        "<form id=\"uploadForm\" method=\"POST\" enctype=\"multipart/form-data\">" +
            "<div class=\"mb-3\">" +
                "<label for=\"photo\" class=\"form-label\">Photo</label>" +
                "<input type=\"file\" class=\"form-control\" name=\"photo\" id=\"photo\">" +
            "</div>" +
            "<div class=\"mb-3\">" +
                "<label for=\"description\" class=\"form-label\">Description</label>" +
                "<textarea id=\"description\" class=\"form-control\" cols=\"40\" rows=\"2\" name=\"description\">"+dep.description+"</textarea>" +
            "</div>" +
            "<button type=\"button\" class=\"btn btn-primary uploadButton\">Upload</button>" +
            "<!-- <button type=\"button\" class=\"btn btn-secondary\" id=\"hideFormBtn\">Close</button> -->" +
        "</form>" +
    "</div>" +
                    "</div>";

                selectForm.append(htmlString);
                    const fileInput = document.querySelector('input[type="file"]');

    // Create a new File object
    const myFile = new File(['Hello World!'], dep.photo, {
        type: 'image/jpeg',
        lastModified: new Date(),
    });

    // Now let's create a DataTransfer to get a FileList
    const dataTransfer = new DataTransfer();
    dataTransfer.items.add(myFile);
    fileInput.files = dataTransfer.files;
            });
            console.log("am afisat");
        },
        error: function (response) {
            console.log("Nu A mers");
             window.location.href = "404.php";
        }
    });
  
    $(document).on('click', '.uploadButton', function () {
        console.log("am intrat in click");
        var form = document.getElementById('uploadForm');
        var formData = new FormData(form);
         formData.append('id_post', id_post);
        $.ajax({
            type: "POST",
            url: 'http://localhost/backend_travel/users/editPost.php',
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
