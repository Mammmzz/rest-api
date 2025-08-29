<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produk::create([
            'nama_barang' => 'Laptop Asus ROG',
            'harga' => 15000000,
            'stok' => 5
        ]);

        Produk::create([
            'nama_barang' => 'Mouse Gaming Logitech',
            'harga' => 750000,
            'stok' => 20
        ]);

        Produk::create([
            'nama_barang' => 'Keyboard Mechanical',
            'harga' => 1200000,
            'stok' => 15
        ]);

        Produk::create([
            'nama_barang' => 'Monitor 24 inch',
            'harga' => 2500000,
            'stok' => 8
        ]);

        Produk::create([
            'nama_barang' => 'Headset Gaming',
            'harga' => 900000,
            'stok' => 12
        ]);
    }
}
