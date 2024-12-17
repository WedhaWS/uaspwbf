<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        return view('userpage.shop'); // Adjust the view path as needed
    }

    public function shopDetail()
    {
        return view('userpage.shop-detail');
    }
}
