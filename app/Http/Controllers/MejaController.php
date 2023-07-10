<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meja;
use Illuminate\Support\Facades\Validator;
use Psy\Readline\Hoa\Console;
use Yajra\DataTables\DataTables;

class MejaController extends Controller
{
    public function index(Request $request)
    {
        $data = Meja::query()
            ->select('id', 'meja')
            ->orderBy('id')
            ->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('meja', function ($row) {
                    return $row->meja;
                })
                ->addColumn('action', function ($row) {
                    return
                        ' <a href="javascript:void(0)"  class="btn btn-success btn-sm"  id="my-btn-edit" data-id="' . $row->id . '" data-toggle="tooltip" data-placement="top" title="Edit this record"><i class="fa fa-edit"></i> Ubah</a>
                    <a href="javascript:void(0)" class="btn btn-danger btn-sm" id="my-btn-delete" data-id="' . $row->id . '" ><i class="fa fa-trash"></i> Hapus</a> ';
                })
                ->rawColumns(['meja', 'action'])
                ->make(true);
        }
        return view('meja.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'meja' => ['numeric']
        ], ['meja.numeric' => 'Mohon Masukkan Nomer Meja']);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        //simpan data ke db
        $data = Meja::query()
            ->create([
                'meja' => $request->meja
            ]);
        if ($data) {
            return response()->json(['success' => 1]);
        } else {
            return response()->json(['success' => 0]);
        }
    }

    public function edit($id){
      $data = Meja::query()
        ->select ('id','meja')->where('id',$id)->first();
        return response()->json(['data' => $data]);
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'meja' => ['required']
        ], ['meja.required' => 'Mohon Inputkan Id Meja']);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        //simpan data ke db
        $data = Meja::query()
        ->where('id',$request->id)
        ->update([
            'meja' => $request->meja
        ]);
        if ($data) {
            return response()->json(['success' => 1]);
        } else {
            return response()->json(['success' => 0]);
        } 
    }

    // modal delete
    public function delete($id){
        Meja::where("id", $id)->delete();
        $response['succes']= true;
        $response['message']= "Data berhasil dihapus";
        return response()->json(['data' => $response]);
    }
}
