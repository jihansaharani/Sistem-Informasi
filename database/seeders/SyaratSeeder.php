<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SyaratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sks')->insert([
            'syarat' => 'Penggunaan situs ini merupakan penerimaan dari syarat dan ketentuan penggunaan yang telah ditetapkan.',
        ]);
        DB::table('sks')->insert([
            'syarat' => 'Segala bentuk konten yang disajikan di situs ini adalah milik kami dan dilindungi oleh undang-undang hak cipta.',
        ]);
        DB::table('sks')->insert([
            'syarat' => 'Penggunaan konten situs ini hanya diperbolehkan untuk keperluan pribadi dan tidak untuk tujuan komersial.',
        ]);
        DB::table('sks')->insert([
            'syarat' => 'Kami tidak bertanggung jawab atas kerusakan atau kehilangan data yang disebabkan oleh penggunaan situs ini.',
        ]);
        DB::table('sks')->insert([
            'syarat' => 'Kami berhak mengubah syarat dan ketentuan penggunaan situs ini tanpa pemberitahuan sebelumnya.',
        ]);
        DB::table('sks')->insert([
            'syarat' => 'Penggunaan situs ini harus mematuhi hukum dan peraturan yang berlaku.',
        ]);
        DB::table('sks')->insert([
            'syarat' => 'Apabila terdapat pelanggaran terhadap syarat dan ketentuan penggunaan situs ini, kami berhak untuk mengambil tindakan yang diperlukan.',
        ]);
    }
}
