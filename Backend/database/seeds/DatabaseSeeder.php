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
        //$this->call(UsersTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(DistrictsTableSeeder::class);
        $this->call(RegenciesTableSeeder::class);
        $this->call(VillagesTableSeeder::class);
        $this->call(DistributorTableSeeder::class);
        // $this->call(UserTableSeeder::class);

    }
}
