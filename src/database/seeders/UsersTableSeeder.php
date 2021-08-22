<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\User;
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
        User::factory([
            'name' => 'Administrator',
            'email' => 'admin@rplloans.org',
            'password' => '$2y$10$ptfk46XWD0pFC/1NaX9DEOtEw2kExQMeuJ1QXE2/ulM7wrOWF4VAC', // 123456
        ])
        ->create();

        User::factory()->count(20)->create();
    }
}
