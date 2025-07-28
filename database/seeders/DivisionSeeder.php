<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $division = [
            ['name' => 'HR'],
            ['name' => 'Finance'],
            ['name' => 'IT'],
            ['name' => 'CEO'],
        ];

        foreach ($division as $division) {
            Division::create($division);
        }
    }
}
