<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Budi Santoso',
                'email' => 'budi@literasia.com',
                'password' => bcrypt('password'),
                'nim' => '2024001',
                'phone' => '081234567890',
            ],
            [
                'name' => 'Siti Nurhaliza',
                'email' => 'siti@literasia.com',
                'password' => bcrypt('password'),
                'nim' => '2024002',
                'phone' => '081234567891',
            ],
            [
                'name' => 'Andi Prasetyo',
                'email' => 'andi@literasia.com',
                'password' => bcrypt('password'),
                'nim' => '2024003',
                'phone' => '081234567892',
            ],
            [
                'name' => 'Dewi Kartika',
                'email' => 'dewi@literasia.com',
                'password' => bcrypt('password'),
                'nim' => '2024004',
                'phone' => '081234567893',
            ],
            [
                'name' => 'Rudi Hermawan',
                'email' => 'rudi@literasia.com',
                'password' => bcrypt('password'),
                'nim' => '2024005',
                'phone' => '081234567894',
            ],
        ];

        foreach ($users as $userData) {
            $user = \App\Models\User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => $userData['password'],
            ]);

            \App\Models\Member::create([
                'user_id' => $user->id,
                'nim' => $userData['nim'],
                'phone' => $userData['phone'],
                'status' => 'active',
            ]);
        }
    }
}
