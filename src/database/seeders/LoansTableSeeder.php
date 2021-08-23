<?php

namespace Database\Seeders;

use App\Models\Institution;
use App\Models\Loan;
use App\Models\Patron;
use Illuminate\Database\Eloquent\Factories\Sequence;
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
            ->state(new Sequence(
                fn ($sequence) => ['institution_id' => Institution::inRandomOrder()->first()],
                fn ($sequence) => ['institution_id' => Institution::factory()],
                fn ($sequence) => ['patron_id' => Patron::inRandomOrder()->first()],
                fn ($sequence) => ['patron_id' => Patron::factory()],
            ))
            ->create();
    }
}
