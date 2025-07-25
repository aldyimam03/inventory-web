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
            // Perkakas Berat (category_id: 1)
            ['name' => 'Sekop', 'category_id' => 1, 'description' => 'Alat untuk menggali dan memindahkan material seperti tanah dan pasir'],
            ['name' => 'Cangkul', 'category_id' => 1, 'description' => 'Alat pertanian atau konstruksi untuk menggemburkan tanah'],
            ['name' => 'Linggis', 'category_id' => 1, 'description' => 'Batang besi kuat untuk mencabut paku atau membongkar material keras'],
            ['name' => 'Palu Besar', 'category_id' => 1, 'description' => 'Palu berukuran besar untuk pekerjaan berat seperti menghancurkan'],
            ['name' => 'Gergaji Mesin', 'category_id' => 1, 'description' => 'Gergaji bertenaga mesin untuk pemotongan cepat material besar'],
            ['name' => 'Bor', 'category_id' => 1, 'description' => 'Alat untuk melubangi berbagai jenis material'],
            ['name' => 'Mesin Pemotong', 'category_id' => 1, 'description' => 'Mesin untuk memotong material keras seperti keramik dan kayu'],
            ['name' => 'Pemadat Tanah', 'category_id' => 1, 'description' => 'Alat untuk memadatkan tanah atau aspal'],
            ['name' => 'Mesin Las', 'category_id' => 1, 'description' => 'Mesin untuk penyambungan logam dengan panas tinggi'],
            ['name' => 'Jack Hammer', 'category_id' => 1, 'description' => 'Mesin pemecah beton atau aspal dengan tenaga getar'],

            // Perkakas Tangan (category_id: 2)
            ['name' => 'Obeng', 'category_id' => 2, 'description' => 'Alat untuk membuka dan mengencangkan sekrup'],
            ['name' => 'Tang', 'category_id' => 2, 'description' => 'Alat genggam untuk menjepit, memotong, atau membengkokkan'],
            ['name' => 'Kunci Pas', 'category_id' => 2, 'description' => 'Alat untuk membuka atau mengencangkan baut dan mur'],
            ['name' => 'Kunci Inggris', 'category_id' => 2, 'description' => 'Kunci serbaguna dengan ukuran rahang yang bisa diatur'],
            ['name' => 'Pisau Serbaguna', 'category_id' => 2, 'description' => 'Alat pemotong kecil untuk berbagai keperluan'],
            ['name' => 'Palu Kecil', 'category_id' => 2, 'description' => 'Palu ringan untuk pekerjaan detail atau ringan'],
            ['name' => 'Meteran', 'category_id' => 2, 'description' => 'Alat ukur panjang fleksibel'],
            ['name' => 'Waterpass', 'category_id' => 2, 'description' => 'Alat untuk mengecek kerataan secara horizontal atau vertikal'],
            ['name' => 'Siku Ukur', 'category_id' => 2, 'description' => 'Alat bantu ukur sudut siku (90 derajat)'],
            ['name' => 'Kunci L', 'category_id' => 2, 'description' => 'Kunci berbentuk L untuk sekrup heksagonal'],

            // Peralatan Elektrikal (category_id: 3)
            ['name' => 'Testpen', 'category_id' => 3, 'description' => 'Alat untuk mengecek keberadaan listrik di suatu titik'],
            ['name' => 'Multimeter', 'category_id' => 3, 'description' => 'Alat ukur listrik seperti tegangan, arus, dan hambatan'],
            ['name' => 'Tang Ampere', 'category_id' => 3, 'description' => 'Alat ukur arus listrik tanpa memutus kabel'],
            ['name' => 'Solder', 'category_id' => 3, 'description' => 'Alat untuk menyambung komponen elektronik dengan timah'],
            ['name' => 'Crimping Tool', 'category_id' => 3, 'description' => 'Alat penjepit konektor kabel'],
            ['name' => 'Striping Tool', 'category_id' => 3, 'description' => 'Alat untuk mengupas isolasi kabel'],
            ['name' => 'Detektor Tegangan', 'category_id' => 3, 'description' => 'Alat untuk mendeteksi adanya tegangan listrik'],
            ['name' => 'Obeng Listrik', 'category_id' => 3, 'description' => 'Obeng otomatis dengan motor listrik'],
            ['name' => 'Thermal Gun', 'category_id' => 3, 'description' => 'Alat pengukur suhu permukaan tanpa kontak'],
            ['name' => 'Alat Ukur Isolasi', 'category_id' => 3, 'description' => 'Alat ukur tahanan isolasi kabel listrik'],

            // Perkakas Bengkel (category_id: 4)
            ['name' => 'Dongkrak', 'category_id' => 4, 'description' => 'Alat angkat beban seperti mobil'],
            ['name' => 'Kunci Torsi', 'category_id' => 4, 'description' => 'Kunci untuk mengencangkan baut dengan torsi tertentu'],
            ['name' => 'Kunci Sok', 'category_id' => 4, 'description' => 'Kunci berbentuk soket untuk baut dan mur'],
            ['name' => 'Pompa', 'category_id' => 4, 'description' => 'Alat untuk memompa udara, air, atau oli'],
            ['name' => 'Tang Rivet', 'category_id' => 4, 'description' => 'Alat untuk memasang paku keling (rivet)'],
            ['name' => 'Grenda', 'category_id' => 4, 'description' => 'Mesin gerinda untuk mengasah atau memotong'],
            ['name' => 'Kunci Busi', 'category_id' => 4, 'description' => 'Kunci khusus untuk membuka busi kendaraan'],
            ['name' => 'Alat Ukur Tekanan', 'category_id' => 4, 'description' => 'Alat untuk mengukur tekanan udara atau cairan'],
            ['name' => 'Feeler Gauge', 'category_id' => 4, 'description' => 'Alat untuk mengukur celah atau jarak kecil'],
            ['name' => 'Mesin Steam', 'category_id' => 4, 'description' => 'Alat semprot air bertekanan untuk membersihkan'],

            // Alat Kebersihan & Perawatan (category_id: 5)
            ['name' => 'Sapu', 'category_id' => 5, 'description' => 'Alat untuk menyapu kotoran dari lantai'],
            ['name' => 'Pel Lantai', 'category_id' => 5, 'description' => 'Alat untuk mengepel lantai dengan air'],
            ['name' => 'Ember', 'category_id' => 5, 'description' => 'Wadah air atau cairan lainnya'],
            ['name' => 'Vakum Industri', 'category_id' => 5, 'description' => 'Penyedot debu dan kotoran kapasitas besar'],
            ['name' => 'Penyemprot', 'category_id' => 5, 'description' => 'Alat untuk menyemprot air atau cairan lain'],
            ['name' => 'Sikat', 'category_id' => 5, 'description' => 'Alat gosok untuk membersihkan permukaan'],
            ['name' => 'Lap', 'category_id' => 5, 'description' => 'Kain untuk mengelap debu atau cairan'],
            ['name' => 'Tempat Sampah', 'category_id' => 5, 'description' => 'Wadah penampung sampah'],
            ['name' => 'Ember Pel Putar', 'category_id' => 5, 'description' => 'Ember pel dengan mekanisme putar untuk peras air'],
            ['name' => 'Alat Pel Semprot', 'category_id' => 5, 'description' => 'Pel lantai dengan fitur semprot air'],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
