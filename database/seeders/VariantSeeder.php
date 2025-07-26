<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Support\Str;

class VariantSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'Sekop' => ['Sekop tanah', 'Sekop pasir', 'Sekop besi', 'Sekop lipat'],
            'Cangkul' => ['Cangkul satu sisi', 'Cangkul dua sisi', 'Cangkul sawah', 'Cangkul baja'],
            'Linggis' => ['Linggis lurus', 'Linggis bengkok', 'Linggis pahat', 'Linggis mini'],
            'Palu Besar' => ['Godam besi', 'Palu pemecah batu', 'Palu karet besar', 'Palu demolition'],
            'Gergaji Mesin' => ['Gergaji circular', 'Gergaji chainsaw', 'Gergaji reciprocating', 'Gergaji scroll'],
            'Bor' => ['Bor tangan manual', 'Bor listrik', 'Bor beton', 'Bor cordless', 'Bor magnetik'],
            'Mesin Pemotong' => ['Mesin potong keramik', 'Mesin potong besi', 'Mesin potong kayu', 'Mesin potong aspal'],
            'Pemadat Tanah' => ['Stamper kodok', 'Plate compactor', 'Roller mini', 'Tamping rammer'],
            'Mesin Las' => ['Las listrik MMA', 'Las MIG', 'Las TIG', 'Las inverter'],
            'Jack Hammer' => ['Jack hammer listrik', 'Jack hammer pneumatik', 'Jack hammer hidrolik'],
            'Obeng' => ['Obeng plus', 'Obeng minus', 'Obeng ketok', 'Obeng presisi'],
            'Tang' => ['Tang kombinasi', 'Tang potong', 'Tang lancip', 'Tang buaya'],
            'Kunci Pas' => ['Kunci pas tetap', 'Kunci ring', 'Kunci pas ganda', 'Kunci pas kombinasi'],
            'Kunci Inggris' => ['Kunci inggris pendek', 'Kunci inggris panjang', 'Kunci inggris adjustable', 'Kunci inggris heavy duty'],
            'Pisau Serbaguna' => ['Cutter kecil', 'Cutter besar', 'Cutter lipat', 'Cutter keramik'],
            'Palu Kecil' => ['Palu besi', 'Palu kayu', 'Palu karet', 'Palu ball pein'],
            'Meteran' => ['Meteran gulung', 'Meteran roll', 'Meteran digital'],
            'Waterpass' => ['Waterpass manual', 'Waterpass digital', 'Waterpass magnetik'],
            'Siku Ukur' => ['Siku baja', 'Siku plastik', 'Siku penggaris'],
            'Kunci L' => ['Kunci L pendek', 'Kunci L panjang', 'Kunci L set', 'Kunci L bola'],
            'Testpen' => ['Testpen biasa', 'Testpen digital', 'Testpen LED'],
            'Multimeter' => ['Multimeter analog', 'Multimeter digital', 'Multimeter auto-range'],
            'Tang Ampere' => ['Tang ampere AC', 'Tang ampere DC', 'Tang ampere digital'],
            'Solder' => ['Solder listrik', 'Solder uap (hot air)', 'Solder gas'],
            'Crimping Tool' => ['Crimping RJ45', 'Crimping kabel skun', 'Crimping multifungsi'],
            'Striping Tool' => ['Pengupas kabel otomatis', 'Pengupas kabel manual', 'Pengupas kabel multifungsi'],
            'Detektor Tegangan' => ['Detektor non-kontak', 'Detektor voltase digital', 'Detektor continuity'],
            'Obeng Listrik' => ['Obeng listrik baterai', 'Obeng listrik kabel', 'Obeng impact'],
            'Thermal Gun' => ['Infrared thermometer', 'Thermal gun digital', 'Thermal gun industri'],
            'Alat Ukur Isolasi' => ['Megger analog', 'Megger digital', 'Insulation tester'],
            'Dongkrak' => ['Dongkrak botol', 'Dongkrak gunting', 'Dongkrak hidrolik mobil'],
            'Kunci Torsi' => ['Kunci torsi analog', 'Kunci torsi digital', 'Kunci torsi klik'],
            'Kunci Sok' => ['Soket set', 'Soket panjang', 'Soket impact'],
            'Pompa' => ['Pompa oli', 'Pompa angin', 'Pompa air manual'],
            'Tang Rivet' => ['Tang rivet manual', 'Tang rivet pneumatik', 'Tang rivet listrik'],
            'Grenda' => ['Gerinda tangan', 'Gerinda duduk', 'Gerinda potong'],
            'Kunci Busi' => ['Kunci busi fleksibel', 'Kunci busi magnetik', 'Kunci busi T'],
            'Alat Ukur Tekanan' => ['Pressure gauge ban', 'Pressure gauge oli', 'Manometer'],
            'Feeler Gauge' => ['Feeler standar', 'Feeler set panjang', 'Feeler dengan angka laser'],
            'Mesin Steam' => ['Steam portable', 'Steam tekanan tinggi', 'Steam mobil'],
            'Sapu' => ['Sapu ijuk', 'Sapu plastik', 'Sapu karet'],
            'Pel Lantai' => ['Pel microfiber', 'Pel spons', 'Pel uap'],
            'Ember' => ['Ember plastik', 'Ember besi', 'Ember pel roda'],
            'Vakum Industri' => ['Vakum kering', 'Vakum basah', 'Vakum HEPA filter'],
            'Penyemprot' => ['Penyemprot manual', 'Penyemprot elektrik', 'Penyemprot dorong'],
            'Sikat' => ['Sikat baja', 'Sikat plastik', 'Sikat lantai'],
            'Lap' => ['Lap microfiber', 'Lap kanebo', 'Lap serat alami'],
            'Tempat Sampah' => ['Tempat sampah pedal', 'Tempat sampah dorong', 'Tempat sampah outdoor'],
            'Ember Pel Putar' => ['Ember pel 2 tabung', 'Ember pel spinner', 'Ember pel otomatis'],
            'Alat Pel Semprot' => ['Pel semprot tangan', 'Pel semprot botol', 'Pel semprot kaki'],
        ];

        foreach ($data as $productName => $variants) {
            $product = Product::where('name', $productName)->first();

            if ($product) {
                foreach ($variants as $variantName) {
                    Variant::create([
                        'product_id' => $product->id,
                        'name' => $variantName,
                        'stock' => rand(5, 30),
                        'description' => 'Varian dari ' . $productName,
                    ]);
                }
            } else {
                $this->command->warn("Produk '$productName' tidak ditemukan. Skipping...");
            }
        }
    }
}
