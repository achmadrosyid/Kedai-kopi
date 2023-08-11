<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesananPelanggan;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class PesananPelangganController extends Controller
{
    public function index(Request $request) {
        $data = PesananPelanggan::query()
        ->select('id_product','nama','meja')
        ->get();
        if ($request->ajax()){
            return DataTables::of($data)
               
                ->addColumn('action',function ($row){
                    return
                        '<a href="javascript:void(0)" class="btn btn-primary btn-sm" id="my-btn-pay" data-id="'.$row->id.'" ><i class="fa fa-money-bill-wave-alt"></i> Bayar</a> ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pesanan-pelanggan.index');
    }
}
