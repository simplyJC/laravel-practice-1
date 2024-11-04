<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller 
{
    //
    

    public function index() {
        $posts = Auth::user()->posts()->latest()->paginate(5);
       
        return view('users.dashboard', ['posts' => $posts]);
    }
}
