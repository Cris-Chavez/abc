<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'      => 'Admin',
            'lastName'  => 'Admin',
            'address'   => 'Retalhuleu, Guatemala',
            'email'     => 'admin@gmail.com',
            'avatar'    => '/storage/img/avatar/cris.jpg',
            'password'  => Hash::make('contraseña'),
            'phone'     => '11111111',
            'dpi'       => '2222222222222',
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ,
        ]);
    }
}
