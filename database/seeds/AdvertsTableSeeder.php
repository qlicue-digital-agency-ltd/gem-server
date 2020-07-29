<?php

use App\Advert;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class AdvertsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Advert::create([
      'title' => 'the title',
      'link' => 'https://qlicue.co.tz/',
      'desc' => 'Powder wafer chocolate cake chocolate bar powder cake cupcake. Brownie tiramisu jelly beans. Toffee sweet roll topping jelly-o halvah. Oat cake croissant tiramisu liquorice pie bear claw.',
      'image' => 'http://localhost:8000' . Storage::url('public/uploads/adverts/default.jpeg')
    ]);

    Advert::create([
      'title' => 'the title',
      'link' => 'https://qlicue.co.tz/',
      'desc' => 'Powder wafer chocolate cake chocolate bar powder cake cupcake. Brownie tiramisu jelly beans. Toffee sweet roll topping jelly-o halvah. Oat cake croissant tiramisu liquorice pie bear claw.',
      'image' => 'http://localhost:8000' . Storage::url('public/uploads/adverts/default.jpeg')
    ]);

    Advert::create([
      'title' => 'the title',
      'link' => 'https://qlicue.co.tz/',
      'desc' => 'Powder wafer chocolate cake chocolate bar powder cake cupcake. Brownie tiramisu jelly beans. Toffee sweet roll topping jelly-o halvah. Oat cake croissant tiramisu liquorice pie bear claw.',
      'image' => 'http://localhost:8000' . Storage::url('public/uploads/adverts/default.jpeg')
    ]);
  }
}
