<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KedaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kedais')->insert([
            'namakedai' => 'Mengkinclong',
            'alamatkedai' => 'Bumi',
            'nohpkedai' => '999555111',
        ]);
    }
}
