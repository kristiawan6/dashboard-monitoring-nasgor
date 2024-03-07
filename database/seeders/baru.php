<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class baru extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           $users = [
            [
                'nama' => 'Pisang Nugget Blueberry',
                'stok' => '10',
                'harga' => '8000'
            ]  , 
            
            ];
            foreach ($users as $key => $value) {
                Produk::create($value);
            }
    }
}
