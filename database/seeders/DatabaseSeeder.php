<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Удаляем всех пользователей перед созданием нового
        \App\Models\User::where('email', 'test@example.com')->delete();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Добавляем вызов сидера категорий
        $this->call(CategoriesTableSeeder::class);
    }
}
