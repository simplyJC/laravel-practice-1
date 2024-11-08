<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    //
    public function  register (Request $request) {
       $fields = $request -> validate([
            'username' => ['required','max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:users'],
            'password' => ['required','max:255', 'min:3','confirmed'],
        ]);

        //Add user to database
        $user = User::create($fields);
        //Login
        Auth::login($user);

        return redirect()->intended('dashboard');
       // dd('ok' );
    }

    public function login (Request $request) {
        $fields = $request -> validate([
            'email' => ['required','max:255', 'email'],
            'password' => ['required'],
        ]); 

        //dd($request);

       
        if(Auth::attempt($fields, $request->remember)) {
            return redirect()->intended('dashboard');
        } else {
            return back()->withErrors([
                'failed' => 'The provided credentials are incorrect'
            ]);
        }
           
        
    }
    //Logout user
    public function logout (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('posts.index');
    }
}

