<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('destinations')->insert([
            'type'          => 'Aeropuerto',            
            'name'          => 'Jorge Chávez',
            'country'       => 'Perú',            
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')            
        ],
        [
            'type'          => 'Puerto',            
            'name'          => 'Puerto de San José',
            'country'       => 'Guatemala',
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')            
        ],
        [
            'type'          => 'Puerto',            
            'name'          => 'Aeropuerto de Madrid',
            'country'       => 'España',
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]
    );
    }
}
