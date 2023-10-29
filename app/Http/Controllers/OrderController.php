<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetil;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $data = Product::query()
            ->select('id', 'nama', 'img', 'harga', 'diskon')
            ->where('status', 1)
            ->get();
        foreach ($data as $product) {
            $product->harga = number_format($product->harga, 0, '.', ',');
            $product->diskon = number_format($product->diskon, 0, '.', ',');
        }
        $category = Category::query()
            ->select('id', 'nama')
            ->get();
        return view('order.index', compact('data', 'category'));
    }

    public function getProduct($category)
    {
        $data = Product::query()
            ->select('id', 'nama', 'img', 'harga', 'diskon')
            ->where('status', 1)
            ->where('id_category', $category)
            ->get();
        foreach ($data as $product) {
            $product->harga = number_format($product->harga, 0, '.', ',');
            $product->diskon = number_format($product->diskon, 0, '.', ',');
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
                'p.diskon',
                DB::raw('COUNT(cart.produk) as total_qty'),
            )
            ->groupBy('p.id', 'p.nama', 'p.harga')
            ->get();

        $totalKeseluruhanHarga = 0;
        $diskon = 0;

        foreach ($data as $cart) {
            $cart->total_harga = number_format($cart->total_qty * ($cart->harga - $cart->diskon), 0, '.', ',');
            $totalKeseluruhanHarga += $cart->total_qty * ($cart->harga - $cart->diskon);
            $diskon += $cart->total_qty * $cart->diskon;
        }

        $totalKeseluruhanHargaFormatted = number_format($totalKeseluruhanHarga, 0, '.', ',');
        $diskonFormatted = number_format($diskon, 0, '.', ',');


        return response()->json([
            'cart' => $data,
            'total' => $totalKeseluruhanHargaFormatted,
            'diskon' => $diskonFormatted
        ]);
    }

    public function removeItemFromCart(Request $request)
    {

        $item = Cart::query()
            ->where('meja', $request->idMeja)
            ->where('produk', $request->idProduct)
            ->select('id')
            ->first();
        $data = Cart::query()
            ->where('id', $item->id)
            ->delete();
        if ($data) {
            return response()->json(['success' => 1]);
        }
        return response()->json(['success' => 0]);
    }
    public function purchase(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required']
        ], ['name.required' => 'Mohon Inputkan Nama Anda']);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $dateNow = Carbon::now();
        $dateNow = $dateNow->toDateString();
        $dateFinal = str_replace('-', '', $dateNow);
        $countOrderToday = Order::query()
            ->where('tanggal', $dateFinal)
            ->count();
        $numberOrder = 'ORD' . $dateFinal . str_pad($countOrderToday+1, 4, '0', STR_PAD_LEFT);
        $total = intval(str_replace(",", "", $request->total));
        $diskon = intval(str_replace(",", "", $request->diskon));
        $jumlah = 0;
        $jumlah = $total+$diskon;
        $order = Order::create([
            'no_order' => $numberOrder,
            'tanggal' => $dateNow,
            'id_meja' => $request->idMeja,
            'nama_pelanggan' => $request->name,
            'jumlah_harga' => $jumlah,
            'diskon' => $diskon,
            'total' => $total,
            'status_dibayar' => 0,
            'status_pesanan' => 0,
            'id_cashier' => 1
        ]);
        $product = json_decode($request->product);

        for ($i = 0; $i < count($product); $i++) {
            OrderDetil::create([
                'id_order' => $order->id,
                'id_product' => $product[$i]->id,
                'jumlah' => $product[$i]->total_qty
            ]);
        }
        if ($order) {
            Cart::query()
                ->where('meja', $request->idMeja)
                ->delete();
            return response()->json(['success' => 1]);
        }
        return response()->json(['success' => 0]);
    }
}
