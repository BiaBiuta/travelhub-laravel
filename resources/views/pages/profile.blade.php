@php
    use App\Models\User;
    use App\Models\Posts;
@endphp
<x-layout><div class="header-content">
</div>
<main class="container" id="profileMain">
    <div class="card-header d-flex md-8 mb-4  justify-content-center">
        <a class="btn btn-outline-primary btn-sm " href="/upload_post" id=" openModalBtn" style="font-size: 24px; padding: 15px 30px;"><i class="fa-solid fa-plus"></i></a>
    </div>
    <div class="card-header d-flex md-8 mb-4 justify-content-center">
        <form
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                    aria-label="Search" aria-describedby="basic-addon2" id="dataFilterInput">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
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
                                <small class='text-muted'> {{date('Y-m-d H:i:s', strtotime(Posts::find($post['posts_id'])['created_at']))}} </small>
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
                                        <small class="text-muted">{{date('Y-m-d H:i:s', strtotime( $post['created_at']))  }}</small>
                                    </div>
                                </div>
                                 
                                <i class="fa-solid fa-pen-to-square " data-user_id="{{ $post['id'] }}" action="/edit_post/{{ $post['id'] }}" onclick="window.location.href='/edit_post/{{ $post['id'] }}'" ></i>
                                <!-- Formularul Ascuns pentru Ștergere -->
<form id="deleteForm{{ $post['id'] }}" action="{{ route('posts.destroy', $post['id']) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<!-- Iconiță pentru Ștergere -->
<i class="fa-solid fa-trash" 
   data-user_id="{{ $post['id'] }}" 
   onclick="event.preventDefault(); document.getElementById('deleteForm{{ $post['id'] }}').submit();">
</i>
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

</main></x-layout>