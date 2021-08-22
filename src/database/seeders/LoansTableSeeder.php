<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Institution;
use App\Models\Loan;
use App\Models\Resource;
use App\Models\User;
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
            ->forInstitution()
            ->forPatron()
            ->hasComments(rand(0,20))
            ->create();
    }
}
