<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';

    protected $fillable = [
        'id',
        'nama',
        'stok',
        'harga',
    ];

    public function cart()
    {
        return $this->hasOne(Cart::class, 'id_produk', 'id');
    }
}
