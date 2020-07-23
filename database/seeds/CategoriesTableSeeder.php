<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'All'
        ]);
        Category::create([
            'name' => 'Physical Disabilities'
        ]);

        Category::create([
            'name' => 'Visual Disabilities'
        ]);

        Category::create([
            'name' => 'Hearing Disabilities'
        ]);

        Category::create([
            'name' => 'Mental Health Disabilities'
        ]);

        Category::create([
            'name' => 'Intellectual Disabilities'
        ]);

        Category::create([
            'name' => 'Learning Disabilities'
        ]);

        Category::create([
            'name' => 'Autism spectrum Disabilities'
        ]);

        Category::create([
            'name' => 'Acuired brain injury'
        ]);
    }
}
