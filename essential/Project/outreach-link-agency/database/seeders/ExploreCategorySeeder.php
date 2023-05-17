<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\ExploreCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExploreCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ExploreCategory::insert(
            [
                [
                    'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                    'name' => 'Arts & Entertainment',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                    'name' => 'Books & Author',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            ]
        );
    }
}
