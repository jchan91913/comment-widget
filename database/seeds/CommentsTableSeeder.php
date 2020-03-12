<?php

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
        $dummyData = [
            ['author_name' => 'Emmett Brown', 'author_email' => 'emmett@test.com', 'message' => 'Your future is whatever you make it. So make it a good one!'],
            ['author_name' => 'Homer Simpson', 'author_email' => 'homer@test.com', 'message' => 'D\'oh!'],
            ['author_name' => 'Beatrix Kiddo', 'author_email' => 'beatrix@test.com', 'message' => 'Okinawa. One way.'],
            ['author_name' => 'Tommy Wiseau', 'author_email' => 'tommy@test.com', 'message' => 'Oh hi, Mark!'],
            ['author_name' => 'Vincent Vega', 'author_email' => 'vincent@test.com', 'message' => 'You know what they call a quarter pounder with cheese in Paris?']
        ];

        App\Comment::insert($dummyData);
    }
}
