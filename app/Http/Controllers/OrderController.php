<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $data = Product::query()
            ->select('id', 'nama', 'img', 'harga')
            ->where('status', 1)
            ->get();
        foreach ($data as $product) {
            $product->harga = number_format($product->harga, 0, '.', ',');
        }
        $category = Category::query()
            ->select('id', 'nama')
            ->get();
        return view('order.index', compact('data', 'category'));
    }

    public function category($category)
    {

        $category = Category::query()
            ->select('id', 'nama')
            ->get();
        // Lakukan pengolahan sesuai kategori yang dipilih
        // Contoh: mengembalikan tampilan berdasarkan kategori
        return view('category', ['category' => $category]);
    }

    public function getProduct($category)
    {
        $data = Product::query()
            ->select('id', 'nama', 'img', 'harga')
            ->where('status', 1)
            ->where('id_category', $category)
            ->get();
        foreach ($data as $product) {
            $product->harga = number_format($product->harga, 0, '.', ',');
        }
        return response()->json(['product' => $data]);
    }
}
