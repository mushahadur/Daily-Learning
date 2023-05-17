<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Service;
use Illuminate\Database\Seeder;
use App\Models\ServiceBuyContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExploreServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::insert(
            [

                [
                    'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                    'name' => 'Link Insertion',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                    'name' => 'Guest Posting',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            ]
        );
    }
}
