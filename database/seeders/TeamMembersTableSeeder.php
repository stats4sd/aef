<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TeamMembersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('team_members')->delete();
        
        \DB::table('team_members')->insert(array (
            0 => 
            array (
                'id' => 1,
                'team_id' => 1,
                'user_id' => 1,
                'is_admin' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'team_id' => 2,
                'user_id' => 2,
                'is_admin' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'team_id' => 2,
                'user_id' => 3,
                'is_admin' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'team_id' => 2,
                'user_id' => 4,
                'is_admin' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'team_id' => 2,
                'user_id' => 5,
                'is_admin' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'team_id' => 2,
                'user_id' => 6,
                'is_admin' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'team_id' => 2,
                'user_id' => 7,
                'is_admin' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}