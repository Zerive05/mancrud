<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pelanggans')->insert([
            'namapelanggan' => 'namapelanggan',
            'jenislaundry' => 'pakaian',
            'paket' => 'bronze',
            'berat' => '56',
            'harga' => '',
        ]);
    }
}
