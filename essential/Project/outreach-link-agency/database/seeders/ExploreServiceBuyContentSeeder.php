<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Service;
use Illuminate\Database\Seeder;
use App\Models\ServiceBuyContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExploreServiceBuyContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $service = Service::where('name', 'Guest Posting')->first();
        logger($service);
        ServiceBuyContent::insert([
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Content Publication',
                'service_id' => $service->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Content Writing & Publication',
                'service_id' => $service->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
