<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        $category = Category::query()
        ->select('id','nama')
        ->get();
        return view('category.index');
    }

    public function store(Request $request)
    {
        # code...
    }
}
