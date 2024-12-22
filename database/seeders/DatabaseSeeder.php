<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Barang;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Barang::factory(20)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            "name" => "Ferdi Hasan",
            "email" => "ferdihasanpwd@gmail.com",
            "number" => "0895412725840",
            "password" => bcrypt('12345678'),
        ]);
        Category::create([
            "name" => "Elektronik",
        ]);
        Category::create([
            "name" => "Financial & Biodata",
        ]);
        Category::create([
            "name" => "Mainan",
        ]);
        Category::create([
            "name" => "Kunci",
        ]);
        Category::create([
            "name" => "Kendaraan",
        ]);
        Category::create([
            "name" => "Other",
        ]);
    }
}
