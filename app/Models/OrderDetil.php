<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetil extends Model
{
    use HasFactory;
    protected $table = "order_detil";
    protected $fillable = [
        'id_order',
        'id_product',
        'jumlah',
    ];
}
