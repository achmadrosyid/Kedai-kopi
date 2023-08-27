<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class PesananPelangganController extends Controller
{
    public function index(Request $request)
    {
        $data = Product::query()
            ->select('id', 'nama')
            ->orderBy('id')
            ->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('nama', function ($row) {
                    return $row->achmad;
                })
                ->addColumn('meja', function ($row) {
                    return $row->satu;
                })
                ->addColumn('action', function ($row) {
                    return
                        ' <a href="javascript:void(0)"  class="btn btn-success btn-sm"  id="detail" data-id="' . $row->id . '" data-toggle="tooltip" data-placement="top" title="Edit this record"><i class="fa fa-edit"></i> detail</a>
                        <a href="javascript:void(0)" class="btn btn-danger btn-sm" id="delete" data-id="' . $row->id . '" ><i class="fa fa-trash"></i> Hapus</a> ';
                })
                ->rawColumns(['id','nama','meja', 'action'])
                ->make(true);
        }
        return view('pesanan-pelanggan.index');
    }
}
