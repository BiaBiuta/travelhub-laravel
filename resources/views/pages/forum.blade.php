@php
    use App\Models\User;
    use App\Models\Posts;
@endphp
<x-layout>
    
    <main class="container" id="dataForum">
    <div class="card-header d-flex md-8 mb-4 justify-content-center">
        <form
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="POST" >
            @csrf
            @method("POST")
            <div class="input-group">
                <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Search for..."
                    aria-label="Search" aria-describedby="basic-addon2" id="dataFilterInput">
                
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
              
            </div>    
      </form>
      
    </div>
    @foreach ($posts as $post )
                   @php
                    $profilePhoto = $post['user']['profile_photo'] ?: asset('img/undraw_profile_2.svg');

                    $nameFrom = $post['user']['lastName'] ? " - " . $post['user']['lastName'] : '';
                @endphp
                @if (isset($post['id_user_to']))
                <div class="row justify-content-center append_child">
                    <div class="col-md-8">
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img src="{{User::find($post['id_user_to'])->profile_photo}}" alt="User Profile Picture" class="rounded-circle me-3" style="width: 50px; height: 50px;">
                                    <div>
                                        <h5 class="mb-0">{{User::find($post['id_user_to'])->firstName}}  {{User::find($post['id_user_to'])->lastName}}{{ $nameFrom }}</h5>
                                        <small class="text-muted">{{date('Y-m-d H:i:s', strtotime( $post['created_at']))}}</small>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-outline-primary btn-sm dowlandButton" data-user_id="{{ $post['posts_id'] }}">Dowland</button>
                                </div>
                            </div>

                        <div class="card-body postare" data-user_id="{{ $post['posts_id']}}">
                                <div class='row justify-content-center'>
                                <div class='col-md-8'>
                                <div class='card mb-4'>
                            <div class='card-header d-flex align-items-center justify-content-between'>
                                <div class='d-flex align-items-center'>
                                <img src='{{$profilePhoto}}' alt='User Profile Picture' class='rounded-circle me-3' style='width: 50px; height: 50px;'>
                                <div>
                                <h5 class='mb-0'> {{$post['user']['firstName']}} {{ $post['user']['lastName']  }} </h5>
                                <small class='text-muted'> {{Posts::find($post['posts_id'])['created_at']}} </small>
                                </div>
                                </div>
                                </div>
                                <div class='card-body postare' data-user_id='" + dep.id_post + "'>
                                <p>{{ $post['posts']['description'] }}</p>
                                @if ($post['posts']['photo'])
                                    <img src="{{ $post['posts']['photo'] }}" alt="Post Image" class="img-fluid rounded">
                                @endif
                            </div>

                            <div class="card-footer d-flex justify-content-around">
                                <button class="btn btn-outline-primary btn-sm">Like</button>
                                <button class="btn btn-outline-primary btn-sm commentButton" data-user_id="{{ $post['posts_id'] }}">Comment</button>
                                <a class="btn btn-outline-primary btn-sm shareButton" data-user_id="{{ $post['posts_id'] }} " href="/share/{{$post['posts_id']}}">Share</a>
                            </div>

                            @if ($post['user']['lastName'])
                                <div class="card-body pt-0">
                                    <div class="d-flex align-items-center my-2">
                                     
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                </div>
                </div>
                    </div>
                    </div>
                
                @else
                 <div class="row justify-content-center append_child">
                    <div class="col-md-8">
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $profilePhoto }}" alt="User Profile Picture" class="rounded-circle me-3" style="width: 50px; height: 50px;">
                                    <div>
                                        <h5 class="mb-0">{{ $post['user']['firstName'] }} {{ $post['user']['lastName'] }}{{ $nameFrom }}</h5>
                                        <small class="text-muted">{{ $post['created_at'] }}</small>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-outline-primary btn-sm dowlandButton" data-user_id="{{ $post['id'] }}">Dowland</button>
                                </div>
                            </div>

                            <div class="card-body postare" data-user_id="{{ $post['id']}}">
                                <p>{{ $post['description'] }}</p>
                                @if ($post['photo'])
                                    <img src="{{ $post['photo'] }}" alt="Post Image" class="img-fluid rounded">
                                @endif
                            </div>

                            <div class="card-footer d-flex justify-content-around">
                                <button class="btn btn-outline-primary btn-sm">Like</button>
                                <button class="btn btn-outline-primary btn-sm commentButton" data-user_id="{{ $post['id'] }}">Comment</button>
                                <a class="btn btn-outline-primary btn-sm shareButton" data-user_id="{{ $post['id'] }} " href="/share/{{$post['id']}}">Share</a>
                            </div>

                            @if ($post['user']['lastName'])
                                <div class="card-body pt-0">
                                    <div class="d-flex align-items-center my-2">
                                     
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                </div>
                @endif
    @endforeach
</main>
</x-layout>
<script>
    $(document).ready(function () {
         var selectForm = $('#dataForum');
    var searchBar = "";
    $('[name="search"]').on('input', function () {
        selectForm.find('.append_child').remove();
        //evt.preventDefault();
        searchBar = $(this).val();
        console.log(searchBar);
        $.ajax({
        type: "POST",
        url: '/posts/search',
        data: {
            _token: '{{ csrf_token() }}', // Include CSRF token
                        search: searchBar
        },
        success: function (response) {
            console.log("A mers");
            // console.log(response);
            // console.log(typeof response);
            
            response['postari'].forEach(function (dep) {
                if (dep.user.profile_photo == "") {
                    dep.user.profile_photo = './img/undraw_profile_2.svg';
                }
                $nume_from = "  -   " + dep.user.lastName;
                var htmlString = "";
                // if (dep.user.lastName == "") {
                    $nume_from = "";
                    htmlString =
                    "<div class='row justify-content-center append_child'>" +
                    "<div class='col-md-8'>" +
                    "<div class='card mb-4'>" +
                    "<div class='card-header d-flex align-items-center justify-content-between'>" +
                    "<div class='d-flex align-items-center'>" +
                    "<img src='" + dep.user.profile_photo + "' alt='User Profile Picture' class='rounded-circle me-3' style='width: 50px; height: 50px;'>" +
                    "<div>" +
                    "<h5 class='mb-0'>" + dep.user.firstName + " " + dep.user.lastName + $nume_from + "</h5>" +
                    "<small class='text-muted'>" + dep.user.created_at + "</small>" +
                    "</div>" +
                    "</div>" +
                    "</div>" +
                    "<div class='card-body postare' data-user_id='" + dep.posts_id + "'>"+
                    "<p>" + dep.description + "</p>" +
                    "<!-- Optional image -->" +
                    "<img src='" + dep.photo + "' alt='Post Image' class='img-fluid rounded'>" +
                    "</div>" +
                    "<div class='card-footer d-flex justify-content-around'>" +
                    "<button class='btn btn-outline-primary btn-sm'>Like</button>" +
                    "<button class='btn btn-outline-primary btn-sm commentButton' data-user_id='" + dep.posts_id + "'>Comment</button>" +
                    "<button class='btn btn-outline-primary btn-sm shareButton' data-user_id='" + dep.posts_id + "'>Share</button>" +
                    "</div>" +
                    "<div class='card-body pt-0'>" +
                    "<div class='d-flex align-items-center my-2'>" +
                    "</div>" +
                    "</div> " +
                    "</div>" +
                    "</div>" +
                    "</div>";
                // }
                // else {
                //     htmlString =
                //     "<div class='row justify-content-center append_child'>" +
                //     "<div class='col-md-8'>" +
                //     "<div class='card mb-4'>" +
                //     "<div class='card-header d-flex align-items-center justify-content-between'>" +
                //     "<div class='d-flex align-items-center'>" +
                //     "<img src='" + dep.user.profile_photo + "' alt='User Profile Picture' class='rounded-circle me-3' style='width: 50px; height: 50px;'>" +
                //     "<div>" +
                //     "<h5 class='mb-0'>" + dep.user.firstName + " " + dep.user.lastName +"</h5>" +
                //     "<small class='text-muted'>" + dep.created_at + "</small>" +
                //     "</div>" +
                //     "</div>" +
                //     "</div>" +
                //     "<div class='card-body postare' data-user_id='" + dep.user.posts_id + "'>"+
                //     "<div class='row justify-content-center'>" +
                //     "<div class='col-md-8'>" +
                //     "<div class='card mb-4'>" +
                //     "<div class='card-header d-flex align-items-center justify-content-between'>" +
                //     "<div class='d-flex align-items-center'>" +
                //     "<img src='" + dep.user.profile_photo + "' alt='User Profile Picture' class='rounded-circle me-3' style='width: 50px; height: 50px;'>" +
                //     "<div>" +
                //     "<h5 class='mb-0'>"  + dep.user.lastName+""+dep.user.lastName + "</h5>" +
                //     "<small class='text-muted'>" + dep.dateTime + "</small>" +
                //     "</div>" +
                //     "</div>" +
                //     "</div>" +
                //     "<div class='card-body postare' data-user_id='" + dep.posts_id + "'>"+
                //     "<p>" + dep.description + "</p>" +
                //     "<!-- Optional image -->" +
                //     "<img src='" + dep.photo + "' alt='Post Image' class='img-fluid rounded'>" +
                //     "</div>" +
                //     "<div class='card-footer d-flex justify-content-around'>" +
                //     "<button class='btn btn-outline-primary btn-sm'>Like</button>" +
                //     "<button class='btn btn-outline-primary btn-sm commentButton' data-user_id='" + dep.id_post + "'>Comment</button>" +
                //     "<button class='btn btn-outline-primary btn-sm shareButton' data-user_id='" + dep.id_post + "'>Share</button>" +
                //     "</div>" +
                //     "<div class='card-body pt-0'>" +
                //     "<div class='d-flex align-items-center my-2'>" +
                //     "</div>" +
                //     "</div> " +
                //     "</div>" +
                //     "</div>" +
                //     "</div>"+
                //     "</div>" +
                //     "<div class='card-footer d-flex justify-content-around'>" +
                //     "<button class='btn btn-outline-primary btn-sm'>Like</button>" +
                //     "<button class='btn btn-outline-primary btn-sm commentButton' data-user_id='" + dep.posts_id + "'>Comment</button>" +
                //     "<button class='btn btn-outline-primary btn-sm shareButton' data-user_id='" + dep.posts_id + "'>Share</button>" +
                //     "</div>" +
                //     "<div class='card-body pt-0'>" +
                //     "<div class='d-flex align-items-center my-2'>" +
                //     "</div>" +
                //     "</div> " +
                //     "</div>" +
                //     "</div>" +
                //     "</div>";
                // }
                
                 
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
        $(document).on('click', '.commentButton', function (evt) {
            evt.preventDefault();
        var post_id = $(this).attr('data-user_id');
        console.log(post_id);
        window.location.href = "./chat/"+post_id;
    });
    $(document).on('click','.dowlandButton',function(evt){
        evt.preventDefault();
        var post_id=$(this).attr('data-user_id');
        $.ajax({
        type: "GET",
        url: '/view_edit_post/'+post_id,
        data: {
            _token: '{{ csrf_token() }}', // Include CSRF token
                       
        },
        success: function (response) {
            console.log("A mers");
            var url_photo=response['post'].photo;
            const link =document.createElement('a');
            link.href=url_photo;
            link.download="img/profile/"+url_photo;
            document
                    .body
                    .appendChild(link);
                link
                    .click();
                document
                    .body
                    .removeChild(link);
        }
        });
    });
 $(document).on('click', '.postare', function (evt) {
        var form = $(this).closest('form.forumComment');
        
        var post_id = $(this).attr('data-user_id');
        console.log(post_id);
         window.location.href = "./chat/"+post_id;
    });
});


</script>