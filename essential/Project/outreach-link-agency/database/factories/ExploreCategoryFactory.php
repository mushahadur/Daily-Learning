<?php

namespace Database\Factories;

use App\Models\ExploreCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ExploreCategory>
 */
class ExploreCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            ExploreCategory::Factory()->create()
        ];
    }
}
