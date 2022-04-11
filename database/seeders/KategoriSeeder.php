<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = [
            ['nama_kategori' => 'kategori 1',
            'harga_satuan' => 10000,
            'stok' => 100],
            ['nama_kategori' => 'kategori 2',
            'harga_satuan' => 20000,
            'stok' => 200],
            ['nama_kategori' => 'kategori 3',
            'harga_satuan' => 30000,
            'stok' => 300]
        ];

        DB::table('kategori')->insert($kategori);
    }
}
