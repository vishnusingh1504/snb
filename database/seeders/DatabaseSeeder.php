<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CustomersSeeder;
use Database\Seeders\RolesAndPermissionsSeeder;
use Database\Seeders\ClassesSeeder;
use Database\Seeders\AcademicSessionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CustomersSeeder::class);
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(ClassesSeeder::class);
        $this->call(AcademicSessionSeeder::class);
    }
}
