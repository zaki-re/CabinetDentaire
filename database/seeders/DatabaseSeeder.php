<?php

namespace Database\Seeders;

use App\Models\Malade;
use App\Models\Medecin;
use App\Models\User;
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
         Medecin::factory(10)->create();
        Malade::factory(10)->create();

         User::factory(10)->create();

    }
}
