<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPageController extends Controller
{
    public function index()
    {
        return view('userpage.index'); // Adjust the view path as necessary
    }

    public function contact()
    {
        return view('userpage.contact'); // Ensure this view exists
    }
}
