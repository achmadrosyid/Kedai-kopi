<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cashier;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class CashierController extends Controller
{
    public function index(Request $request) {
        $data = cashier::query()
        ->select('id','nama','password','nomer')
        ->orderBy('id')
        ->get();
        if ($request->ajax()){
            return DataTables::of($data)
                ->addColumn('nama',function ($row){
                    return $row->nama;
                })
                ->addColumn('password',function ($row){
                    return $row->password;
                })
                ->addColumn('nomer',function ($row){
                    return $row->nomer;
                })
                ->addColumn('action',function ($row){
                    return
                        ' <a href="javascript:void(0)"  class="btn btn-success btn-sm"  id="my-btn-edit" data-id="'.$row->id.'" data-toggle="tooltip" data-placement="top" title="Edit this record"><i class="fa fa-edit"></i> Edit</a>
                    <a href="javascript:void(0)" class="btn btn-danger btn-sm" id="my-btn-delele" data-id="'.$row->id.'" ><i class="fa fa-trash"></i> Delete</a> ';
                })
                ->rawColumns(['nama','password','nomer','action'])
                ->make(true);
        }
        return view('cashier.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required', 'nomer' => 'numeric', 'password' => 'numeric'

        ],['nama.required'=>'Mohon Inputkan Username'],['nomer.numeric'=>'Mohon Inputkan Nomer HP'],['password.numeric'=>'Masukkan Kombinasi Angka Pada Password']);
        

        if ($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        //simpan data ke db
        $data = Cashier::query()
            ->create([
                'nama' => $request->nama,
                'password' => $request->password,
                'nomer' => $request->nomer

            ]);
        if ($data) {
            return response()->json(['success' => 1]);
        } else {
            return response()->json(['success' => 0]);
        }
    }
}
