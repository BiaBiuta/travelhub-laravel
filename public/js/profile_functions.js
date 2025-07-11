$(document).ready(function () {
    console.log("am intrat on functie")
    // var user_id = getParameterByName('user_id');
    var user_id = "<?php echo $_SESSION['user_id']; ?>"; 
    console.log(user_id);
    console.log(user_id);
    var selectForm = $('#profileMain');
    var searchBar = "";
    $('#dataFilterInput').on('input', function () {
        selectForm.find('.append_child').remove();
    searchBar = $(this).val();
        console.log(searchBar);
         $.ajax({
        type: "GET",
        url: 'http://localhost/backend_travel/users/profile.php',
        data: {
            user_id: user_id,
            searchBar:searchBar
        },
             success: function (response) {
            
            console.log("A mers");
            console.log(response);
            console.log(typeof response);
            
            response.data.forEach(function (dep) {
                console.log(dep.profile_photo);
                if (dep.profile_photo == "") {
                    dep.profile_photo = './img/undraw_profile_2.svg';
                }
                $nume_from = "  -   " + dep.id_user_from_lastName;
                var htmlString = "";
                if (dep.id_user_from_lastName == "") {
                    $nume_from = "";
                    htmlString =
                    "<div class='row justify-content-center append_child'>" +
                    "<div class='col-md-8'>" +
                    "<div class='card mb-4'>" +
                    "<div class='card-header d-flex align-items-center justify-content-between'>" +
                    "<div class='d-flex align-items-center'>" +
                    "<img src='" + dep.profile_photo + "' alt='User Profile Picture' class='rounded-circle me-3' style='width: 50px; height: 50px;'>" +
                    "<div>" +
                    "<h5 class='mb-0'>" + dep.firstName + " " + dep.lastName + $nume_from + "</h5>" +
                    "<small class='text-muted'>" + dep.dateTime + "</small>" +
                    "</div>" +
                    "</div>" +
                    "</div>" +
                    "<div class='card-body postare' data-user_id='" + dep.id_post + "'>"+
                    "<p>" + dep.description + "</p>" +
                    "<!-- Optional image -->" +
                    "<img src='" + dep.photo + "' alt='Post Image' class='img-fluid rounded'>" +
                    "</div>" +
                    "<div class='card-footer d-flex justify-content-around'>" +
                    "<button class='btn btn-outline-primary btn-sm'>Like</button>" +
                    "<button class='btn btn-outline-primary btn-sm commentButton' data-user_id='" + dep.id_post + "'>Comment</button>" +
                    "<button class='btn btn-outline-primary btn-sm shareButton' data-user_id='" + dep.id_post + "'>Share</button>" +
                    "</div>" +
                   
                    "</div>" +
                    "</div>" +
                    "</div>";
                }  else {
                    htmlString =
                    "<div class='row justify-content-center append_child'>" +
                    "<div class='col-md-8'>" +
                    "<div class='card mb-4'>" +
                    "<div class='card-header d-flex align-items-center justify-content-between'>" +
                    "<div class='d-flex align-items-center'>" +
                    "<img src='" + dep.profile_photo + "' alt='User Profile Picture' class='rounded-circle me-3' style='width: 50px; height: 50px;'>" +
                    "<div>" +
                    "<h5 class='mb-0'>" + dep.firstName + " " + dep.lastName +"</h5>" +
                    "<small class='text-muted'>" + dep.data_share + "</small>" +
                    "</div>" +
                    "</div>" +
                    "</div>" +
                    "<div class='card-body postare' data-user_id='" + dep.id_post + "'>"+
                    "<div class='row justify-content-center'>" +
                    "<div class='col-md-8'>" +
                    "<div class='card mb-4'>" +
                    "<div class='card-header d-flex align-items-center justify-content-between'>" +
                    "<div class='d-flex align-items-center'>" +
                    "<img src='" + dep.id_user_from_profilePhoto + "' alt='User Profile Picture' class='rounded-circle me-3' style='width: 50px; height: 50px;'>" +
                    "<div>" +
                    "<h5 class='mb-0'>"  + dep.id_user_from_firstName+""+dep.id_user_from_lastName + "</h5>" +
                    "<small class='text-muted'>" + dep.dateTime + "</small>" +
                    "</div>" +
                    "</div>" +
                    "</div>" +
                    "<div class='card-body postare' data-user_id='" + dep.id_post + "'>"+
                    "<p>" + dep.description + "</p>" +
                    "<!-- Optional image -->" +
                    "<img src='" + dep.photo + "' alt='Post Image' class='img-fluid rounded'>" +
                    "</div>" +
                    "<div class='card-footer d-flex justify-content-around'>" +
                    "<button class='btn btn-outline-primary btn-sm'>Like</button>" +
                    "<button class='btn btn-outline-primary btn-sm commentButton' data-user_id='" + dep.id_post + "'>Comment</button>" +
                    "<button class='btn btn-outline-primary btn-sm shareButton' data-user_id='" + dep.id_post + "'>Share</button>" +
                    "</div>" +
                    "<div class='card-body pt-0'>" +
                    "<div class='d-flex align-items-center my-2'>" +
                    "</div>" +
                    "</div> " +
                    "</div>" +
                    "</div>" +
                    "</div>"+
                    "</div>" +
                    "<div class='card-footer d-flex justify-content-around'>" +
                    "<button class='btn btn-outline-primary btn-sm'>Like</button>" +
                    "<button class='btn btn-outline-primary btn-sm commentButton' data-user_id='" + dep.id_post + "'>Comment</button>" +
                    "<button class='btn btn-outline-primary btn-sm shareButton' data-user_id='" + dep.id_post + "'>Share</button>" +
                    "</div>" +
                    
                    "</div>" +
                    "</div>" +
                    "</div>";
                }
                selectForm.append(htmlString);

            });
            console.log("am afisat");
        },
        error: function (response) {
            console.log("Nu A mers");
             window.location.href = "404.php";
        }
    });
});

$('.input-group-append button').on('click', function () {
    // Acțiunea ta de căutare cu textul din searchBar
    console.log("Căutare declanșată pentru: " + searchBar);
});

    console.log(searchBar);
    $.ajax({
        type: "GET",
        url: 'http://localhost/backend_travel/users/profile.php',
        data: {
            user_id: user_id,
            searchBar:searchBar
        },
        success: function (response) {
            console.log("A mers");
            console.log(response);
            console.log(typeof response);
            
            response.data.forEach(function (dep) {
                console.log(dep.profile_photo);
                if (dep.profile_photo == "") {
                    dep.profile_photo = './img/undraw_profile_2.svg';
                }
                $nume_from = "  -   " + dep.id_user_from_lastName;
                var htmlString = "";
                if (dep.id_user_from_lastName == "") {
                    $nume_from = "";
                    htmlString =
                    "<div class='row justify-content-center append_child'>" +
                    "<div class='col-md-8'>" +
                    "<div class='card mb-4'>" +
                    "<div class='card-header d-flex align-items-center justify-content-between'>" +
                    "<div class='d-flex align-items-center'>" +
                    "<img src='" + dep.profile_photo + "' alt='User Profile Picture' class='rounded-circle me-3' style='width: 50px; height: 50px;'>" +
                    "<div>" +
                    "<h5 class='mb-0'>" + dep.firstName + " " + dep.lastName + $nume_from + "</h5>" +
                    "<small class='text-muted'>" + dep.dateTime + "</small>" +
                    "</div>" +
                    "</div>" +
                    "</div>" +
                    "<div class='card-body postare' data-user_id='" + dep.id_post + "'>"+
                    "<p>" + dep.description + "</p>" +
                    "<!-- Optional image -->" +
                    "<img src='" + dep.photo + "' alt='Post Image' class='img-fluid rounded'>" +
                    "</div>" +
                    "<div class='card-footer d-flex justify-content-around'>" +
                    "<button class='btn btn-outline-primary btn-sm'>Like</button>" +
                    "<button class='btn btn-outline-primary btn-sm commentButton' data-user_id='" + dep.id_post + "'>Comment</button>" +
                    "<button class='btn btn-outline-primary btn-sm shareButton' data-user_id='" + dep.id_post + "'>Share</button>" +
                    "</div>" +
                    "<div class='card-body pt-0'>" +
                    "<div class='d-flex align-items-center my-2'>" +
                    "</div>" +
                    "</div> " +
                    "</div>" +
                    "</div>" +
                    "</div>";
                }  else {
                    htmlString =
                    "<div class='row justify-content-center append_child'>" +
                    "<div class='col-md-8'>" +
                    "<div class='card mb-4'>" +
                    "<div class='card-header d-flex align-items-center justify-content-between'>" +
                    "<div class='d-flex align-items-center'>" +
                    "<img src='" + dep.profile_photo + "' alt='User Profile Picture' class='rounded-circle me-3' style='width: 50px; height: 50px;'>" +
                    "<div>" +
                    "<h5 class='mb-0'>" + dep.firstName + " " + dep.lastName +"</h5>" +
                    "<small class='text-muted'>" + dep.data_share + "</small>" +
                    "</div>" +
                    "</div>" +
                    "</div>" +
                    "<div class='card-body postare' data-user_id='" + dep.id_post + "'>"+
                    "<div class='row justify-content-center'>" +
                    "<div class='col-md-8'>" +
                    "<div class='card mb-4'>" +
                    "<div class='card-header d-flex align-items-center justify-content-between'>" +
                    "<div class='d-flex align-items-center'>" +
                    "<img src='" + dep.id_user_from_profilePhoto + "' alt='User Profile Picture' class='rounded-circle me-3' style='width: 50px; height: 50px;'>" +
                    "<div>" +
                    "<h5 class='mb-0'>"  + dep.id_user_from_firstName+""+dep.id_user_from_lastName + "</h5>" +
                    "<small class='text-muted'>" + dep.dateTime + "</small>" +
                    "</div>" +
                    "</div>" +
                    "</div>" +
                    "<div class='card-body postare' data-user_id='" + dep.id_post + "'>"+
                    "<p>" + dep.description + "</p>" +
                    "<!-- Optional image -->" +
                    "<img src='" + dep.photo + "' alt='Post Image' class='img-fluid rounded'>" +
                    "</div>" +
                    "<div class='card-footer d-flex justify-content-around'>" +
                    "<button class='btn btn-outline-primary btn-sm'>Like</button>" +
                    "<button class='btn btn-outline-primary btn-sm commentButton' data-user_id='" + dep.id_post + "'>Comment</button>" +
                    "<button class='btn btn-outline-primary btn-sm shareButton' data-user_id='" + dep.id_post + "'>Share</button>" +
                    "</div>" +
                    "<div class='card-body pt-0'>" +
                    "<div class='d-flex align-items-center my-2'>" +
                    "</div>" +
                    "</div> " +
                    "</div>" +
                    "</div>" +
                    "</div>"+
                    "</div>" +
                    "<div class='card-footer d-flex justify-content-around'>" +
                    "<button class='btn btn-outline-primary btn-sm'>Like</button>" +
                    "<button class='btn btn-outline-primary btn-sm commentButton' data-user_id='" + dep.id_post + "'>Comment</button>" +
                    "<button class='btn btn-outline-primary btn-sm shareButton' data-user_id='" + dep.id_post + "'>Share</button>" +
                    "</div>" +
                    "<div class='card-body pt-0'>" +
                    "<div class='d-flex align-items-center my-2'>" +
                    "</div>" +
                    "</div> " +
                    "</div>" +
                    "</div>" +
                    "</div>";
                }
                selectForm.append(htmlString);

            });
            console.log("am afisat");
        },
        error: function (response) {
            console.log("Nu A mers");
             window.location.href = "404.php";
        }
    });
     $(document).on('click', '.deletePost', function (evt) {
         var id_post = $(this).attr('data-user_id');
         var user_id = "<?php echo $_SESSION['user_id']; ?>";
        console.log(user_id);
         $.ajax({
             type: "POST",
             url: 'http://localhost/backend_travel/users/deletePhoto.php',
             data: {
                 user_id: user_id,
                 id_post: id_post
             },
             success: function (response) {
                 console.log("A mers");
                
                 window.location.href = './profile.php';
             },
             error: function (response) {
                 console.log("Nu A mers");
                  window.location.href = "404.php";
             }
         });
     });
      $(document).on('click', '.postare', function (evt) {
        var form = $(this).closest('form.forumComment');
        
        var post_id = $(this).attr('data-user_id');
        console.log(post_id);
         window.location.href = "./chat.php?id_post="+post_id;
    });
   
    });
    


