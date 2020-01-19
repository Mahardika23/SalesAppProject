<?php

use Illuminate\Database\Seeder;

class WilayahTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $file = 'seeder/wilayah.json';
        $data = json_decode(file_get_contents(storage_path($file)),true);
        $chunks = array_chunk($data,10000);
        foreach ($chunks as $chunk){
            DB::table('wilayahs')->insert($chunk);
    
        }
    
    }
}
