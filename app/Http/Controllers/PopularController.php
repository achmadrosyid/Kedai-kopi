<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PopularController extends Controller
{
    public function index() {
        return view('popular.index');
    }
}
