<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    protected $table = 'Keranjang';
    protected $fillable = [
        'nama',
        'meja',
        'id_product',
        'jumlah',
    ];
}
