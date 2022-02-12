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
        $this->call(UsersTableSeeder::class);
        $this->call(InstitutionsTableSeeder::class);
        $this->call(PatronsTableSeeder::class);
        $this->call(LoansTableSeeder::class);
    }
}
