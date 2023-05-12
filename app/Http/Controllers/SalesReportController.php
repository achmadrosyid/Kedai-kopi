<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesReportController extends Controller
{
    public function index() {
        return view('sales-report.index');
    }
}
