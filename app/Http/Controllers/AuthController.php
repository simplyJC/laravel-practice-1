<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function  register (Request $request) {
        dd( $request -> username );
    }
}
