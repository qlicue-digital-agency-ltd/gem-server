<?php

use Illuminate\Database\Seeder;
use App\Education;

class EducationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $education = new Education();
        $education->level = 'Non';
        $education->save();

        $education = new Education();
        $education->level = 'Primary';
        $education->save();

        $education = new Education();
        $education->level = 'Secondary';
        $education->save();

        $education = new Education();
        $education->level = 'A-Level';
        $education->save();

        $education = new Education();
        $education->level = 'Diploma';
        $education->save();

        $education = new Education();
        $education->level = 'Degree';
        $education->save();

        $education = new Education();
        $education->level = 'Masters';
        $education->save();

        $education = new Education();
        $education->level = 'PHD';
        $education->save();
    }
}
