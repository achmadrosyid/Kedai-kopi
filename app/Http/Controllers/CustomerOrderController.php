<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class CustomerOrderController extends Controller
{
    public function index(Request $request)
    {
        $data = Order::query()
            ->leftJoin('order_detil as od', 'od.id_order', 'order.id')
            ->leftJoin('product as p', 'p.id', 'od.id_product')
            ->select(
                'nama_pelanggan',
                'id_meja as meja',

            )
            ->groupBy('order.id')
            ->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('nama', function ($row) {
                    return $row->nama_pelanggan;
                })
                ->addColumn('meja', function ($row) {
                    return $row->meja;
                })
                ->addColumn('action', function ($row) {
                    return
                        ' <a href="javascript:void(0)"  class="btn btn-success btn-sm"  id="detail" data-id="' . $row->id . '" data-toggle="tooltip" data-placement="top" title="Edit this record"><i class="fa fa-edit"></i> detail</a>
                        <a href="javascript:void(0)" class="btn btn-danger btn-sm" id="delete" data-id="' . $row->id . '" ><i class="fa fa-trash"></i> Hapus</a> ';
                })
                ->rawColumns(['id', 'nama', 'meja', 'action'])
                ->make(true);
        }
        return view('pesanan-pelanggan.index');
    }
}
