<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;

class DashboardController extends Controller 
{
    //
    

    public function index() {
        $posts = Auth::user()->posts()->latest()->paginate(5);
       
        return view('users.dashboard', ['posts' => $posts]);
    }

    public function userPosts(User $user) {
       
       // dd($user->posts);
       $userPosts = $user->posts()->latest()->paginate(5);
        return  view('users.posts', ['posts' => $userPosts,'user' => $user ]); 
    }
}
