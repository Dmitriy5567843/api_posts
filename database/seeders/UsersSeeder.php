<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function (){
            User::create([
                'name' => 'Test admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make('password'), // password
                'is_admin'=>1
            ]);
            User::create([
                'name' => 'Test user1',
                'email' => 'user1@mail.com',
                'password' => Hash::make('password'), // password

            ]);
            User::create([
                'name' => 'Test user2',
                'email' => 'user2@mail.com',
                'password' => Hash::make('password'), // password

            ]);
            User::create([
                'name' => 'Test user3',
                'email' => 'user3@mail.com',
                'password' => Hash::make('password'), // password

            ]);
        });
    }
}
