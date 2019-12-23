<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class KategoriBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //    • 

        $kategori = array('Sembako','Minuman','Obat – obatan','Bumbu dapur','Rokok','ATK'
        ,'Makanan siap saji','Kosmetik','Perlengkapan Rumah Tangga');
        for ($i=0; $i < count($kategori) ; $i++) { 
       
        DB::table('kategori_barangs')->insert([
            'kategori' => $kategori[$i],
            // 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            // 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ]);
         }
    }
}
