<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */



    public function run(): void
    {
        // Создаем 5 пользователей с профилями
        for ($i = 1; $i <= 5; $i++) {
            $user = [
                'name' => 'admin' . $i,
                'email' => 'admin' . $i . '@gmail.com',
                'password' => Hash::make('password' . $i),
            ];

            $user = User::firstOrCreate(['email' => $user['email']], $user);

            // Создаем профиль только если его еще нет
            if (!$user->profile) {
                $user->profile()->create();
            }
        }

        // Выполняем остальные сидеры
        $this->call([
            CategorySeeder::class,
            TagSeeder::class,
            ChatSeeder::class,
            MessageSeeder::class,
            PostSeeder::class,
            CommentSeeder::class,
        ]);
    }
}
