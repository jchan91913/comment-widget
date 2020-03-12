<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Call our custom 'comments' table seeder
        $this->call(CommentsTableSeeder::class);
    }
}
