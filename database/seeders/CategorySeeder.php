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
            ['name' => 'Gaji', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Makanan & Minuman', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Transportasi', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tagihan', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hiburan', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Belanja', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kesehatan', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Investasi', 'created_at' => now(), 'updated_at' => now()],
        ];

        Category::insert($categories);
    }
}
