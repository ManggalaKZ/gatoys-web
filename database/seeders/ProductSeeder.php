<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [[
                // 1. LABUBU
                'title' => 'Labubu The Monsters Exciting Macaron Blind Box',
                'slug' => Str::slug('Labubu The Monsters Exciting Macaron Blind Box'),
                'image' => 'labubu-macaron.jpg', // Silakan download gambar Labubu Macaron dari Google dan taruh di folder public webmu
                'price' => 350000,
                'stock' => 50,
                'is_active' => true,
                'category_id' => 1, // Misal: 1 untuk POP MART
                'sku' => 'POP-LAB-MAC-01',
                'series' => 'The Monsters Exciting Macaron',
                'weight' => 150,
                'desc' => 'Koleksi boneka vinyl plush Labubu dalam balutan warna-warni kue macaron yang manis dan menggemaskan. Dilengkapi dengan gantungan untuk dijadikan keychain.',
                'lore' => 'Labubu adalah peri hutan berwujud monster kecil yang diciptakan oleh seniman Kasing Lung. Meskipun memiliki gigi taring yang tajam dan senyum yang terkesan nakal, Labubu sebenarnya memiliki hati yang sangat baik dan selalu ingin membantu orang lain, meskipun sering kali ia malah tidak sengaja membuat kekacauan.',
                'material' => 'PVC/ABS/Polyester',
                'size' => '17 cm',
                'age_recommendation' => '15+',
                'origin' => 'POP MART (China)',
                'extra_info' => 'Dilengkapi dengan kartu identitas (ID Card) di dalam setiap box tertutup. Varian Secret adalah warna Chestnut (Coklat).',
                'probability' => 0.0138, // 1/72 peluang untuk Secret
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                // 2. SKULLPANDA
                'title' => 'Skullpanda City of Night Series Blind Box',
                'slug' => Str::slug('Skullpanda City of Night Series Blind Box'),
                'image' => 'skullpanda-cityofnight.jpg',
                'price' => 250000,
                'stock' => 120,
                'is_active' => true,
                'category_id' => 1,
                'sku' => 'POP-SKP-CON-01',
                'series' => 'City of Night',
                'weight' => 120,
                'desc' => 'Seri Skullpanda yang mengusung tema Cyberpunk dystopia dengan warna neon yang mencolok dan desain futuristik.',
                'lore' => 'Skullpanda adalah penjelajah waktu dan ruang dari alam semesta tak terbatas. Ia sering bepergian antar planet dan dimensi. Dalam seri City of Night, Skullpanda menjelma menjadi berbagai karakter di jalanan kota neon cyberpunk yang gelap, mencari kebebasan berekspresi di tengah kekacauan dunia modern.',
                'material' => 'PVC/ABS',
                'size' => '6.5 - 7 cm',
                'age_recommendation' => '15+',
                'origin' => 'POP MART (China)',
                'extra_info' => 'Total 12 desain basic dan 1 desain secret (Night Walker).',
                'probability' => 0.0069, // 1/144 peluang untuk Secret
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                // 3. HIRONO
                'title' => 'Hirono Little Mischief Series Blind Box',
                'slug' => Str::slug('Hirono Little Mischief Series Blind Box'),
                'image' => 'hirono-mischief.jpg',
                'price' => 250000,
                'stock' => 85,
                'is_active' => true,
                'category_id' => 1,
                'sku' => 'POP-HRN-LMS-01',
                'series' => 'Little Mischief',
                'weight' => 110,
                'desc' => 'Figur Hirono yang menampilkan ekspresi melankolis namun nakal, membangkitkan kenangan masa kecil yang penuh dengan kebebasan.',
                'lore' => 'Diciptakan oleh seniman Lang, Hirono mewakili "anak kecil" yang tersembunyi di dalam diri setiap orang dewasa. Hirono menangkap emosi kompleks dari kehidupan manusia: kesepian, kerentanan, namun penuh dengan ketahanan. Setiap figur Hirono menceritakan kisah nostalgia dan jiwa masa kecil yang menolak untuk dikekang oleh dunia.',
                'material' => 'PVC/ABS',
                'size' => '8 - 10 cm',
                'age_recommendation' => '15+',
                'origin' => 'POP MART (China)',
                'extra_info' => 'Seri ini sangat populer karena nilai emosionalnya. Varian Secret adalah "The Ghost".',
                'probability' => 0.0069, // 1/144 peluang untuk Secret
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                // 4. DIMOO
                'title' => 'Dimoo Jurassic World Series Blind Box',
                'slug' => Str::slug('Dimoo Jurassic World Series Blind Box'),
                'image' => 'dimoo-jurassic.jpg',
                'price' => 230000,
                'stock' => 60,
                'is_active' => true,
                'category_id' => 1,
                'sku' => 'POP-DMO-JRW-01',
                'series' => 'Jurassic World',
                'weight' => 130,
                'desc' => 'Dimoo berkolaborasi dengan franchise Jurassic World, menampilkan Dimoo mengenakan kostum dinosaurus yang lucu.',
                'lore' => 'Dimoo adalah seorang anak laki-laki kecil yang pemalu dan sering merasa kebingungan. Ciri khasnya adalah awan bayi (Baby Cloud) di atas kepalanya yang bisa berubah bentuk sesuai dengan emosi Dimoo. Dalam seri ini, Dimoo bermimpi melakukan perjalanan melintasi waktu ke era Jurassic, bukan untuk lari dari dinosaurus, melainkan untuk berteman dengan mereka.',
                'material' => 'PVC/ABS',
                'size' => '7 - 9 cm',
                'age_recommendation' => '15+',
                'origin' => 'POP MART (China)',
                'extra_info' => 'Merupakan kolaborasi lisensi resmi dengan Universal Studios.',
                'probability' => 0.0069, // 1/144
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                // 5. ONE PIECE (WCF)
                'title' => 'One Piece WCF Wano Kuni Vol. 1 Blind Box',
                'slug' => Str::slug('One Piece WCF Wano Kuni Vol 1 Blind Box'),
                'image' => 'onepiece-wcf-wano.jpg',
                'price' => 180000,
                'stock' => 200,
                'is_active' => true,
                'category_id' => 1, // Misal: 2 untuk Anime / Bandai
                'sku' => 'BND-OP-WCF-W1',
                'series' => 'Wano Kuni',
                'weight' => 100,
                'desc' => 'Figur mini World Collectable Figure (WCF) dari Bandai yang menampilkan karakter One Piece dalam pakaian tradisional arc Wano.',
                'lore' => 'Monkey D. Luffy dan Bajak Laut Topi Jerami menyusup ke negara tertutup Wano Kuni. Misi mereka adalah untuk menggulingkan tirani Shogun Kurozumi Orochi dan Yonko Kaido yang kejam, demi membebaskan rakyat Wano dan menepati janji kepada Kozuki Oden.',
                'material' => 'PVC/ABS',
                'size' => '7 cm',
                'age_recommendation' => '15+',
                'origin' => 'Bandai Spirits (Jepang)',
                'extra_info' => 'Tidak ada varian Secret, namun karakter didapatkan secara acak dari 6 kemungkinan (Luffy, Zoro, Sanji, dll).',
                'probability' => 0.1666, // 1/6 peluang mendapat karakter favorit
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                // 6. CRYBABY
                'title' => 'Crybaby Sad Club Series Blind Box',
                'slug' => Str::slug('Crybaby Sad Club Series Blind Box'),
                'image' => 'crybaby-sadclub.jpg',
                'price' => 260000,
                'stock' => 45,
                'is_active' => true,
                'category_id' => 1,
                'sku' => 'POP-CRY-SDC-01',
                'series' => 'Sad Club',
                'weight' => 140,
                'desc' => 'Koleksi Crybaby yang merayakan kebebasan bersedih. Figur dengan air mata besar yang menjadi ciri khasnya.',
                'lore' => 'Diciptakan oleh Molly (Seniman asal Thailand), Crybaby adalah karakter yang mengajarkan kita bahwa menangis itu tidak apa-apa. Menangis bukanlah tanda kelemahan, melainkan ekspresi emosi yang sehat. Seri Sad Club adalah klub yang didirikan untuk merangkul kesedihan kita, menyembuhkan luka batin, dan bangkit kembali dengan senyuman.',
                'material' => 'PVC/ABS',
                'size' => '7 - 8 cm',
                'age_recommendation' => '15+',
                'origin' => 'POP MART (China)',
                'extra_info' => 'Setiap box dilengkapi dengan aksesoris air mata yang bisa dilepas pasang.',
                'probability' => 0.0069, // 1/144
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                // 7. SONNY ANGEL
                'title' => 'Sonny Angel Mini Figure Animal Series 1',
                'slug' => Str::slug('Sonny Angel Mini Figure Animal Series 1'),
                'image' => 'sonnyangel-animal.jpg',
                'price' => 195000,
                'stock' => 150,
                'is_active' => true,
                'category_id' => 1, // Misal: 3 untuk Dreams / Lainnya
                'sku' => 'DRM-SNN-ANM1',
                'series' => 'Animal Series 1',
                'weight' => 50,
                'desc' => 'Bayi laki-laki kecil bersayap malaikat yang memakai berbagai macam penutup kepala berbentuk hewan.',
                'lore' => 'Sonny Angel adalah malaikat kecil berwujud bayi laki-laki. Ia tidak bisa berbicara, tetapi ia selalu mengawasi dan menemanimu untuk membuatmu tersenyum. Ia diciptakan sebagai figur penyembuh (healing figure) untuk membawa kebahagiaan dan ketenangan ke dalam kehidupan sehari-hari orang dewasa yang sibuk.',
                'material' => 'ATBC-PVC',
                'size' => '7.5 cm',
                'age_recommendation' => '3+',
                'origin' => 'Dreams Inc. (Jepang)',
                'extra_info' => 'Varian rahasia adalah Robby Angel, teman dari Sonny Angel yang bisa berubah warna.',
                'probability' => 0.0069, // 1/144 Secret Robby
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                // 8. GENSHIN IMPACT
                'title' => 'Genshin Impact Mondstadt Battlefield Heroes Blind Box',
                'slug' => Str::slug('Genshin Impact Mondstadt Battlefield Heroes Blind Box'),
                'image' => 'genshin-mondstadt.jpg',
                'price' => 220000,
                'stock' => 300,
                'is_active' => true,
                'category_id' => 1,
                'sku' => 'MHO-GEN-MND-01',
                'series' => 'Mondstadt Series',
                'weight' => 90,
                'desc' => 'Karakter-karakter ikonik dari region Mondstadt dalam game Genshin Impact yang dibuat dalam wujud chibi.',
                'lore' => 'Mondstadt adalah Kota Kebebasan yang terletak di benua Teyvat, tempat bernaungnya para penyembah Anemo Archon (Dewa Angin), Barbatos. Seri ini menampilkan para ksatria gagah berani dari Knights of Favonius seperti Jean, Diluc, dan Klee yang bersumpah untuk melindungi kedamaian kota dari ancaman monster dan Abyss Order.',
                'material' => 'PVC/ABS',
                'size' => '7.5 - 9 cm',
                'age_recommendation' => '15+',
                'origin' => 'miHoYo (China)',
                'extra_info' => 'Terdapat 6 desain reguler dan 1 hidden figure (Patung Statue of The Seven).',
                'probability' => 0.0208, // 1/48 untuk secret
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                // 9. MEGA SPACE MOLLY
                'title' => 'MEGA Space Molly 100% Series 1 Blind Box',
                'slug' => Str::slug('MEGA Space Molly 100 Series 1 Blind Box'),
                'image' => 'spacemolly-100.jpg',
                'price' => 300000,
                'stock' => 40,
                'is_active' => true,
                'category_id' => 1,
                'sku' => 'POP-MOL-SPC-01',
                'series' => 'MEGA Space Molly',
                'weight' => 160,
                'desc' => 'Versi ukuran 100% (7.6 cm) dari seri ikonik MEGA Space Molly, menampilkan Molly dalam balutan baju astronot berbagai desain.',
                'lore' => 'Molly adalah gadis kecil yang percaya diri, keras kepala, dan mandiri, dengan ciri khas bibir mengerucut (pout) dan mata zamrud yang besar. Sebagai Space Molly, ia mewakili rasa ingin tahu umat manusia yang tak terbatas dan keberanian untuk menjelajahi alam semesta yang tidak diketahui.',
                'material' => 'PVC/ABS/PC',
                'size' => '7.6 cm',
                'age_recommendation' => '15+',
                'origin' => 'POP MART (China)',
                'extra_info' => 'Seri ini dilengkapi helm yang bisa dibuka tutup dan lengan yang bisa digerakkan.',
                'probability' => 0.0092, // 1/108 peluang Secret
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                // 10. NANCI
                'title' => 'Nanci Twenty-Four Solar Terms Blind Box',
                'slug' => Str::slug('Nanci Twenty Four Solar Terms Blind Box'),
                'image' => 'nanci-solar.jpg',
                'price' => 210000,
                'stock' => 70,
                'is_active' => true,
                'category_id' => 1, // Rolife / Robotime
                'sku' => 'ROL-NAN-24S-01',
                'series' => 'Twenty-Four Solar Terms',
                'weight' => 110,
                'desc' => 'Nanci yang didesain dengan tema pakaian tradisional Tiongkok mewakili 24 istilah tata surya/musim pertanian.',
                'lore' => 'Nanci adalah peri ajaib yang selalu tertidur lelap dengan gelembung permen karet (bubblegum) di hidungnya. Ia bisa tertidur di mana saja, bermimpi tentang kedamaian. Seri Twenty-Four Solar Terms ini terinspirasi dari kearifan kuno Tiongkok tentang pergantian musim, melambangkan harmoni antara manusia dan ritme alam semesta.',
                'material' => 'PVC/ABS',
                'size' => '8 - 9 cm',
                'age_recommendation' => '15+',
                'origin' => 'Rolife (China)',
                'extra_info' => 'Gaya pengecatan menggunakan teknik gradasi pastel yang sangat detail.',
                'probability' => 0.0069, // 1/144 peluang secret
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('products')->insert($products);
    }
}