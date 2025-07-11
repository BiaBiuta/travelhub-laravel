<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Posts;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $comments = Comment::where('posts_id', $id)->get();
        return view('pages.chat_content', ['comments' => $comments, 'posts_id' => $id]);
    }
    public function index_json()
    {

        $id_user = Auth::user()->id;
        // $posts=Posts::where('user_id',$id_user)->get();
        // $comments = Comment::where('posts_id',)->get();
        $comments =
            Comment::whereHas('posts', function ($query) use ($id_user) {
                $query->where('user_id', $id_user);
            })->with('user')->get();
        // dd($comments);
        session(['comments' => $comments]);
        return response()->json(['status' => 'succes']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id)
    {
        $attributes = request()->validate(['comment']);
        $attributes['description'] = request('comment');
        $attributes['posts_id'] = $id;
        $attributes['user_id'] = Auth::user()->id;
        $comment = Comment::create($attributes);
        return redirect("/chat/" . $id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
