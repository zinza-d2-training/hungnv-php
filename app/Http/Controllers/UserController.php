<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {

    }

    public function setting()
    {
        return view('user.setting');
    }
}