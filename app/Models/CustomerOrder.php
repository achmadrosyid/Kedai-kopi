<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrder extends Model
{
    use HasFactory;
    protected $table = 'customer-order';
    protected $fillable = [
        'id_product',
        'detail_product',
        'nama',
        'meja',
        'jumlah',
        'diskon',
        'pembayaran',
    ];
}
