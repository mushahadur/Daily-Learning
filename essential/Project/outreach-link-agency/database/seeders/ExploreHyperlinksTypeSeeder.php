<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\HyperlinkType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExploreHyperlinksTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HyperlinkType::insert(
            [
                [
                    'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                    'name' => 'Dofollow',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                    'name' => 'Nofollow',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            ]
        );
    }
}
