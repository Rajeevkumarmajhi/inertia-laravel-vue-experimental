<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Car;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Role;
use App\Models\Image;
use App\Models\Owner;
use App\Models\Video;
use App\Models\Comment;
use App\Models\Project;
use App\Models\Mechanic;
use App\Models\Deployment;
use App\Models\Environment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(100)->create();
        
        Project::factory(100)->create();
        Environment::factory(200)->create();
        Deployment::factory(500)->create();

        Mechanic::factory(100)->create();
        Car::factory(100)->create();
        Owner::factory(100)->create();

        Role::factory(5)->create();

        Post::factory(10)->create();
        Image::factory(10)->create();
        Video::factory(10)->create();
        Tag::factory(10)->create();
        Comment::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
