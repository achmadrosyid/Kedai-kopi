<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "order";
    protected $fillable = [
        'no_order',
        'tanggal',
        'id_meja',
        'nama_pelanggan',
        'jumlah_harga',
        'diskon',
        'total',
        'status_dibayar',
        'status_pesanan',
    ];
}
