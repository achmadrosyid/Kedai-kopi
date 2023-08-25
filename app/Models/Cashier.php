<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cashier extends Model
{
    use HasFactory;
    protected $table = 'cashier';
    protected $fillable = [
        'nama',
        'email',
        'password',
        'nomer',
    ];
}
