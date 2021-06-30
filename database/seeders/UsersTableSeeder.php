<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\User;
use Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'    => 'Rose',
            'email'    => 'rose@gmail.com',
            'password'   =>  Hash::make('password'),
            'status' =>  1,
            'dob' => '1996/03/15',
            'created_at' => '2021-05-16 08:25:28',
            'updated_at' => '2021-05-16 08:25:28',
            'remember_token' =>  str::random(10),
        ]);
    }
}
