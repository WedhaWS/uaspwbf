<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Menu; // Ensure the Menu model is imported at the top of the file

class UserPageController extends Controller
{
    public function index(){
        return view('user.dashboard');
    }
    public function menu()
    {
        $menus = Menu::all(); // Ensure the Menu model is imported at the top of the file
        return view('user.menu',compact('menus')); // Adjust the view path as necessary
    }

    public function product()
    {
        $products = Category::all(); // Ensure the Product model is imported at the top of the file
        return view('user.product',compact('products')); // Ensure this view exists
    }

    public function testimoni()
    {
        return view('userpage.testimoni'); // Ensure this view exists
    }
}
