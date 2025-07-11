<x-layout>
    <div>
    <select id="selectForm" class=" form-select" aria-label="Default select example">
        <option selected>Open this select menu</option>
        <option value="">Selectați un departament</option>
        @foreach ($departments as $department )
            <option value=" {{$department['id']}} "> {{$department['name'] }}</option>
        @endforeach
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
    $(document).ready(function () {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

 var user_id = getLastPathSegment(window.location.href);
    console.log(user_id);
    var selectForm = $('#selectForm');
    selectForm.on('change', function (event) {
        event.preventDefault();
        var selectedDeptId = $(this).val(); 
        console.log(selectedDeptId);
        if (!selectedDeptId) {
            console.warn("Niciun departament nu a fost selectat.");
            return;
        }
        $.ajax({
            type: "POST",
            url: '/users/department/edit/'+user_id+'/'+selectedDeptId,
            data: {
                user_id: user_id,
                department_id: selectedDeptId 
            },
            success: function (response) {
                console.log("A mers");
                window.location.href = '/tables?assigned_department';
            },
            error: function (response) {
                console.log("Nu A mers");
                 //window.location.href = "404.php";
            }
        });
    });
});
    

function getLastPathSegment(url) {
        var path = new URL(url).pathname;
        var segments = path.split('/');
        return segments.pop(); 
    }


</script>