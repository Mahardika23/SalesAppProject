<?php

use Illuminate\Database\Seeder;

class VillagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $file = 'seeder/villages.json';
        $data = json_decode(file_get_contents(storage_path($file)),true);
        $chunks = array_chunk($data,500);
        foreach ($chunks as $chunk){
            DB::table('villages')->insert($chunk);
    
        }
    }
}
