<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'access admin panel',
                'guard_name' => 'web',
                'created_at' => '2024-08-07 14:01:07',
                'updated_at' => '2024-08-07 14:01:07',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'view all teams',
                'guard_name' => 'web',
                'created_at' => '2024-08-07 14:01:07',
                'updated_at' => '2024-08-07 14:01:07',
            ),
        ));
        
        
    }
}