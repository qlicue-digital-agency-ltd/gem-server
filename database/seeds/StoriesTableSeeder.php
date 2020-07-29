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
      'title' => 'the title',
      'subtitle' => 'The subtitle',
      'slug' => 'the slag',
      'image' => 'http://localhost:8000' . Storage::url('public/uploads/stories/default.jpeg')
    ]);

    Story::create([
      'title' => 'the title',
      'subtitle' => 'The subtitle',
      'slug' => 'the slag',
      'image' => 'http://localhost:8000' . Storage::url('public/uploads/stories/default.jpeg')
    ]);

    Story::create([
      'title' => 'the title',
      'subtitle' => 'The subtitle',
      'slug' => 'the slag',
      'image' => 'http://localhost:8000' . Storage::url('public/uploads/stories/default.jpeg')
    ]);

    Story::create([
      'title' => 'the title',
      'subtitle' => 'The subtitle',
      'slug' => 'the slag',
      'image' => 'http://localhost:8000' . Storage::url('public/uploads/stories/default.jpeg')
    ]);
  }
}
