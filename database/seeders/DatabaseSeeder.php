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
        DB::table('co_puerto_lugar_embarques')->insert(['co_puerto_lugar_embarque_descripcion' => 'Matarani - Aduana Interior Sucre', 'created_at' => now(), 'updated_at' => now()]);
    }
}
