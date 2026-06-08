<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreInformationSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // General Info
            [
                'title' => 'Tentang GA Toys',
                'content' => 'GA Toys adalah toko spesialis yang menawarkan Action Figure, Gundam, dan Blind Box Authentic dengan harga kompetitif.',
                'type' => 'general'
            ],
            // Contact
            [
                'title' => 'Lokasi Toko',
                'content' => 'Jakarta, Indonesia',
                'type' => 'contact'
            ],
            [
                'title' => 'WhatsApp Admin',
                'content' => '081234567890',
                'type' => 'contact'
            ],
            // Hours
            [
                'title' => 'Jam Operasional',
                'content' => 'Senin - Jumat: 09:00 - 18:00 WIB, Sabtu: 10:00 - 16:00 WIB, Minggu: Tutup',
                'type' => 'hours'
            ],
            // Policies
            [
                'title' => 'Kebijakan Pengiriman',
                'content' => 'Pengiriman dilakukan via JNE/J&T. Pesanan diproses 1-2 hari kerja.',
                'type' => 'policy'
            ],
            [
                'title' => 'Kebijakan Pengembalian',
                'content' => 'Wajib video unboxing. Retur maksimal 2x24 jam setelah barang diterima jika ada cacat pabrik.',
                'type' => 'policy'
            ]
        ];

        DB::table('store_information')->insert($data);
    }
}