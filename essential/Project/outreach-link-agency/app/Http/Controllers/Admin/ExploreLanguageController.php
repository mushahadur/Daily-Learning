<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ExploreLanguageRepositoryInterface;

class ExploreLanguageController extends Controller
{
    private $exploreLanguageRepository;

    public function __construct(ExploreLanguageRepositoryInterface $exploreLanguageRepository)
    {
        $this->exploreLanguageRepository = $exploreLanguageRepository;
    }

    public function __invoke()
    {
        $explore_languages = $this->exploreLanguageRepository->all();
        // dd($explore_languages);
        return view('admin.pages.explore_language.index', get_defined_vars());
    }
}
