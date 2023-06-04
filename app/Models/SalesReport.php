<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesReport extends Model
{
    use HasFactory;
    protected $table = 'salesreport';
    protected $fillable = [
        'id_pesanan',
        'meja',
        'detail_pesanan',
        'pembayaran',
    ];
}
