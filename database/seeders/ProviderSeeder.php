<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('providers')->insert([
            'name'      => 'Coca Cola',            
            'email'     => 'cocacola@gmail.com',
            'address'   => 'Retalhuleu, Guatemala',
            'phone'     => '11111111',
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')            
        ],
        [
            'name'      => 'Walmart',            
            'email'     => 'walmart@gmail.com',
            'address'   => 'Villa Nueva, Guatemala',
            'phone'     => '22222222',
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')            
        ],
        [
            'name'      => 'Elektra',            
            'email'     => 'elektra@gmail.com',
            'address'   => 'Guatemala, Guatemala',
            'phone'     => '33333333',
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]
    );
    }
}
