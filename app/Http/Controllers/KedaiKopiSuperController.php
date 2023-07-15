<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class KedaiKopiSuperController extends Controller
{
    public function index(Request $request) {
        $data = Product::query()
            ->select('id','nama','img', 'harga')
            ->where('status',1)
            ->get();

        $category = Category::query()
            ->select('id', 'nama')
            ->get();
        return view('kedai-kopi-super.index',compact('data','category'));
    }
    
}
