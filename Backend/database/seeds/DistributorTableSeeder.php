<?php

use Illuminate\Database\Seeder;

class DistributorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Distributor::class,20)->create()->each(function($distributor){
            $distributor->save();
            
            $barang = factory(App\Barang::class)->make();
            $distributor->barang()->save($barang);
            
                
            
        });


        //
    }
}
