<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\Post;
use App\Models\PostStatus;
use App\Models\Reaction;
use App\Models\ReactionType;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        //1-user
        User::factory(50)->create();

        //2-reaction_types
        $types = [
            'like',
            'love',
            'haha',
            'wow',
            'sad',
        ];

        foreach ($types as $type) {
            ReactionType::factory()->create(
                ['type' => $type]
            );
        }

        //3-post status
        $types = [
            'Pending', 'Published', 'Canceled', 'Reviewed', 'Saved'
        ];
        foreach ($types as $type) {
            PostStatus::factory()->create(
                ['type' => $type]
            );
        }

        //4-posts
        Post::factory(260)->create();

        //5-comments
        Comment::factory(500)->create();

        //6-Reactions
        Reaction::factory(1000)->create();
    }
}
