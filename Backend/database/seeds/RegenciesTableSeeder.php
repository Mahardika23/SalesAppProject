<?php

use Illuminate\Database\Seeder;

class RegenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         $file = 'seeder/regencies.json';
        $data = json_decode(file_get_contents(storage_path($file)),true);
        DB::table('regencies')->insert($data);
    }
}
