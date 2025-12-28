<?php

namespace App\Http\Controllers;

use finfo;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Index()
    {
        return view('frontend.index' );
    }
}
