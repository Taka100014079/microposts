<?php

use Illuminate\Database\Seeder;

class MicropostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('microposts')->delete();
        
        \DB::table('microposts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 2,
                'content' => '私はギットよ',
                'created_at' => '2018-06-26 14:45:36',
                'updated_at' => '2018-06-26 14:45:36',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 2,
                'content' => 'よろしくねギット',
                'created_at' => '2018-06-26 14:45:48',
                'updated_at' => '2018-06-26 14:45:48',
            ),
            2 => 
            array (
                'id' => 4,
                'user_id' => 3,
                'content' => 'うんてぃ',
                'created_at' => '2018-06-27 14:15:28',
                'updated_at' => '2018-06-27 14:15:28',
            ),
            3 => 
            array (
                'id' => 5,
                'user_id' => 5,
                'content' => 'acidcherry',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 7,
                'user_id' => 4,
                'content' => 'ds',
                'created_at' => '2018-07-09 13:55:06',
                'updated_at' => '2018-07-09 13:55:06',
            ),
            5 => 
            array (
                'id' => 20,
                'user_id' => 20,
                'content' => 'acidcherry',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 88,
                'user_id' => 88,
                'content' => 'acidcherry',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}