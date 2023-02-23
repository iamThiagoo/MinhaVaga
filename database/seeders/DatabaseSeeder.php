<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\OpportunityType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            StateSeeder::class,
            CitySeeder::class,
            UserSeeder::class,
            CompanySeeder::class,
            OpportunityTypeSeeder::class,
            OpportunitySeeder::class,
            InstitutionSeeder::class,
            SkillSeeder::class,
            IdiomSeeder::class
        ]);
    }
}
