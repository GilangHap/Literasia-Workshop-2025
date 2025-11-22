<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BorrowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $borrows = [
            [
                'member_id' => 1,
                'book_id' => 1,
                'borrow_date' => now()->subDays(10),
                'due_date' => now()->addDays(4),
                'return_date' => null,
                'status' => 'borrowed',
            ],
            [
                'member_id' => 1,
                'book_id' => 5,
                'borrow_date' => now()->subDays(20),
                'due_date' => now()->subDays(6),
                'return_date' => null,
                'status' => 'overdue',
            ],
            [
                'member_id' => 2,
                'book_id' => 3,
                'borrow_date' => now()->subDays(15),
                'due_date' => now()->subDays(1),
                'return_date' => now()->subDays(2),
                'status' => 'returned',
            ],
            [
                'member_id' => 3,
                'book_id' => 8,
                'borrow_date' => now()->subDays(5),
                'due_date' => now()->addDays(9),
                'return_date' => null,
                'status' => 'borrowed',
            ],
            [
                'member_id' => 4,
                'book_id' => 10,
                'borrow_date' => now()->subDays(12),
                'due_date' => now()->addDays(2),
                'return_date' => null,
                'status' => 'borrowed',
            ],
            [
                'member_id' => 5,
                'book_id' => 2,
                'borrow_date' => now()->subDays(30),
                'due_date' => now()->subDays(16),
                'return_date' => now()->subDays(14),
                'status' => 'returned',
            ],
        ];

        foreach ($borrows as $borrow) {
            \App\Models\Borrow::create($borrow);
        }
    }
}
