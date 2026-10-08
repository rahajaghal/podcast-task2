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
        Category::create([
            "name"=> "Science",
        ]);
        Category::create([
            "name"=> "Math",
        ]);
        Category::create([
            "name"=> "Art",
        ]);
        Category::create([
            "name"=> "Islamic",
        ]);
        Category::create([
            "name"=> "History",
        ]);
        Category::create([
            "name"=> "Songs",
        ]);
    }
}
