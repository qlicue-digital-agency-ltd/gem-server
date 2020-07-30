<?php

use App\Tip;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

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
            'title' => 'Cake carrot cake icing. Soufflé pudding gummi bears bonbon liquorice jelly halvah cake.',
            'slug' => 'slug',
            'subtitle' => 'subtitle',
            'image' => 'http://localhost:8000' . Storage::url('public/uploads/tips/default2.jpg'),
        ]);

        Tip::create([
            'title' => 'Cake carrot cake icing. Soufflé pudding gummi bears bonbon liquorice jelly halvah cake.',
            'slug' => 'slug',
            'subtitle' => 'subtitle',
            'image' => 'http://localhost:8000' . Storage::url('public/uploads/tips/default.jpg'),
        ]);

        Tip::create([
            'title' => 'Cake carrot cake icing. Soufflé pudding gummi bears bonbon liquorice jelly halvah cake.',
            'slug' => 'slug',
            'subtitle' => 'subtitle',
            'image' => 'http://localhost:8000' . Storage::url('public/uploads/tips/default2.jpg'),
        ]);

        Tip::create([
            'title' => 'Cake carrot cake icing. Soufflé pudding gummi bears bonbon liquorice jelly halvah cake.',
            'slug' => 'slug',
            'subtitle' => 'subtitle',
            'image' => 'http://localhost:8000' . Storage::url('public/uploads/tips/default.jpg'),
        ]);
    }
}
