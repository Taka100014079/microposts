<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'test',
                'email' => 'test@test.com',
                'password' => '$2y$10$zyQauD1JRT/exdE3up3se.ROjeXtm7wxfxpmpGrjIQV8GHJfJYyzS',
                'remember_token' => NULL,
                'created_at' => '2018-06-26 13:34:39',
                'updated_at' => '2018-06-26 13:34:39',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'gitgit',
                'email' => 'gitgit@gitmail.com',
                'password' => '$2y$10$WI.wt0AxZG1629hNoW9/8Ou1EX71Kl2aDxICbwBuJiUgxsqA3mRxy',
                'remember_token' => 'h2hvjJW3NLHhvGBZIVpeKDFlRRZaWZfY5ZfRAjzYkvSIPra3tS4KSxglHu5w',
                'created_at' => '2018-06-26 14:45:13',
                'updated_at' => '2018-06-26 14:45:13',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'tinker',
                'email' => 'tinker@tinker.com',
                'password' => '$2y$10$WIDzHK05KDTH46ytpxK.dehB6R6I7gte4VE9zAo3bqs4i8V/./6Tu',
                'remember_token' => 'RFSvUrH0sCpqPsTySyRpkaV6j9rdiJZ5fZhLkdBoNCUOI8f2u8ATkDVZ25gu',
                'created_at' => '2018-06-26 15:03:40',
                'updated_at' => '2018-06-26 15:03:40',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'coincheck',
                'email' => 'coincheck@rakuten.com',
                'password' => '$2y$10$rOs6TY1C9lPB/VljAAcR5.oz1aRrZs9yKljWfGALer90rxYo.Fw6i',
                'remember_token' => NULL,
                'created_at' => '2018-06-28 14:37:41',
                'updated_at' => '2018-06-28 14:37:41',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'ixtMZowPjN',
                'email' => 'jomWtzH0uX@gmail.com',
                'password' => '$2y$10$sIu2Q/v8JOg70E005QbQV.A4caQuB.DOr0RY8eX8SfiKcFoZmDigK',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}