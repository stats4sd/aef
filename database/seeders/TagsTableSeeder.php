<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tags')->delete();
        
        \DB::table('tags')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Tag 1',
                'created_at' => '2024-08-15 09:58:35',
                'updated_at' => '2024-08-15 09:58:35',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Tag 2',
                'created_at' => '2024-08-15 09:58:37',
                'updated_at' => '2024-08-15 09:58:37',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Tag 3',
                'created_at' => '2024-08-15 09:58:40',
                'updated_at' => '2024-08-15 09:58:40',
            ),
        ));
        
        
    }
}