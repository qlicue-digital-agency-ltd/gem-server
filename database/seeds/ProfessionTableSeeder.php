<?php

use App\Profession;
use Illuminate\Database\Seeder;

class ProfessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profession::create([
            "code" => "1",
            "description" => "LEGISLATORS, ADMINISTRATORS AND MANAGERS",
            "description_in_swahili" => "WATUNGA SHERIA, WATAWALA NA WAKURUGENZI",
        ]);
        
    }
}
