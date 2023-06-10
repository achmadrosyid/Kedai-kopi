<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryOrderController extends Controller
{
    public function index() {
        return view('category-order.index');
    }
}

