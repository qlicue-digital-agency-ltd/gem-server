<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ProfilesTableSeeder::class);

        $this->call(TipsTableSeeder::class);
       // $this->call(StoriesTableSeeder::class);
        // $this->call(ProductsTableSeeder::class);
        // $this->call(JobsTableSeeder::class);
        // $this->call(AdvertsTableSeeder::class);
        // $this->call(CompaniesTableSeeder::class);
        // $this->call(QualificationsTableSeeder::class);
        // $this->call(DescriptionsTableSeeder::class);
        // $this->call(EducationTableSeeder::class);
        // $this->call(DistrictsTableSeeder::class);
    }
}
