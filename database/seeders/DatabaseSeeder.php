<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Location;
use App\Models\Product;
use App\Models\Size;
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


        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'username' => 'test',
            'role' => 'gerente',
        ]);
        User::factory()->create([
            'name' => 'abc',
            'email' => 'abc@example.com',
            'password' => bcrypt('password'),
            'username' => 'abc',
            'role' => 'gerente',
        ]);


        $users = User::factory(10)->create();
        $categories = Category::factory(10)->create();
        $sizes = Size::factory(10)->create();

        $products = Product::factory(5)->state(function (array $attributes) use ($categories, $sizes, $users) {
            return [
                'category_id' => $categories->random()->id,
                'size_id' => $sizes->random()->id,
                'user_id' => $users->random()->id
            ];
        })->create();

        $locations = Location::factory(2)->state(function (array $attributes) use ($users) {
            return [
                'user_id' => $users->random()->id,
                'user_in_charge_id' => $users->random()->id
            ];
        })->create();
    }
}
