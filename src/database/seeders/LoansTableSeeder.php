<?php

namespace Database\Seeders;

use App\Models\Institution;
use App\Models\Loan;
use App\Models\Patron;
use Illuminate\Database\Seeder;

class LoansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Loan::factory()
            ->count(100)
            ->hasComments(rand(0,20))
            ->create();
    }
}
