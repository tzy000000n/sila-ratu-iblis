<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admins
        User::factory()->create(['name' => 'Ardiona', 'email' => 'ardiona@admin.nexyra.com', 'role' => 'admin']);
        User::factory()->create(['name' => 'Rusyda', 'email' => 'rusyda@admin.nexyra.com', 'role' => 'admin']);
        User::factory()->create(['name' => 'Naysilla', 'email' => 'naysilla@admin.nexyra.com', 'role' => 'admin']);

        // Students
        User::factory()->create(['name' => 'Calvin', 'email' => 'calvin@student.nexyra.com', 'role' => 'siswa']);
        User::factory()->create(['name' => 'Alicia', 'email' => 'alicia@student.nexyra.com', 'role' => 'siswa']);



        $this->call([
            MateriSeeder::class,
            QuizSeeder::class,
            SimulasiSeeder::class,
        ]);
    }
}
