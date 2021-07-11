<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name'          => 'Coca Cola',            
            'sku'           =>  Str::random(10),
            'presentation'  => '12 onzas',
            'volumen'       => '1',
            'quantity'      => '24',
            'photo'         => '/storage/img/product/no-product.png',
            'stock'         =>  0,
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')            
        ],
        [
            'name'          => 'Pasta Dental',            
            'sku'           =>  Str::random(10),
            'presentation'  => 'vaso',
            'volumen'       => '1',
            'quantity'      => '12',
            'photo'         => '/storage/img/product/no-product.png',
            'stock'         =>  0,
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')             
        ],
        [
            'name'          => 'Shampoo',            
            'sku'           =>  Str::random(10),
            'presentation'  => 'litro',
            'volumen'       => '1',
            'quantity'      => '6',
            'photo'         => '/storage/img/product/no-product.png',
            'stock'         =>  0,
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s') 
        ]
    );
    }
}
