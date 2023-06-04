<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function index(Request $request) {
        $data = product::query()
        ->select('id','id_category','img','nama', 'description','status','harga')
        ->get();
        // var_dump($data);
        if ($request->ajax()){
            return DataTables::of($data)
                ->addColumn('id_category',function ($row){
                    return $row->id_category;
                })
                ->addColumn('img',function ($row){
                    return $row->img;
                })
                ->addColumn('nama',function ($row){
                    return $row->nama;
                })
                ->addColumn('description',function ($row){
                    return $row->description;
                })
                ->addColumn('status',function ($row){
                    return $row->status;
                })
                ->addColumn('harga',function ($row){
                    return $row->harga;
                })
                ->addColumn('action',function ($row){
                    return
                        ' <a href="javascript:void(0)"  class="btn btn-success btn-sm"  id="my-btn-edit" data-id="'.$row->id.'" data-toggle="tooltip" data-placement="top" title="Edit this record"><i class="fa fa-edit"></i> Edit</a>
                    <a href="javascript:void(0)" class="btn btn-danger btn-sm" id="my-btn-delele" data-id="'.$row->id.'" ><i class="fa fa-trash"></i> Delete</a> ';
                })
                ->rawColumns(['nama','category','nomer','action'])
                ->make(true);
        }
        return view('product.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required', 'harga' => 'numeric'
        ],['nama.required'=>'Mohon Inputkan Nama Product',['harga.numeric'=>'Mohon Inputkan Nomer Harga']]);
        

        if ($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        //simpan data ke db
    }
}
