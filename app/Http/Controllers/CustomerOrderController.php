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
                        '<a href="javascript:void(0)" class="btn btn-primary btn-sm" id="my-btn-pay" data-id="'.$row->id.'" ><i class="fa fa-money-bill-wave-alt"></i> Bayar</a> ';
                })
                ->rawColumns(['id','detail_product','nama','meja','jumlah','action'])
                ->make(true);
        }
        return view('customer-order.index');
    }
    public function edit($id){
        $data = CustomerOrder::query()
          ->select ('id','nama','meja','detail_product','jumlah')->where('id',$id)->first();
          return response()->json(['data' => $data]);
      }

    public function update(Request $request){
        $validator = Validator::make($request->all(),[
            'nama' => 'required', 'jumlah' => 'numeric'

        ],['nama.required'=>'Mohon Inputkan Username'],['jumlah.numeric'=>'Mohon Inputkan Nomer HP']);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        //simpan data ke db
        $data = CustomerOrder::query()
        ->where('id',$request->id)
        ->update([
            'nama' => $request->nama,
            'meja' => $request->meja,
            'detail_product' => $request->detail_product,
            'jumlah' => $request->jumlah
        ]);
        if ($data) {
            return response()->json(['success' => 1]);
        } else {
            return response()->json(['success' => 0]);
        } 
    }

    public function delete($id){
        CustomerOrder::where("id", $id)->delete();
        $response['succes']= true;
        $response['message']= "Data berhasil dihapus";
        return response()->json(['data' => $response]);
    }
};