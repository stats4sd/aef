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
                'remember_token' => '5hNeHZt1jzPQrZdpM06wq0BfQERkTXqAF2VS4DfIj6cmfwTGsD3Ys6v4KZML',
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
            4 => 
            array (
                'id' => 5,
                'name' => 'Ciara McHugh',
                'email' => 'ciara@stats4sd.org',
                'email_verified_at' => NULL,
                'password' => '$2y$12$LKvtCgJM8dlyHb0m12OjzOHW7QQ5V/LGm3/M9OvmvFFrPrLDFMe1m',
                'remember_token' => NULL,
                'created_at' => '2024-09-06 15:19:34',
                'updated_at' => '2024-09-06 15:21:57',
                'latest_team_id' => 2,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Dave Mills',
                'email' => 'd.e.mills@stats4sd.org',
                'email_verified_at' => NULL,
                'password' => '$2y$12$P5lwu7DlPE.F8p1RtxyDS.go.B4R6TCzPMwhBAQNy1yaGNGoKyH8O',
                'remember_token' => NULL,
                'created_at' => '2024-09-06 15:19:46',
                'updated_at' => '2024-09-06 15:21:41',
                'latest_team_id' => 2,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Emily Nevitt',
                'email' => 'emily@stats4sd.org',
                'email_verified_at' => NULL,
                'password' => '$2y$12$jXTaobcaWN9hjOt9o47z6.Tf61K5ypOaJI9w6l75aeOgUj6HsGh7y',
                'remember_token' => NULL,
                'created_at' => '2024-09-06 15:20:42',
                'updated_at' => '2024-09-06 15:22:10',
                'latest_team_id' => 2,
            ),
        ));
        
        
    }
}