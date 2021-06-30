<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'title'    => 'Information Technology',
            'description'    => 'Information Technology',
            'status'   =>  1,
            'created_user_id' =>  1,
            'updaed_user_id' => 1,
        ]);
    }
}
