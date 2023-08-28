<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
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

    public function insertCart(Request $request)
    {
        $data = Cart::query()
            ->create([
                'meja' => $request->idMeja,
                'produk' => $request->idProduct
            ]);
        if ($data) {
            return response()->json(['success' => 1]);
        }
        return response()->json(['success' => 0]);
    }
    public function getDataCart(Request $request)
    {
        $data = Cart::query()
            ->leftJoin('product as p', 'p.id', '=', 'cart.produk')
            ->where('meja', $request->idMeja)
            ->select(
                'p.id',
                'p.nama',
                'p.harga',
                DB::raw('COUNT(cart.produk) as total_qty')
            )
            ->groupBy('p.id', 'p.nama', 'p.harga')
            ->get();

        $totalKeseluruhanHarga = 0;

        foreach ($data as $cart) {
            $cart->total_harga = number_format($cart->total_qty * $cart->harga, 0, '.', ',');
            $totalKeseluruhanHarga += $cart->total_qty * $cart->harga;
        }

        $totalKeseluruhanHargaFormatted = number_format($totalKeseluruhanHarga, 0, '.', ',');


        return response()->json(['cart' => $data,'total'=>$totalKeseluruhanHargaFormatted]);
    }
}
