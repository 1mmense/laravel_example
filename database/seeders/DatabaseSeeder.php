<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'firstname' => 'Knight',
            'lastname'  => 'Hedge',
            'email'     => 'hedgeknight@example.net',
        ]);

        $employers = Employer::factory(10)->create();
        $tags      = Tag::factory(100)->create();

        $jobs = Job::factory(50)
            ->recycle($employers)
            ->create();

        $jobs->each(
            fn ($job) => $job->tags()->attach($tags->random(rand(1, 100)))
        );

        $posts = Post::factory(10)->create();

        $posts->each(
            fn ($post) => $post->tags()->attach($tags->random(rand(1, 100)))
        );

        Comment::factory(200)
            ->recycle($posts)
            ->create();
    }
}
