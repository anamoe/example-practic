<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable=[
        'item_code',
            'item_name',
            'price',
           'stock',
            'foto_produk'
    ];
}
