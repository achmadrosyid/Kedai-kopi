<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class LaporanPenjualanController extends Controller
{
    public function index(Request $request)
    {
        $data = Order::query()
            ->select(
                'tanggal',
                DB::raw('SUM(total) as total'),
                DB::raw('COUNT(*) as transaction')
            )
            ->where('status_dibayar',1)
            ->whereMonth('tanggal', Carbon::now()->month)
            ->groupBy('tanggal')
            ->get();
        foreach ($data as $transaction) {
            $transaction->total = "Rp." . number_format($transaction->total, 0, '.', ',');
            $transaction->tanggal = Carbon::parse($transaction->tanggal)->format('Y-m-d');
        }
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('tanggal', function ($row) {
                    return $row->tanggal;
                })
                ->addColumn('transaction', function ($row) {
                    return $row->transaction;
                })
                ->addColumn('total', function ($row) {
                    return $row->total;
                })
                ->rawColumns(['tanggal', 'transaction', 'total'])
                ->make(true);
        }
        return view('laporan-penjualan.index');
    }

    public function search(Request $request)
    {

        $clause = [
            'tglAwal' => $request->tglAwal,
            'tglAkhir' => $request->tglAkhir
        ];
        $data = $this->doSearch($clause);
        return DataTables::of($data)
            ->addColumn('tanggal', function ($row) {
                return $row->tanggal;
            })
            ->addColumn('transaction', function ($row) {
                return $row->transaction;
            })
            ->addColumn('total', function ($row) {
                return $row->total;
            })
            ->rawColumns(['tanggal', 'transaction', 'total'])
            ->make(true);
    }

    private function doSearch($clauses)
    {
        $data = Order::query()
            ->select(
                'tanggal',
                DB::raw('SUM(total) as total'),
                DB::raw('COUNT(*) as transaction')
            )
            ->where('status_dibayar',1)
            ->whereBetween('tanggal', [$clauses['tglAwal'], $clauses['tglAkhir']])
            ->groupBy('tanggal');

        $result = $data->get();
        foreach ($result as $transaction) {
            $transaction->total = "Rp." . number_format($transaction->total, 0, '.', ',');
            $transaction->tanggal = Carbon::parse($transaction->tanggal)->format('Y-m-d');
        }
        return $result;
    }
}
