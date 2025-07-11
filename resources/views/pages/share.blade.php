<x-layout>
    <div>
    <select id="selectFormShare" class=" form-select" aria-label="Default select example">
        <option selected>Open this select menu</option>

    </select>
    <div id="alertDiv" class=" alert alert-warning  alert-dismissible fade show" hidden role="alert">
        <strong>S-a sters cu succes</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</x-layout>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
     var userId = "{{ Auth::user()->id }}";
    $(document).ready(function () {
    var user_id = userId;
    console.log(user_id);
    var id_post = getLastPathSegment(window.location.href);
    var selectForm = $('#selectFormShare');

        $.ajax({
            type: "GET",
            url: '/user',
        
            success: function (response) {
                console.log("A mers");
                console.log(response);
                //ar users = {!! json_encode(session('users')) !!};

                selectForm.empty();
                selectForm.append('<option value="-1">ALL</option>');
                response['users'].forEach(function (dep) {
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
            url: '/share',
            data: {
                user_id: user_id,
                user_to_id: selectedDeptId,
                id_post:id_post
            },
            success: function (response) {
                console.log("A mers");
                window.location.href = '/posts';
            },
            error: function (response) {
                console.log("Nu A mers");
            //      window.location.href = "404.php";
            }
        });
    });
   
   });
    
// function getParameterByName(name, url) {
//     if (!url) url = window.location.href;
//     name = name.replace(/[\[\]]/g, '\\$&');
//     var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
//         results = regex.exec(url);
//     if (!results) return null;
//     if (!results[2]) return '';
//     return decodeURIComponent(results[2].replace(/\+/g, ' '));
// }

    



// document.addEventListener('DOMContentLoaded', () => {
//      const currentUrl = window.location.href;
//         if (currentUrl.includes('deleted_succes')) {
//             document.getElementById("alertDiv").removeAttribute("hidden");
//         }
//         else if (currentUrl.includes('editedButton')) {
//              $('#alertDivButton strong').text('s-a editat cu succes');
//              document.getElementById("alertDivButton").removeAttribute("hidden");
           
           
//         }
// })
   function getLastPathSegment(url) {
        var path = new URL(url).pathname;
        var segments = path.split('/');
        return segments.pop(); 
    }
 

</script>