<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // Halaman Tambah Kategori
    public function addCategory()
    {
        $categories = Categories::all();
        return view('dashboard.admin.add-category', compact('categories'));
    }

    // Proses Simpan Kategori
    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
            'description' => 'nullable'
        ]);

        Categories::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan');
    }

    // Halaman Tambah Produk
    public function addProduct()
    {
        $categories = Categories::all();
        $products = Products::with('category')->get();
        return view('dashboard.admin.add-product', compact('categories'));
    }

    // Proses Simpan Produk
    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,category_id',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Upload Gambar
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Products::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'image_url' => $imagePath
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan');
    }

    // Halaman Daftar Produk
    public function productList()
    {
        $products = Products::with('category')->get();
        return view('dashboard.admin.product-list', compact('products'));
    }
}