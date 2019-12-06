<?php

use App\Kota;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LokasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kotas')->insert([
            'id'  => '1',
            'nama_kota' => 'Bengkayang',
        ]);
        DB::table('kotas')->insert([
            'id'  => '2',
            'nama_kota' => 'Kapuas Hulu',
        ]);
        DB::table('kotas')->insert([
            'id'  => '3',
            'nama_kota' => 'Kayong Utara',
        ]);
        DB::table('kotas')->insert([
            'id'  => '4',
            'nama_kota' => 'Ketapang',
        ]);
        DB::table('kotas')->insert([
            'id'  => '5',
            'nama_kota' => 'Kubu Raya',
        ]);
        DB::table('kotas')->insert([
            'id'  => '6',
            'nama_kota' => 'Landak',
        ]);
        DB::table('kotas')->insert([
            'id'  => '7',
            'nama_kota' => 'Melawi',
        ]);
        DB::table('kotas')->insert([
            'id'  => '8',
            'nama_kota' => 'Pontianak',
        ]);
        DB::table('kotas')->insert([
            'id'  => '9',
            'nama_kota' => 'Sambas',
        ]);
        DB::table('kotas')->insert([
            'id'  => '10',
            'nama_kota' => 'Sanggau',
        ]);
        DB::table('kotas')->insert([
            'id'  => '11',
            'nama_kota' => 'Sekadau',
        ]);
        DB::table('kotas')->insert([
            'id'  => '12',
            'nama_kota' => 'Singkawang',
        ]);
        DB::table('kotas')->insert([
            'id'  => '13',
            'nama_kota' => 'Sintang',
        ]);
    }
}
