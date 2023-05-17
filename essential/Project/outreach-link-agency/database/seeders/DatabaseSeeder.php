<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\SubscribePlanSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(RolePermissionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SubscribePlanSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(ExploreServiceSeeder::class);
        $this->call(ExploreServiceBuyContentSeeder::class);
        $this->call(ExploreServiceBuyContentWordLengthSeeder::class);
        $this->call(DashboardButtonSeeder::class);
        $this->call(BusinessSettingsSeeder::class);
        $this->call(ExploreHeaderSeeder::class);
        $this->call(ExploreSubHeaderSeeder::class);
        $this->call(ExploreCategorySeeder::class);
        $this->call(ExplorePublicationTypeSeeder::class);
        $this->call(ExploreHyperlinksTypeSeeder::class);
        $this->call(ExploreSiteSeeder::class);
    }
}
