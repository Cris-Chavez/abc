<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ProviderSeeder::class);
        $this->call(DestinationSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ContainerSeeder::class);
    }
}
