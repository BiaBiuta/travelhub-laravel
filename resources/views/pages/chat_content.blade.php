<x-layout-chat>
    <div class="card">
        <div class="card-header">Chat</div>
        <div class="card-body height3">
            <ul class="card-list" id="commentList">
                @foreach ($comments as $comment)
                    @if ($comment->user->id == Auth::user()->id)
                        <li class="out">
                            <div class="chat-img"></div>
                            <div class="chat-body">
                                <div class="chat-message">
                                    <h5>{{ $comment->user->lastName }} {{ $comment->user->firstName }}</h5>
                                    <small>{{ $comment->dateTime }}</small>
                                    <p>{{ $comment->description }}</p>
                                </div>
                            </div>
                        </li>
                    @else
                        <li class="in">
                            <div class="chat-img"></div>
                            <div class="chat-body">
                                <div class="chat-message">
                                    <h5>{{ $comment->user->lastName }} {{ $comment->user->firstName }}</h5>
                                    <small>{{ $comment->dateTime }}</small>
                                    <p>{{ $comment->description }}</p>
                                </div>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
                        <form class="d-flex forumComment" method="POST" action='{{ url('chat/' . $posts_id) }}'>
                @csrf
                <input type="text" class="form-control me-2 textComment" name="comment" placeholder="Add a comment...">
                <button type="submit" class="btn btn-primary btn-sm buttonSubmitComment">Post</button>
            </form>
        </div>
        
    </div>
</x-layout-chat>
