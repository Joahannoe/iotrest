<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Monolog\Handler\SendGridHandler;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class,
        SensorTableSeeder::class,
        actuatorsTableSeeder::class,
    ]);
    }
}
