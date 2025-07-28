<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'admin',
                'role' => 'admin',
                'division_id' => 1,
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'user1',
                'role' => 'user',
                'division_id' => 1,
                'email' => 'user1@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'user2',
                'role' => 'user',
                'division_id' => 2,
                'email' => 'user2@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'user3',
                'role' => 'user',
                'division_id' => 3,
                'email' => 'user3@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'user4',
                'role' => 'user',
                'division_id' => 4,
                'email' => 'user4@example.com',
                'password' => bcrypt('password'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
