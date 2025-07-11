<x-layout>
    <div class="container">
    <div id="formEditContainer" class="mt-4 ">

    </div>
</div>
</x-layout>
<script>
    var userId = "{{ Auth::user()->id }}";
    $(document).ready(function () {
    console.log("am intrat on functie")
   
    var user_id = userId;
    console.log(user_id);
    console.log(user_id);
    var selectForm = $('#formEditContainer');
     var id_post = getLastPathSegment(window.location.href);
    $.ajax({
        type: "GET",
        url: '/view_edit_post/'+id_post,
        data: {
           
        },
        success: function (response) {
            console.log("A mers");
            console.log(response);
            
           
       // Obține token-ul CSRF din meta tag
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// Generare formular HTML folosind template literals
var htmlString = `
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Add New Post</h5>
        </div>
        <div class="card-body">
            <form id="uploadForm" method="POST" enctype="multipart/form-data" action="/posts/${id_post}">
                <input type="hidden" name="_token" value="${csrfToken}">
                <input type="hidden" name="_method" value="PATCH">
                <div class="mb-3">
                    <label for="photo" class="form-label">Photo</label>
                    <input type="file" class="form-control" name="photo" id="photo">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" class="form-control" cols="40" rows="2" name="description">${response['post'].description}</textarea>
                </div>
                <button type="submit" class="btn btn-primary uploadButton">Upload</button>
                <!-- <button type="button" class="btn btn-secondary" id="hideFormBtn">Close</button> -->
            </form>
        </div>
    </div>
`;

// Adaugă formularul în DOM
selectForm.innerHTML = htmlString;


                selectForm.append(htmlString);
                    const fileInput = document.querySelector('input[type="file"]');

    // Create a new File object
    const myFile = new File(['Hello World!'], response['post'].photo, {
        type: 'image/jpeg',
        lastModified: new Date(),
    });

    // Now let's create a DataTransfer to get a FileList
    const dataTransfer = new DataTransfer();
    dataTransfer.items.add(myFile);
    fileInput.files = dataTransfer.files;
            
            console.log("am afisat");
        },
        error: function (response) {
            console.log("Nu A mers");
             //window.location.href = "404.php";
        }
    });
  
    // $(document).on('click', '.uploadButton', function () {
    //     console.log("am intrat in click");
    //     var form = document.getElementById('uploadForm');
    //     var formData = new FormData(form);
    //      formData.append('id_post', id_post);
    //     $.ajax({
    //         type: "POST",
    //         url: '/editPost.php',
    //         data: formData,
    //    processData: false, // Prevent jQuery from automatically processing the data
    //         contentType: false,
    //         success: function (response) {
    //             console.log("s-a realizat cu succes");
    //             window.location.href = "./profile.php";
    //         },
    //         error: function (response) {
    //             console.log("Nu A mers");
    //              window.location.href = "404.php";
    //         }
    //     });
        
    // });
});

function getLastPathSegment(url) {
        var path = new URL(url).pathname;
        var segments = path.split('/');
        return segments.pop(); 
    }

</script>