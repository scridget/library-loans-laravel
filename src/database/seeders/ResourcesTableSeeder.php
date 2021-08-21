<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Institution;
use App\Models\Resource;
use App\Models\User;
use Illuminate\Database\Seeder;

class ResourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Resource::class, 50)->create()->each(function($resource) {
            // Associate an institution to the resource
            $resource->institution()->associate(Institution::inRandomOrder()->first());
            $resource->save();

            // Store some comments on the resource
            $comments = factory(Comment::class, 5)->make();
            $resource->comments()->saveMany($comments);
        });
    }
}
