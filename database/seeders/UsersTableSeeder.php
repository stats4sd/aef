<?php

namespace Database\Seeders;

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
                'name' => 'Test User',
                'email' => 'test@example.com',
                'email_verified_at' => '2024-08-22 08:24:35',
                'password' => '$2y$12$ojE8ci3ZPy.CBq70/A.3denaNeAaF/vJnPMvjRHdKYlP1tT25NG..',
                'remember_token' => 'gFyKpWaJN59kcHWdwSzfLwMPRevaBgfAkKlQcwnvxJuk7PkgU0CRMi6lQwvv',
                'created_at' => '2024-08-22 08:24:35',
                'updated_at' => '2024-08-22 08:25:25',
                'latest_team_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Dan Tang',
                'email' => 'dan@stats4sd.org',
                'email_verified_at' => NULL,
                'password' => '$2y$12$R/THQxRLrAiI2NG5WRcBiu1PjYtrUV0SgSlRaLOPEFYI7croAmtIW',
                'remember_token' => NULL,
                'created_at' => '2024-08-22 09:06:29',
                'updated_at' => '2024-08-22 09:09:23',
                'latest_team_id' => 2,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Carlos Barahona',
                'email' => 'c.e.barahona@stats4sd.org',
                'email_verified_at' => NULL,
                'password' => '$2y$12$T8pqt7sW9a3LkcaiMFjXN.Y2bTk8hJ.exZBqKwj7OToSqNFYEVGWm',
                'remember_token' => NULL,
                'created_at' => '2024-08-22 09:07:17',
                'updated_at' => '2024-08-22 09:11:49',
                'latest_team_id' => 2,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Romina De Angelis',
                'email' => 'romina@stats4sd.org',
                'email_verified_at' => NULL,
                'password' => '$2y$12$OwnmbJtvb.wiSdLGFzTuAup6hyJRW.QZaSsFZuLk5CxLsUX9Zzz4.',
                'remember_token' => NULL,
                'created_at' => '2024-08-22 09:07:31',
                'updated_at' => '2024-08-22 09:07:31',
                'latest_team_id' => NULL,
            ),
        ));
        
        
    }
}