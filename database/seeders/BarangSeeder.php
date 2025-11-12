<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barangs')->insert([
            [
                'uuid' => Str::uuid(),
                'kode_barang' => 'BRG001',
                'nama' => 'Laptop ASUS',
                'deskripsi' => 'Laptop ASUS terbaru dengan prosesor i7',
                'kategori_id' => 3,
                'jumlah_barang' => 10,
                'harga' => 15000000,
                'satuan' => 'pcs',
                'image' => 'laptop_asus.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'kode_barang' => 'BRG002',
                'nama' => 'Mouse Logitech',
                'deskripsi' => 'Mouse wireless Logitech',
                'kategori_id' => 4,
                'jumlah_barang' => 50,
                'harga' => 250000,
                'satuan' => 'pcs',
                'image' => 'mouse_logitech.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'kode_barang' => 'BRG003',
                'nama' => 'Keyboard Mechanical',
                'deskripsi' => 'Keyboard mechanical RGB',
                'kategori_id' => 4,
                'jumlah_barang' => 30,
                'harga' => 750000,
                'satuan' => 'pcs',
                'image' => 'keyboard_mechanical.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
