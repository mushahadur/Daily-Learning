<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\ServiceBuyContent;
use App\Models\ServiceBuyContentWordLength;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExploreServiceBuyContentWordLengthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $buy_content = ServiceBuyContent::where('name', 'Content Writing & Publication')->first();

        ServiceBuyContentWordLength::insert([
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'length' => 1000,
                'price' => 10,
                'service_buy_content_id' => $buy_content->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'length' => 1500,
                'price' => 15,
                'service_buy_content_id' => $buy_content->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'length' => 2000,
                'price' => 20,
                'service_buy_content_id' => $buy_content->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
