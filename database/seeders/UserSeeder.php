<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use \Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timestamp = Carbon::now();
        $user1 = [
            'name' => 'Rahmat Abdullah',
            'email'=> 'rahmat@gmail.com',
            'password' => \Hash::make('12345678'),
            'role' => 'admin',
            'created_at' => $timestamp
        ];
        
        $user2 = [
            'name' => 'Budi Budiman',
            'email'=> 'budiman@gmail.com',
            'password' => \Hash::make('12345678'),
            'role' => 'client',
            'created_at' => $timestamp
        ];
        
        $user3 = [
            'name' => 'Galang Ahmad',
            'email'=> 'galang@gmail.com',
            'password' => \Hash::make('12345678'),
            'role' => 'developer',
            'created_at' => $timestamp
        ];

        User::create($user1);
        User::create($user2);
        User::create($user3);
    }
}
