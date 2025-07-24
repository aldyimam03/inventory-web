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
                'category' => 'Perkakas Tangan'
            ],
            [
                'category' => 'Perkakas Listrik'
            ],
            [
                'category' => 'Alat Ukur'
            ],
            [
                'category' => 'Alat Keselamatan'
            ],
            [
                'category' => 'Perlengkapan Bengkel'
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
