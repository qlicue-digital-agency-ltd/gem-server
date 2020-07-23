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
   
        $user->email = 'admin@admin.com';
        $user->password =  Hash::make('admin');
        $user->save();
        $role = Role::where('name', 'Administrator')->first();
        $user->roles()->attach($role);


        $user = new User();
    
        $user->email = 'teacher@teacher.com';
        $user->password =  Hash::make('teacher');
        $user->save();
        $role = Role::where('name', 'Teacher')->first();
        $user->roles()->attach($role);



        $user = new User();
      
        $user->email = 'parent@parent.com';
        $user->password =  Hash::make('parent');
        $user->save();
        $role = Role::where('name', 'Parent')->first();
        $user->roles()->attach($role);


        $user = new User();
        $user->email = 'doctor@doctor.com';
        $user->password =  Hash::make('doctor');
        $user->save();
        $role = Role::where('name', 'Doctor')->first();
        $user->roles()->attach($role);


        $user = new User();
        $user->email = 'user@user.com';
        $user->password =  Hash::make('user');
        $user->save();
        $role = Role::where('name', 'User')->first();
        $user->roles()->attach($role);



        $user = new User();
        $user->email = 'ngo@ngo.com';
        $user->password =  Hash::make('ngo');
        $user->save();
        $role = Role::where('name', 'NGO')->first();
        $user->roles()->attach($role);

        $user = new User();
        $user->email = 'other@other.com';
        $user->password =  Hash::make('other');
        $user->save();
        $role = Role::where('name', 'Other')->first();
        $user->roles()->attach($role);

    }
}
