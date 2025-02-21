<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category; // ✅ Добавляем этот импорт

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Работа', 'Учеба', 'Домашние дела', 'Спорт', 'Развлечения'];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
