<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Institution;
use App\Models\User;
use Illuminate\Database\Seeder;

class InstitutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Institution::class, 20)->make()->each(function($institution) {
            // Associate contact
            $contact = User::inRandomOrder()->where('role_id', 3)->first();
            $institution->contact()->associate($contact);
            $institution->save();

            // Make sure contact belongs to the institution
            $contact->institutions()->save($institution);

            // Store some comments on the institution
            $comments = factory(Comment::class, 5)->make();
            $institution->comments()->saveMany($comments);
        });

        User::all()->each(function($user){
            $user->institutions()->saveMany(Institution::inRandomOrder()->limit(rand(1,3))->get());
        });
    }
}
