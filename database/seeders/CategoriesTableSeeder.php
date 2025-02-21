<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        // Отключаем проверку внешних ключей
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Удаляем все записи из таблицы tasks
        DB::table('tasks')->truncate();

        // Удаляем все записи из таблицы categories
        DB::table('categories')->truncate();

        // Включаем обратно проверку внешних ключей
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Добавляем категории
        Category::create(['name' => 'Работа']);
        Category::create(['name' => 'Личное']);
        Category::create(['name' => 'Учеба']);
    }
}
