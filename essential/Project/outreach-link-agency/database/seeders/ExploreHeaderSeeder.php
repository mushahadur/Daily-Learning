<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\ExploreHeader;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExploreHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ExploreHeader::insert([
            'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'title' => 'First Header',
            'description' => 'Lorem ipsum dolor sit amet',
            'is_active' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
