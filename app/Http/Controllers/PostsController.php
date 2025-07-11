<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Http\Requests\StorePostsRequest;
use App\Http\Requests\UpdatePostsRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Builder;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_json_all()
    {
        $user = Auth::user();
        $posts = Posts::where('user_id', '!=', $user->id)->orderBy('created_at', 'desc')->with('user')->get();

        return response()->json(['posts' => $posts]);
    }
    public function index()
    {
        $user = Auth::user();
        $posts = Posts::where('user_id', '!=', $user->id)->orderBy('created_at', 'desc')->get();
        return view('pages.forum', [
            'posts' => $posts
        ]);
    }
    public function index_json_all_profile()
    {
        $user = Auth::user();
        $posts = Posts::where('user_id', $user->id)->orderBy('created_at', 'desc')->with('user')->get();

        return response()->json(['posts' => $posts]);
    }
    public function index_profile()
    {
        $user = Auth::user();
        $posts = Posts::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        return view('pages.profile', [
            'posts' => $posts
        ]);
    }
    public function index_json()
    {

        $user = Auth::user();
        $posts = Posts::where('user_id', '!=', $user->id)->orderBy('created_at', 'desc')->limit(10)->with('user')->get();
        // dd($comments);
        return response()->json(['posts' => $posts]);
    }
    public function index_json_search()
    {


        $user = Auth::user();
        $search = (request()->all())['search'];
        $posts = Posts::where('user_id', '!=', $user->id)->orderBy('created_at', 'desc')->with('user')->get();
        if ($search != "") {
            $posts = Posts::where('user_id', '!=', $user->id)->where('description', 'like', $search . '%')->orderBy('created_at', 'desc')->with('user')->get();
        }
        return response()->json(['postari' => $posts]);
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

        $user = Auth::user();

        // Validează datele
        $attributes = request()->validate(
            [
                'photo' => ['required', 'image'], // Poți adăuga reguli de validare pentru fișiere
                'description' => ['required'],

            ]
        );

        // Preia fișierul
        $photo = request()->file('photo');
        $fileName = $photo->getClientOriginalName();

        if (!File::exists(public_path('img/' . $fileName))) {
            dd("am ntrat ");
            $photo->move(public_path('img'), $fileName);
            // return back()->withErrors(['photo' => 'Fișierul există deja. Încarcă altul.']);
        }

        // Salvează fișierul într-un director (ex: storage/app/public/photos)


        // Stochează datele în baza de date
        $attributes['photo'] = 'img/' . $fileName; // Adaugă calea către fișier în atribute
        $attributes['user_id'] = $user->id;
        $attributes['comments'] = '';

        // Creează postarea
        $post = Posts::create($attributes);

        // Redirecționează utilizatorul
        return redirect('/profile');
    }

    /**
     * Display the specified resource.
     */
    public function show(Posts $posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        // dd("sunt in update");
        $user_id = Auth::user()->id;
        $post = Posts::findOrFail($id);
        $attributes = request()->validate(
            [
                'photo' => ['required', 'image'], // Poți adăuga reguli de validare pentru fișiere
                'description' => ['required'],

            ]
        );

        // Preia fișierul
        $photo = request()->file('photo');
        $fileName = $photo->getClientOriginalName();

        if (!File::exists(public_path('img/' . $fileName))) {
            dd("am ntrat ");
            $photo->move(public_path('img'), $fileName);
            // return back()->withErrors(['photo' => 'Fișierul există deja. Încarcă altul.']);
        }

        // Salvează fișierul într-un director (ex: storage/app/public/photos)


        // Stochează datele în baza de date
        $attributes['photo'] = 'img/' . $fileName; // Adaugă calea către fișier în atribute
        $attributes['user_id'] = $user_id;
        $attributes['comments'] = '';



        // Actualizare date
        $post->update($attributes);

        return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Posts::find($id);
        $post->delete();
        return redirect('/profile');
    }
    public function find($id)
    {

        $post = Posts::find($id);
        // dd($post);
        return response()->json(["post" => $post]);
    }
}
