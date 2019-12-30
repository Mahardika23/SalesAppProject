<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('users')->insert([
            'name' => 'admintoko',
            'email' => 'toko@toko.com',
            'userable_id' => 1,
            'userable_type' => 'App\toko',
            'password' => Hash::make('12341234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

        ]);
        DB::table('tokos')->insert([
            'nama_toko' => 'Toko Warung',
            'nama_pemilik' => 'Nafiu',
            'no_telp' => '08123456789',
            'email_pemilik' => 'toko@toko.com',
            'alamat_toko' => 'Jalan Mayjen Sungkono',
            'province_id' => '33',
            'district_id' => '3301180',
            'regency_id' => '3301',
            'village_id' => '3301180002',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

        ]);
        DB::table('users')->insert([
            'name' => 'adminsales',
            'email' => 'sales@sales.com',
            'userable_id' => 1,
            'userable_type' => 'App\Sales',
            'password' => Hash::make('12341234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

        ]);
        DB::table('sales')->insert([
            'nama_sales' => 'randy',
            'distributor_id' => '21',
            'no_hp' => '0812345678',
            'province_id' => '33',
            'district_id' => '3301180',
            'regency_id' => '3301',
            'village_id' => '3301180002',
            'regency_id' => '3301',
           
        ]);
        DB::table('users')->insert([
            'name' => 'admindistributor',
            'email' => 'distributor@distributor.com',
            'userable_id' => 21,
            'userable_type' => 'App\Distributor',
            'password' => Hash::make('12341234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

        ]);
        DB::table('distributors')->insert([
            'nama_distributor' => 'distributorA',
            'email_distributor' => 'distributor@distributor.com',
            'alamat_distributor' => 'Jl. Mayjen Sungkono',
            'province_id' => '33',
            'regency_id' => '3301',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

        ]);
    }
}
