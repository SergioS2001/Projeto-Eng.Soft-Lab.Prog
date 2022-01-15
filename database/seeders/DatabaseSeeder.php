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
    \App\Models\Edificio::factory(5)->create();
     \App\Models\Sala::factory(5)->create();
   \App\Models\Utilizador::factory(5)->create();
 \App\Models\Requisito::factory(5)->create();
    }
}
