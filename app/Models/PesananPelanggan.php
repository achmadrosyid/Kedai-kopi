<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananPelanggan extends Model
{
    use HasFactory;
    protected $table = 'pesanan-pelanggan';
    protected $fillable = [
        'id_product',
        'nama',
        'meja',
        'detail_product',
        'jumlah',
        'diskon',
        'pembayaran',
    ];
}
