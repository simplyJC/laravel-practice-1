<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use  App\Events\UserSubscribed;
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

        //Trigger must-verify-email event
        event( new Registered($user));
        
        if($request->subscribe){
            event(new UserSubscribed($user));
        }

        //return redirect()->intended('dashboard');

        return redirect()->route('dashboard');
       // dd('ok' );
    }
    //Verify Email Notice handler
    public function verifyNotice() {
        return view('auth.verify-email');
    }
    //Verify Email
     public function verifyEmail(EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect()->route('dashboard');
        
    }
    //Resend Verification Email
    public function resendVerificationEmail(Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    }
    //Login
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

