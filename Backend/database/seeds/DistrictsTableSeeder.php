<?php

use Illuminate\Database\Seeder;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $file = 'seeder/districts.json';
        $data = json_decode(file_get_contents(storage_path($file)),true);
        DB::table('districts')->insert($data);
        //
    }
}
