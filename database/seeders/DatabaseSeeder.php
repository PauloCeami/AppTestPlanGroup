<?php

namespace Database\Seeders;


use App\Models\Produtos;
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
        Produtos::factory(10)->create();

    }
}