<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerOrder;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class CustomerOrderController extends Controller
{
    public function index(Request $request) {
        $data = CustomerOrder::query()
        ->select('id','detail_product','nama','meja','jumlah')
        ->orderBy('id')
        ->get();
        if ($request->ajax()){
            return DataTables::of($data)
                ->addColumn('id',function ($row){
                    return $row->id;
                })
                ->addColumn('nama',function ($row){
                    return $row->nama;
                })
                ->addColumn('meja',function ($row){
                    return $row->meja;
                })
                ->addColumn('detail_product',function ($row){
                    return $row->detail_product;
                })
                ->addColumn('jumlah',function ($row){
                    return $row->jumlah;
                })
                ->addColumn('action',function ($row){
                    return
                        ' <a href="javascript:void(0)"  class="btn btn-success btn-sm"  id="my-btn-edit" data-id="' . $row->id . '" data-toggle="tooltip" data-placement="top" title="Edit this record"><i class="fa fa-edit"></i> Ubah</a>
                        <a href="javascript:void(0)" class="btn btn-primary btn-sm" id="my-btn-pay" data-id="'.$row->id.'" ><i class="fa fa-trash"></i> Pembayaran</a> ';
                })
                ->rawColumns(['id','detail_product','nama','meja','jumlah','action'])
                ->make(true);
        }
        return view('customer-order.index');
}
};