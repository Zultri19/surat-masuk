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
         DB::table('kategoris')->insert([
            [
                'nama' => 'Surat Undangan',
                'slug' => 'surat-undangan',
            ],
            [
                'nama' => 'Surat Tugas',
                'slug' => 'surat-tugas',
            ],
            [
                'nama' => 'Surat Permohonan',
                'slug' => 'surat-permohonan',
            ],
            [
                'nama' => 'Surat Pemberitahuan',
                'slug' => 'surat-pemberitahuan',
            ],
            [
                'nama' => 'Surat Keputusan',
                'slug' => 'surat-keputusan',
            ],
            [
                'nama' => 'Surat Pengantar',
                'slug' => 'surat-pengantar',
            ],
        ]);
    }
}
