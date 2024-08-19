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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(TeamMembersTableSeeder::class);
        $this->call(OrganisationsTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
    }
}
