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
        User::all()->each(function($user) {
            Loan::factory()
                ->count(rand(1,50))
                ->forResource()
                ->forInstitution()
                ->for($user)
                ->hasComments(rand(0,20))
                ->create();
        });
    }
}
