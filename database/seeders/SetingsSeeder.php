<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SetingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('setings')->insert([
            'logowebsite' => 'removepromo.png',
            'deskripsiwebsite' => 'Gudang Promo adalah suatu website yang berisi tentang berbagai macam diskon dengan berbagai macam kategori. Website ini adalah website resmi X-CODE yang dibuat untuk memenuhi tugas Mini Project bertemakan Promo.',
            'email' => 'xcode@gmail.com',
            'notelepon' => '+62-858-5034-1437',
            'alamat' => 'Perum GPA Regency 1 Hummasoft Technology',
            'ig' => 'https://www.instagram.com/gudangpromo_xcode/?next=%2F',
            'facebook' => 'https://web.facebook.com/hummasoft',
            'twitter' => 'https://twitter.com/hummasoft',
        ]);
    }
}
