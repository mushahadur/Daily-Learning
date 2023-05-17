<?php

namespace App\Repositories;

use App\Models\ExploreCountry;
use App\Models\ExploreHeader;
use App\Repositories\Interfaces\ExploreCountryRepositoryInterface;

class ExploreCountryRepository implements ExploreCountryRepositoryInterface
{
    public function all()
    {
        return ExploreCountry::orderBy('name', 'ASC')->get();
    }

    public function pluckById()
    {
        return ExploreCountry::orderBy('name', 'ASC')->pluck('name', 'id');
    }
}
