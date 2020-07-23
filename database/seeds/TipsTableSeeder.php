<?php

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
        factory(App\Tip::class, 30)->create();
    }
}
