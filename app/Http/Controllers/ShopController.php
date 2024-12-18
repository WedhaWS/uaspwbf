<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        $products = Products::with('category')->get(); // Mengambil produk dan kategori terkait
        return view('userpage.shop', compact('categories', 'products')); 
    }

    public function shopDetail()
    {
        return view('userpage.shop-detail');
    }
}
