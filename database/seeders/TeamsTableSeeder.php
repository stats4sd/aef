<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('teams')->delete();

        \DB::table('teams')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'Test User Team',
                'website' => NULL,
                'description' => NULL,
                'avatar' => NULL,
                'created_at' => '2024-08-15 10:22:09',
                'updated_at' => '2024-08-15 10:22:09',
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'Stats4SD',
                'website' => NULL,
                'description' => NULL,
                'avatar' => NULL,
                'created_at' => '2024-08-22 09:09:22',
                'updated_at' => '2024-08-22 09:09:22',
            ),
        ));
    }
}
