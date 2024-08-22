<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);

        $this->call(TeamsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TeamMembersTableSeeder::class);
        $this->call(OrganisationsTableSeeder::class);

        $this->call(TagsTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
    }
}
