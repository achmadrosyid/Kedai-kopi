<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetil;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use PDF;

class CustomerOrderController extends Controller
{
    public function index(Request $request)
    {
        $dateNow = Carbon::now();
        $dateNow = $dateNow->toDateString();
        $data = Order::query()
            ->leftJoin('meja as m', 'm.id', 'order.id_meja')
            ->select(
                'nama_pelanggan',
                'm.meja as meja',
                'order.id',
                'status_pesanan',
                'status_dibayar',
                'no_order'
            )
            ->groupBy('order.id')
            ->orderBY('status_dibayar', 'DESC')
            ->orderBy('status_pesanan')
            ->where('tanggal', $dateNow)
            ->get();
        // dd($data);
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('nama', function ($row) {
                    return $row->nama_pelanggan;
                })
                ->addColumn('no_order', function ($row) {
                    return $row->no_order;
                })
                ->addColumn('meja', function ($row) {
                    return $row->meja;
                })
                ->addColumn('status_pesanan', function ($row) {
                    if ($row->status_pesanan == 0) {
                        return '<span class="badge badge-danger">' . "Belum Diantar" . '</span>';
                    } else {
                        return '<span class="badge badge-success">' . "Sudah Diantar" . '</span>';
                    }
                })
                ->addColumn('status_pembayaran', function ($row) {
                    if ($row->status_dibayar == 0) {
                        return '<span class="badge badge-warning">' . "Belum Dibayar" . '</span>';
                    } else {
                        return '<span class="badge badge-success">' . "Sudah Dibayar" . '</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    return
                        ' <a href="javascript:void(0)"  class="btn btn-success btn-sm"  id="detail" data-id="' . $row->id . '" data-toggle="tooltip" data-placement="top" title="Edit this record"><i class="fa fa-eye"></i> Detail Pesanan</a>
                        <a href="javascript:void(0)"  class="btn btn-primary btn-sm"  id="print" data-id="' . $row->id . '" data-toggle="tooltip" data-placement="top" title="Edit this record"><i class="fa fa-print"></i></a>
                        ';
                })
                ->rawColumns(['id', 'nama','no_order', 'meja', 'status_pesanan', 'status_pembayaran', 'action'])
                ->make(true);
        }
        return view('pesanan-pelanggan.index');
    }
    public function getDetilOrder($id)
    {
        $order = Order::query()
            ->leftJoin('order_detil as od', 'od.id_order', 'order.id')
            ->leftJoin('product as p', 'p.id', 'od.id_product')
            ->select(
                'p.nama',
                'od.jumlah'
            )
            ->where('order.id', $id)
            ->get();
        $total = Order::query()
            ->select('total')
            ->where('id', $id)
            ->first();
        $total = number_format($total->total, 0, ',', '.');
        $totalINT =  Order::query()
            ->select('total')
            ->where('id', $id)
            ->first();
        $statusBayar = Order::query()
            ->select('status_dibayar')
            ->where('id', $id)
            ->first();
        $statusPesanan = Order::query()
            ->select('status_pesanan')
            ->where('id', $id)
            ->first();
        return response()->json([
            'order' => $order,
            'total' => $total,
            'totalINT' => $totalINT->total,
            'statusBayar' => $statusBayar->status_dibayar,
            'statusPesanan' => $statusPesanan->status_pesanan,
            'id' => $id,
        ]);
    }
    public function purchase(Request $request)
    {
        $idCashier = Auth::user()->id_cashier;
        $purchase = Order::query()
            ->where('id', $request->idOrder)
            ->update([
                'status_dibayar' => 1,
                'id_cashier' => $idCashier
            ]);
        if ($purchase) {
            return response()->json(['success' => 1]);
        }
        return response()->json(['success' => 0]);
    }
    public function deliverOrder(Request $request)
    {
        $deliver = Order::query()
            ->where('id', $request->idOrder)
            ->update([
                'status_pesanan' => 1,
            ]);
        if ($deliver) {
            return response()->json(['success' => 1]);
        }
        return response()->json(['success' => 0]);
    }

    public function print($id)
    {

        $transaction = Order::query()
            ->where('id', $id)
            ->select(
                'total',
                'nama_pelanggan',
                'diskon',
                'id_meja'
            )
            ->first();
        $transaction->total = number_format($transaction->total, 0, '.', ',');
        $transaction->diskon = number_format($transaction->diskon, 0, '.', ',');
        $order = OrderDetil::query()
            ->leftJoin('product as p', 'p.id', 'order_detil.id_product')
            ->select(
                'p.nama',
                'p.harga',
                'order_detil.jumlah'
            )
            ->where('order_detil.id_order', $id)
            ->get();

        foreach ($order as $data) {
            $data->total = number_format($data->harga * $data->jumlah, 0, '.', ',');
            $data->harga = number_format($data->harga, 0, '.', ',');
        }

        $pdf = PDF::loadView('nota', compact('transaction', 'order'));

        return $pdf->stream('nota-pembelian.pdf', ['Attachment' => 0]);
    }
}
