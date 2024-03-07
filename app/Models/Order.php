<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_customer',
        'code',
        'status',
    ];

    protected $hidden = [];

    public function cart()
    {
        return $this->hasMany(Cart::class, 'id_order', 'id');
    }

    public function transaksi()
    {
        return $this->hasOne(Transaksi::class, 'id_order', 'id');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
