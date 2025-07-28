<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RequestInventory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RequestInventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $requestInventories = [
            [
                'user_id' => 1,
                'division_id' => 1,
                'product_id' => 1,
                'variant_id' => 1,
                'quantity' => 10,
                'note' => 'Request inventory 1',
                'status' => 'approved',
                'approved_by' => 1,
            ],
            [
                'user_id' => 2,
                'division_id' => 2,
                'product_id' => 2,
                'variant_id' => 2,
                'quantity' => 5,
                'note' => 'Request inventory 2',
                'status' => 'rejected',
                'approved_by' => 1,
            ],
            [
                'user_id' => 3,
                'division_id' => 3,
                'product_id' => 3,
                'variant_id' => 3,
                'quantity' => 15,
                'note' => 'Request inventory 3',
                'status' => 'pending',
            ],
            [
                'user_id' => 4,
                'division_id' => 4,
                'product_id' => 4,
                'variant_id' => 4,
                'quantity' => 8,
                'note' => 'Request inventory 4',
                'status' => 'pending',
            ],
            [
                'user_id' => 1,
                'division_id' => 3,
                'product_id' => 5,
                'variant_id' => 5,
                'quantity' => 12,
                'note' => 'Request inventory 5',
                'status' => 'pending',
            ],
            [
                'user_id' => 2,
                'division_id' => 4,
                'product_id' => 24,
                'variant_id' => 3,
                'quantity' => 12,
                'note' => 'Request inventory 6',
                'status' => 'pending',
            ]
        ];

        foreach ($requestInventories as $requestInventory) {
            RequestInventory::create($requestInventory);
        }
    }
}
