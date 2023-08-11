<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanPenjualanController extends Controller
{
    public function index() {
        return view('laporan-penjualan.index');
    }
}
