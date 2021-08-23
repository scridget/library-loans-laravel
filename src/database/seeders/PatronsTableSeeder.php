<?php

namespace Database\Seeders;

use App\Models\Patron;
use Illuminate\Database\Seeder;

class PatronsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Patron::factory()->create();
    }
}
