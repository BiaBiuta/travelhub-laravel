$(document).ready(function () {
    console.log("am intrat on functie")
    // var user_id = getParameterByName('user_id');
    var user_id = "<?php echo $_SESSION['user_id']; ?>";
    var comentList = $('#commentList');
    var id_post = getParameterByName('id_post');
    $.ajax({
        type: "GET",
        url: 'http://localhost/backend_travel/users/view_comments.php',
        data: {
            id_post: id_post,
            user_id: user_id
        },
        success: function (response) {
            console.log("A mers");
            console.log(response);
            console.log(typeof response);

            
            response.data.forEach(function (dep) {
                var htmlString = "<li class=' in'>" +
                "<div class='chat-img'></div>" +
                "<div class='chat-body'>" +
                "<div class='chat-message'>" +
                "<h5>" + dep.lastName + " " + dep.firstName + "</h5>" +
                "<small>"+dep.dateTime+"</small>" +
                "<p>"+dep.description+"</p>" +
                "</div>" +
                "</div>" +
                "</li>"
                if (dep.id_user == user_id) {
                    var htmlString = "<li class=' out'>" +
                        "<div class='chat-img'></div>" +
                        "<div class='chat-body'>" +
                        "<div class='chat-message'>" +
                        "<h5>" + dep.lastName + " " + dep.firstName + "</h5>" +
                "<small>"+dep.dateTime+"</small>" +
                "<p>"+dep.description+"</p>" +
                "</div>" +
                "</div>" +
                        "</li>" 
                }
                console.log(dep.description);
                comentList.append(htmlString);
            

    
            });
            var comment_line = "<form class='d-flex forumComment'>" +
                "<input type='text' class='form-control me-2 textComment' placeholder='Add a comment...' data-user_id='" + id_post + "'>" +
                "<button type='submit' class='btn btn-primary btn-sm buttonSubmitComment' data-user_id='" + id_post + "'>Post</button>" +
                "</form>";
            comentList.append(comment_line);
  
        },

        error: function(response) {
            console.log("Nu A mers");
            window.location.href = "404.php";
            }
})
});
 $(document).on('click', '.buttonSubmitComment', function (evt) {
        evt.preventDefault();  
        var form = $(this).closest('form.forumComment');
        var inputText = form.find('.textComment');
        var buttonSubmit = form.find('.buttonSubmitComment');
        var commentText = inputText.val();
        inputText.val("");

        var post_id = $(this).attr('data-user_id');

        // Now you have both the comment and the user ID
        console.log("Comment: " + commentText + ", Pots ID: " + post_id);
         var user_id = "<?php echo $_SESSION['user_id']; ?>";
        $.ajax({
            type: "POST",
            url:'http://localhost/backend_travel/users/addComments.php',
            data: {
                user_id: user_id,
                post_id: post_id,
                commentText:commentText
            },
            success: function(response) {
                console.log("A mers");
                
                window.location.href = "./chat.php?id_post="+post_id;
            },
            error: function(response) {
                console.log("Nu A mers");
                 window.location.href = "404.php";
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