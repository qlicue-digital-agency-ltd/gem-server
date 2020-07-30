<?php

use App\Story;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class StoriesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {

    Story::create([
      'title' => 'Cake carrot cake icing. Soufflé pudding gummi bears bonbon liquorice jelly halvah cake.',
      'subtitle' => 'The subtitle',
      'slug' => 'the slag',
      'image' => 'http://localhost:8000' . Storage::url('public/uploads/stories/default.jpeg')
    ]);

    Story::create([
      'title' => 'Cake carrot cake icing. Soufflé pudding gummi bears bonbon liquorice jelly halvah cake.',
      'subtitle' => 'The subtitle',
      'slug' => 'the slag',
      'image' => 'http://localhost:8000' . Storage::url('public/uploads/stories/default.jpeg')
    ]);

    Story::create([
      'title' => 'Cake carrot cake icing. Soufflé pudding gummi bears bonbon liquorice jelly halvah cake.',
      'subtitle' => 'The subtitle',
      'slug' => 'the slag',
      'image' => 'http://localhost:8000' . Storage::url('public/uploads/stories/default.jpeg')
    ]);

    Story::create([
      'title' => 'Cake carrot cake icing. Soufflé pudding gummi bears bonbon liquorice jelly halvah cake.',
      'subtitle' => 'The subtitle',
      'slug' => 'the slag',
      'image' => 'http://localhost:8000' . Storage::url('public/uploads/stories/default.jpeg')
    ]);
  }
}
