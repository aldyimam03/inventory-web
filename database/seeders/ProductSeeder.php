<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Perkakas Tangan (category_id: 1)
            [
                'name' => 'Palu Besi 500gr',
                'category_id' => 1,
                'description' => 'Palu dengan kepala besi solid untuk pekerjaan konstruksi',
            ],
            [
                'name' => 'Palu Kayu 300gr',
                'category_id' => 1,
                'description' => 'Palu dengan kepala kayu untuk finishing halus',
            ],
            [
                'name' => 'Palu Karet 400gr',
                'category_id' => 1,
                'description' => 'Palu karet untuk pemasangan keramik dan genteng',
            ],
            [
                'name' => 'Obeng Plus Set',
                'category_id' => 1,
                'description' => 'Set obeng plus berbagai ukuran (PH0, PH1, PH2, PH3)',
            ],
            [
                'name' => 'Obeng Minus Set',
                'category_id' => 1,
                'description' => 'Set obeng minus berbagai ukuran (3mm, 5mm, 8mm)',
            ],
            [
                'name' => 'Tang Potong 8 inch',
                'category_id' => 1,
                'description' => 'Tang potong untuk memotong kawat dan kabel',
            ],
            [
                'name' => 'Tang Buaya 10 inch',
                'category_id' => 1,
                'description' => 'Tang dengan rahang bergerigi untuk mencengkram',
            ],
            [
                'name' => 'Kunci Pas Set 8-24mm',
                'category_id' => 1,
                'description' => 'Set kunci pas kombinasi ring dan pas',
            ],
            [
                'name' => 'Kunci Inggris 12 inch',
                'category_id' => 1,
                'description' => 'Kunci inggris adjustable untuk berbagai ukuran baut',
            ],
            [
                'name' => 'Gergaji Besi Manual',
                'category_id' => 1,
                'description' => 'Gergaji manual untuk memotong besi dan logam',
            ],
            [
                'name' => 'Gergaji Kayu Manual',
                'category_id' => 1,
                'description' => 'Gergaji manual khusus untuk memotong kayu',
            ],

            // Perkakas Listrik (category_id: 2)
            [
                'name' => 'Bor Listrik 13mm',
                'category_id' => 2,
                'description' => 'Bor listrik dengan chuck 13mm untuk drilling',
            ],
            [
                'name' => 'Bor Baterai 12V',
                'category_id' => 2,
                'description' => 'Bor cordless dengan baterai lithium 12V',
            ],
            [
                'name' => 'Bor Baterai 18V',
                'category_id' => 2,
                'description' => 'Bor cordless heavy duty dengan baterai 18V',
            ],
            [
                'name' => 'Gerinda Tangan 4 inch',
                'category_id' => 2,
                'description' => 'Gerinda tangan untuk grinding dan cutting',
            ],
            [
                'name' => 'Circular Saw 7 inch',
                'category_id' => 2,
                'description' => 'Gergaji circular untuk memotong kayu dan triplek',
            ],
            [
                'name' => 'Jigsaw Listrik',
                'category_id' => 2,
                'description' => 'Jigsaw untuk memotong bentuk melengkung',
            ],
            [
                'name' => 'Mesin Las Inverter 200A',
                'category_id' => 2,
                'description' => 'Mesin las inverter portable 200 ampere',
            ],

            // Alat Ukur (category_id: 3)
            [
                'name' => 'Meteran Besi 3 meter',
                'category_id' => 3,
                'description' => 'Meteran besi fleksibel 3 meter dengan casing logam',
            ],
            [
                'name' => 'Meteran Besi 5 meter',
                'category_id' => 3,
                'description' => 'Meteran besi heavy duty 5 meter',
            ],
            [
                'name' => 'Meteran Kain 50 meter',
                'category_id' => 3,
                'description' => 'Meteran kain untuk pengukuran jarak jauh',
            ],
            [
                'name' => 'Waterpass 60cm',
                'category_id' => 3,
                'description' => 'Spirit level aluminium 60cm dengan 3 bubble',
            ],
            [
                'name' => 'Waterpass 120cm',
                'category_id' => 3,
                'description' => 'Spirit level aluminium 120cm untuk konstruksi',
            ],
            [
                'name' => 'Siku Besi 30cm',
                'category_id' => 3,
                'description' => 'Siku besi untuk mengukur sudut 90 derajat',
            ],
            [
                'name' => 'Jangka Sorong Digital',
                'category_id' => 3,
                'description' => 'Caliper digital dengan akurasi 0.01mm',
            ],

            // Alat Keselamatan (category_id: 4)
            [
                'name' => 'Helm Safety Putih',
                'category_id' => 4,
                'description' => 'Helm keselamatan kerja warna putih standar SNI',
            ],
            [
                'name' => 'Helm Safety Kuning',
                'category_id' => 4,
                'description' => 'Helm keselamatan kerja warna kuning',
            ],
            [
                'name' => 'Kacamata Safety Clear',
                'category_id' => 4,
                'description' => 'Kacamata safety dengan lensa jernih anti-fog',
            ],
            [
                'name' => 'Kacamata Safety Gelap',
                'category_id' => 4,
                'description' => 'Kacamata safety dengan lensa gelap anti-UV',
            ],
            [
                'name' => 'Sarung Tangan Karet',
                'category_id' => 4,
                'description' => 'Sarung Tangan karet untuk pekerjaan basah',
            ],
            [
                'name' => 'Sarung Tangan Kulit',
                'category_id' => 4,
                'description' => 'Sarung tangan kulit untuk welding dan handling',
            ],
            [
                'name' => 'Masker Debu N95',
                'category_id' => 4,
                'description' => 'Masker anti debu standar N95 untuk grinding',
            ],

            // Perlengkapan Bengkel (category_id: 5)
            [
                'name' => 'Ragum Meja 4 inch',
                'category_id' => 5,
                'description' => 'Ragum meja cast iron 4 inch untuk jepit benda kerja',
            ],
            [
                'name' => 'Ragum Meja 6 inch',
                'category_id' => 5,
                'description' => 'Ragum meja heavy duty 6 inch',
            ],
            [
                'name' => 'Tangga Aluminium 3 meter',
                'category_id' => 5,
                'description' => 'Tangga lipat aluminium ringan tinggi 3 meter',
            ],
            [
                'name' => 'Tangga Besi 2.5 meter',
                'category_id' => 5,
                'description' => 'Tangga besi kokoh tinggi 2.5 meter',
            ],
            [
                'name' => 'Tangga Kayu 2 meter',
                'category_id' => 5,
                'description' => 'Tangga kayu jati tradisional tinggi 2 meter',
            ],
            [
                'name' => 'Toolbox Plastik Besar',
                'category_id' => 5,
                'description' => 'Kotak perkakas plastik dengan sekat organizer',
            ],
            [
                'name' => 'Toolbox Logam Sedang',
                'category_id' => 5,
                'description' => 'Kotak perkakas logam dengan 3 tingkat',
            ],
            [
                'name' => 'Meja Kerja Besi',
                'category_id' => 5,
                'description' => 'Meja kerja besi dengan laci penyimpanan',
            ],
            [
                'name' => 'Lampu Kerja LED 50W',
                'category_id' => 5,
                'description' => 'Lampu kerja LED portable dengan tripod',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
