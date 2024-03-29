<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $data = Product::query()
            ->select(
                'product.id',
                'id_category',
                'img',
                'product.nama',
                'description',
                'status',
                'harga',
                'c.nama as category'
            )
            ->selectRaw('coalesce(diskon,0) as diskon')
            ->leftJoin('category as c', 'c.id', 'product.id_category')
            ->orderBy('product.id')
            ->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('img', function ($row) {
                    return '<img src="/storage/' . e($row->img) . '" width="100"/>';
                })
                ->addColumn('category', function ($row) {
                    return $row->category;
                })
                ->addColumn('nama', function ($row) {
                    return $row->nama;
                })
                ->addColumn('description', function ($row) {
                    return $row->description;
                })
                ->addColumn('status', function ($row) {
                    return $row->status === 1 ? 'Tersedia' : 'Habis';
                })
                ->addColumn('harga', function ($row) {
                    return $row->harga;
                })
                ->addColumn('diskon', function ($row) {
                    return $row->diskon;
                })
                ->addColumn('action', function ($row) {
                    return '<div class="text-center">
                                <a href="javascript:void(0)" class="btn btn-success btn-sm" id="my-btn-edit" data-id="' . $row->id . '" data-toggle="tooltip" data-placement="top" title="Edit this record"><i class="fa fa-edit"></i></a>
                                <a href="javascript:void(0)" class="btn btn-danger btn-sm" id="my-btn-delete" data-id="' . $row->id . '"><i class="fa fa-trash"></i></a>
                            </div>';
                })
                ->rawColumns(['img', 'category', 'nama', 'description', 'status', 'harga', 'diskon', 'action'])
                ->make(true);
        }

        $category = Category::query()
            ->select('id', 'nama')
            ->get();
        return view('product.index', compact('category'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required', 'harga' => 'numeric'
        ], ['nama.required' => 'Mohon Masukkan Nama Produk', ['harga.numeric' => 'Mohon Masukkan Harga']]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        //simpan data ke db
        $data = Product::query()
            ->create([
                'img' => 123,
                'id_category' => $request->id_category,
                'nama' => $request->nama,
                'description' => $request->description,
                'status' => $request->status,
                'harga' => $request->harga,
                'diskon' => $request->diskon,
            ]);

        if ($data) {
            return response()->json(['success' => 1]);
        } else {
            return response()->json(['success' => 0]);
        }
    }

    public function uploadImage()
    {
        $product = Product::query()
            ->select('id', 'nama')
            ->get();
        return view('product.uploadImage', compact('product'));
    }

    public function storeImage(Request $request)
    {
        $data = $request->all();
        $data['photo'] = $request->file('photo')->store(
            'assets/product',
            'public'
        );
        $product = Product::query()
            ->where('id', $data['products_id'])
            ->update([
                'img' => $data['photo']
            ]);
        return redirect()->route('product.index');
    }

    public function edit($id)
    {
        $data = Product::query()
            ->where('id', $id)->first();
        return response()->json(['data' => $data]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required', 'harga' => 'numeric'
        ], ['nama.required' => 'Mohon Masukkan Nama Produk', ['harga.numeric' => 'Mohon Masukkan Harga']]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        //simpan data ke db
        $data = Product::query()
            ->where('id', $request->id)
            ->update([
                'id_category' => $request->id_category,
                'nama' => $request->nama,
                'description' => $request->description,
                'status' => $request->status,
                'harga' => $request->harga,
                'diskon' => $request->diskon,
            ]);
        if ($data) {
            return response()->json(['success' => 1]);
        } else {
            return response()->json(['success' => 0]);
        }
    }

    // modal delete
    public function delete($id)
    {
        Product::where("id", $id)->delete();
        $response['succes'] = true;
        $response['message'] = "Data berhasil dihapus";
        return response()->json(['data' => $response]);
    }
}
