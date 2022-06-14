<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PinjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pinjamen')->insert([
            'nama_peminjam' => 'Muhammad Eka Saputra',
            'tanggal_peminjaman' => '2020-03-25',
            'barang_id' => 1,
            'status' => 1
        ]);
    }
}
