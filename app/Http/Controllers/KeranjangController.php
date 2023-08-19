<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class KeranjangController extends Controller
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
                ->addColumn('jumlah', function ($row) {
                    return $row->satu;
                })
                ->addColumn('action', function ($row) {
                    return
                        ' <a href="javascript:void(0)"  class="btn btn-primary btn-sm"  id="bayar" data-id="' . $row->id . '" data-toggle="tooltip" data-placement="top" title="Edit this record"><i class="fa fa-edit"></i> Bayar</a>
                        <a href="javascript:void(0)" class="btn btn-danger btn-sm" id="delete" data-id="' . $row->id . '" ><i class="fa fa-trash"></i> Hapus</a> ';
                })
                ->rawColumns(['id','nama','jumlah', 'action'])
                ->make(true);
        }
        return view('keranjang.index');
    }
}
