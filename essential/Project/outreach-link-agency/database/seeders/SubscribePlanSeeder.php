<?php

namespace Database\Seeders;

use App\Models\SubscribePlan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscribePlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubscribePlan::create([
            "id" => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            "name" => 'Basic Plan',
            "price" => 0,
            "description" => '<ul><li><strong>With the Basic Plan, you can get Free Access to BloggerOutreach’s Database with limited functionalities for a month.</strong></li><li><strong>Restricted access to the publisher database.</strong></li><li><strong>Maximum 10 Search Results will be displayed in Basic Plan on platform</strong></li><li><strong>Advertisers will be able to only see 10 Listings under the Basic Plan.</strong></li></ul>',
            "validity" => 'Monthly',
            "is_active" => 1,
        ]);
    }
}
