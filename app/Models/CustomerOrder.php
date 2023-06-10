<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrder extends Model
{
    use HasFactory;
    protected $table = 'customerorder';
    protected $fillable = [
        'id_pesanan',
        'nama',
        'meja',
        'detail_pesanan',
        'pembayaran',
    ];
}

