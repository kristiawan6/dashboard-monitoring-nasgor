<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_order',
        'id_produk',
        'qty',
        'sub_total',
    ];

    protected $hidden = [];

    public function order()
    {
        return $this->belongsTo(Produk::class, 'id_order', 'id');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id');
    }
}
