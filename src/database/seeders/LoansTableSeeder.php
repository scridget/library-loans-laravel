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
        factory(Loan::class, 100)->make()->each(function($loan) {
            $loan->user()->associate(User::inRandomOrder()->first());
            $loan->assignee()->associate(User::inRandomOrder()->whereIn('role_id', [2,3])->first());
            $loan->resource()->associate(Resource::inRandomOrder()->first());
            $loan->institution()->associate(Institution::inRandomOrder()->first());
            $loan->lender()->associate(Institution::inRandomOrder()->first());
            $loan->save();

            // Store some comments on the loan
            $loan->comments()->saveMany(factory(Comment::class, 5)->make());
        });
    }
}
