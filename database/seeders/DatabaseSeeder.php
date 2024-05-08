<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AvionesTableSeeder::class);
        $this->call(AeropuertosTableSeeder::class);
        $this->call(AvionesshTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
