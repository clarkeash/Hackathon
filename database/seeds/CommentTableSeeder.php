<?php

use Illuminate\Database\Seeder;
use OVH\Comment;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Comment::class, 200)
            ->create();
    }
}
