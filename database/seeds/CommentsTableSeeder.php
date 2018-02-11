<?php

use Illuminate\Database\Seeder;

use Laracasts\TestDummy\Factory as TestDummy;

class CommentsTableSeeder extends Seeder
{
    public function run()
    {
         factory(\App\Comment::class, 30)->create();
    }
}
