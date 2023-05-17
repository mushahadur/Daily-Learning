<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ExploreCountryRepositoryInterface;

class ExploreCountryController extends Controller
{
    private $exploreCountryRepository;

    public function __construct(ExploreCountryRepositoryInterface $exploreCountryRepository)
    {
        $this->exploreCountryRepository = $exploreCountryRepository;
    }

    public function __invoke()
    {
        $explore_countries = $this->exploreCountryRepository->all();
        return view('admin.pages.explore_country.index', get_defined_vars());
    }
}
