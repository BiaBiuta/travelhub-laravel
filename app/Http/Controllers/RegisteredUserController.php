<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    //
    public function create()
    {
        return view('auth.register');
    }
    public function store()
    {

        //validate
        $attributes = request()->validate([
            'firstName' => ['required'],
            'lastName' => ['required'],
            'email' => ['required', 'email'],
            'address' => ['required'],
            'observation' => ['required'],
            'password' => ['required', Password::min(6), 'confirmed'], //password_confirmation-se uita singur daca is la fel  

        ]);
        //create the user 
        $user = User::create($attributes);

        // //log in 
        Auth::login($user);
        //redirect them
        return redirect('/posts');
    }
}
