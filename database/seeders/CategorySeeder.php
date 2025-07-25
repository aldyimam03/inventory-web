<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'category' => 'Perkakas Berat'
            ],
            [
                'category' => 'Perkakas Tangan'
            ],
            [
                'category' => 'Peralatan Elektrikal'
            ],
            [
                'category' => 'Perlengkapan Bengkel'
            ],
            [
                'category' => 'Alat Kebersihan'
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
