<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $data = Category::query()
            ->select('id', 'nama')
            ->orderBy('id')
            ->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('nama', function ($row) {
                    return $row->nama;
                })
                ->addColumn('action', function ($row) {
                    return
                        ' <a href="javascript:void(0)"  class="btn btn-success btn-sm"  id="my-btn-edit" data-id="' . $row->id . '" data-toggle="tooltip" data-placement="top" title="Edit this record"><i class="fa fa-edit"></i> Edit</a>
                    <a href="javascript:void(0)" class="btn btn-danger btn-sm" id="my-btn-delele" data-id="' . $row->id . '" ><i class="fa fa-trash"></i> Delete</a> ';
                })
                ->rawColumns(['nama', 'action'])
                ->make(true);
        }
        return view('category.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => ['required']
        ], ['category.required' => 'Mohon Inputkan Category']);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        //simpan data ke db
        $data = Category::query()
            ->create([
                'nama' => $request->category
            ]);
        if ($data) {
            return response()->json(['success' => 1]);
        } else {
            return response()->json(['success' => 0]);
        }
    }

    public function edit($id){
      $data = Category::query()
        ->select ('id','nama')->where('id',$id)->first();
        
        return response()->json(['data' => $data]);
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'category' => ['required']
        ], ['category.required' => 'Mohon Inputkan Category']);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        //simpan data ke db
        $data = Category::query()
        ->update([
            'nama' => $request->category
        ]);
        if ($data) {
            return response()->json(['success' => 1]);
        } else {
            return response()->json(['success' => 0]);
        } 
    }
}
