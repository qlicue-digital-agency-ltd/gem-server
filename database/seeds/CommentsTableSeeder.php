<?php

use App\Comment;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::create([
            'body' => 'Tourism for everyone Tourism for everyone Tourism for everyone',
            'user_id' => 2,
            'post_id' => 1,
        ]);

        Comment::create([
            'body' => 'Tourism for everyone Tourism for everyone Tourism for everyone',
            'user_id' => 1,
            'post_id' => 1,
        ]);


        Comment::create([
            'body' => 'Tourism for everyone Tourism for everyone Tourism for everyone',
            'user_id' => 3,
            'post_id' => 2,
        ]);

        Comment::create([
            'body' => 'Tourism for everyone Tourism for everyone Tourism for everyone',
            'user_id' => 1,
            'post_id' => 2,
        ]);

        Comment::create([
            'body' => 'Tourism for everyone Tourism for everyone Tourism for everyone',
            'user_id' => 1,
            'post_id' => 3,
        ]);
        Comment::create([
            'body' => 'Tourism for everyone Tourism for everyone Tourism for everyone',
            'user_id' => 1,
            'post_id' => 3,
        ]);
        Comment::create([
            'body' => 'Tourism for everyone Tourism for everyone Tourism for everyone',
            'user_id' => 1,
            'post_id' => 3,
        ]);
        Comment::create([
            'body' => 'Tourism for everyone Tourism for everyone Tourism for everyone',
            'user_id' => 1,
            'post_id' => 3,
        ]);
        Comment::create([
            'body' => 'Tourism for everyone Tourism for everyone Tourism for everyone',
            'user_id' => 1,
            'post_id' => 3,
        ]);
        Comment::create([
            'body' => 'Tourism for everyone Tourism for everyone Tourism for everyone',
            'user_id' => 1,
            'post_id' => 4,
        ]);
    }
}
