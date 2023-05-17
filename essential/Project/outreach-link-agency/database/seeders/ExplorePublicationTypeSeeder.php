<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\ExplorePublicationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExplorePublicationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ExplorePublicationType::insert(
            [
                [
                    'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                    'name' => 'Parmanent',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                    'name' => 'Temporary',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            ]
        );
    }
}
