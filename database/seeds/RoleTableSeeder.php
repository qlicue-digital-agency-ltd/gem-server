<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'    => "Administrator",
            'description' => "System Administrator",
        ]);

        Role::create([
            'name'    => "Teacher",
            'description' => "Professional Teacher",
        ]);

        Role::create([
            'name'    => "Parent",
            'description' => "Parent with a disabled child",
        ]);

        Role::create([
            'name'    => "Donor",
            'description' => "Donors to the foundation",
        ]);
        Role::create([
            'name'    => "User",
            'description' => "Normal users",
        ]);

        Role::create([
            'name'    => "NGO",
            'description' => "Non government organisations",
        ]);

        Role::create([
            'name'    => "Other",
            'description' => "Other Professionals",
        ]);
    }
}
