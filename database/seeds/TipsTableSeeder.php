<?php

use App\Tip;
use Illuminate\Database\Seeder;

class TipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tip::create([
            'title' => 'title',
            'slug' => 'slug',
            'subtitle' => 'subtitle',
            'image' => 'image',
        ]);

        Tip::create([
            'title' => 'title',
            'slug' => 'slug',
            'subtitle' => 'subtitle',
            'image' => 'image',
        ]);

        Tip::create([
            'title' => 'title',
            'slug' => 'slug',
            'subtitle' => 'subtitle',
            'image' => 'image',
        ]);

        Tip::create([
            'title' => 'title',
            'slug' => 'slug',
            'subtitle' => 'subtitle',
            'image' => 'image',
        ]);
    }
}
