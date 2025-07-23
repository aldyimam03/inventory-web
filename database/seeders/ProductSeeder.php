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
        $Products = [
            [
            'name' => 'Mie Ayam',
            'slug' => 'mie-ayam',
            'category_id' => 1,
            'description' => 'Mie Ayam',
            ],
            [
            'name' => 'Nasi Goreng',
            'slug' => 'nasi-goreng',
            'category_id' => 1,
            'description' => 'Nasi Goreng',
            ],
            [
            'name' => 'Es Teh',
            'slug' => 'es-teh',
            'category_id' => 2,
            'description' => 'Es Teh',
            ],
            [
            'name' => 'Es Jeruk',
            'slug' => 'es-jeruk',
            'category_id' => 2,
            'description' => 'Es Jeruk',
            ]
        ];
    
        foreach ($Products as $Product) {
            Product::create($Product);
        }
    }
}
