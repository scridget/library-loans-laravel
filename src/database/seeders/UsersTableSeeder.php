<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Household;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // First, create an admin user
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@rplloans.org',
            'password' => '$2y$10$ptfk46XWD0pFC/1NaX9DEOtEw2kExQMeuJ1QXE2/ulM7wrOWF4VAC', // 123456
            'household_id' => 1,
            'role_id' => 4,
        ]);
        Household::create([]);

        factory(Household::class, 12)->create();

        factory(User::class, 20)->make()->each(function($user) {
            // Set up household
            $household = rand(0,1) === 1 ? factory(Household::class)->create() : Household::inRandomOrder()->first();
            $user->household()->associate($household);

            // Set up role
            $user->role()->associate(Role::inRandomOrder()->where('id', '<', 4)->first());

            // Save the user
            $user->save();

            // Store some comments on the user
            $comments = factory(Comment::class, 5)->make();
            $user->comments()->saveMany($comments);
        });
    }
}
