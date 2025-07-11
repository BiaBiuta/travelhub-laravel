<?php

namespace App\Http\Controllers;

use App\Models\Share;
use App\Http\Requests\StoreShareRequest;
use App\Http\Requests\UpdateShareRequest;
use App\Models\Posts;
use Illuminate\Support\Facades\Auth;


class ShareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $shares = Share::where('id_user_to', '!=', $user->id)->orderBy('created_at', 'desc')->with('user')->with('posts')->get();
        //dd($shares);
        return response()->json(['shares' => $shares]);
    }
    public function index_profile()
    {
        $user = Auth::user();
        $shares = Share::where('id_user_to', $user->id)->orderBy('created_at', 'desc')->with('user')->with('posts')->get();
        //dd($shares);
        return response()->json(['shares' => $shares]);
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
    public function store()
    {
        $user_id = (request()->all())['user_id'];
        $user_to_id = (request()->all())['user_to_id'];
        $posts_id = (request()->all())['id_post'];
        $attributes['user_id'] = $user_id;
        $attributes['posts_id'] = $posts_id;
        $attributes['id_user_to'] = $user_to_id;
        Share::create($attributes);
        return response()->json(['status' => 'succes']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Share $share)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Share $share)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShareRequest $request, Share $share)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Share $share)
    {
        //
    }
}
