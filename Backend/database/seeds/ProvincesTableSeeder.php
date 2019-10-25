<?php

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $file = 'seeder/provinces.json';
        $data = json_decode(file_get_contents(storage_path($file)),true);
        DB::table('provinces')->insert($data);
    }
}
