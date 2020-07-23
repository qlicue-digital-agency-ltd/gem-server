<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
   
        $user->phone = '+255715785672';
        $user->password =  Hash::make('admin');
        $user->save();
        $role = Role::where('name', 'Administrator')->first();
        $user->roles()->attach($role);


        

    }
}
