<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $penjualan = Order::query()
            ->select(DB::raw('SUM(total) as total'))
            ->where('status_dibayar',1)
            ->whereDate('tanggal', today())
            ->first();
        $penjualan->total = number_format($penjualan->total, 0, '.', ',');
        return view('home.index', compact('penjualan'));
    }

    public function getSalesPerMont()
    {
        $transaction = Order::query()
            ->select(DB::raw('LEFT (tanggal ,7) as bulan,SUM(total) as jml'))
            ->groupBy(DB::raw('LEFT(`tanggal`, 7)'))
            ->where('status_dibayar',1)
            ->get();
        $data = [
            'data' => $transaction,
        ];
        return response()->json($data);
    }
}
