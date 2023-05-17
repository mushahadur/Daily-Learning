<?php

namespace App\Repositories;

use App\Models\ExploreLanguage;
use App\Repositories\Interfaces\ExploreLanguageRepositoryInterface;

class ExploreLanguageRepository implements ExploreLanguageRepositoryInterface
{
    public function all()
    {
        return ExploreLanguage::orderBy('name', 'ASC')->get();
    }
}
