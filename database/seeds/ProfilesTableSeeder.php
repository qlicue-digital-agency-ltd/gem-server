<?php

use App\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
            'fullname' => 'Kalisa Denis',
            'phone' => '+255715785672',
            'location' => 'sinza',
            'gender' => 'Male',
            'avatar' => 'http://localhost:8000'. Storage::url('uploads/img/default.png'),
            'user_id'=>1
        ]);

        Profile::create([
            'fullname' => 'Nabankema Hajidah',
            'phone' => '+255715785672',
            'location' => 'sinza',
            'gender' => 'female',
            'avatar' => 'http://localhost:8000'. Storage::url('uploads/img/default.png'),
            'user_id'=>2
        ]);


        Profile::create([
            'fullname' => 'Luswata Joshua',
            'phone' => '+255715785672',
            'location' => 'sinza',
            'gender' => 'Male',
            'avatar' => 'http://localhost:8000'. Storage::url('uploads/img/default.png'),
            'user_id'=>3
        ]);


        Profile::create([
            'fullname' => 'Katuga Bashiruh',
            'phone' => '+255715785672',
            'location' => 'sinza',
            'gender' => 'Male',
            'avatar' => 'http://localhost:8000'. Storage::url('uploads/img/default.png'),
            'user_id'=>4
        ]);


        Profile::create([
            'fullname' => 'Namboze Ivyone',
            'phone' => '+255715785672',
            'location' => 'sinza',
            'gender' => 'female',
            'avatar' => 'http://localhost:8000'. Storage::url('uploads/img/default.png'),
            'user_id'=>5
        ]);


        Profile::create([
            'fullname' => 'Acheni Shalon',
            'phone' => '+255715785672',
            'location' => 'sinza',
            'gender' => 'female',
            'avatar' => 'http://localhost:8000'. Storage::url('http://localhost:8000'. Storage::url('uploads/img/default.png')),
            'user_id'=>6
        ]);


        Profile::create([
            'fullname' => 'fullname',
            'phone' => '+255715785672',
            'location' => 'sinza',
            'gender' => 'Male',
            'avatar' => 'http://localhost:8000'. Storage::url('uploads/img/default.png'),
            'user_id'=>7
        ]);



    }
}
