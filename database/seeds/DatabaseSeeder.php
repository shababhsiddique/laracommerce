<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create Sample Data
        $path = 'db_laravel_shop_seeder.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Shop Seeded!');

    }
}
