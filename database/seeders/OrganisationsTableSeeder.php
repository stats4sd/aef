<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrganisationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('organisations')->delete();
        
        \DB::table('organisations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'team_id' => 1,
                'name' => 'Organisation 1',
                'website' => 'http://www.google.com',
                'contact_person_name' => 'Peter',
                'contact_person_email' => 'peter@gmail.com',
                'note' => NULL,
                'created_at' => '2024-08-15 10:08:19',
                'updated_at' => '2024-08-15 10:08:19',
            ),
            1 => 
            array (
                'id' => 2,
                'team_id' => 1,
                'name' => 'Organisation 2',
                'website' => 'http://www.yahoo.com',
                'contact_person_name' => 'Mary',
                'contact_person_email' => 'mary@yahoo.com',
                'note' => NULL,
                'created_at' => '2024-08-15 10:09:20',
                'updated_at' => '2024-08-15 10:09:20',
            ),
            2 => 
            array (
                'id' => 3,
                'team_id' => 1,
                'name' => 'Organisation 3',
                'website' => 'http://www.bbc.co.uk',
                'contact_person_name' => 'Susan',
                'contact_person_email' => 'susan@bbc.co.uk',
                'note' => NULL,
                'created_at' => '2024-08-15 10:09:42',
                'updated_at' => '2024-08-15 10:09:42',
            ),
        ));
        
        
    }
}