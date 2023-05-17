<?php

namespace App\Http\Controllers\Admin;

use Response;
use App\Models\ExploreCategory;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ExploreCategoryRequest;
use App\Repositories\Interfaces\ExploreCategoryRepositoryInterface;

class ExploreCategoryController extends Controller
{

    private $exploreCategoryRepository;

    public function __construct(ExploreCategoryRepositoryInterface $exploreCategoryRepository)
    {
        $this->exploreCategoryRepository = $exploreCategoryRepository;
    }

    public function index()
    {
        $explore_headers = $this->exploreCategoryRepository->all();
        return view('admin.pages.explore_category.index', ['explore_headers' => $explore_headers]);
    }

    public function store(ExploreCategoryRequest $request)
    {
        $this->exploreCategoryRepository->storeData($request);
        Alert::success('Congratulation', 'Category Successfully Created');
        return redirect()->back();
    }

    public function edit($id)
    {
        $explore_header = $this->exploreCategoryRepository->findById($id);
        return Response::json($explore_header);
    }

    public function update(ExploreCategoryRequest $request, $id)
    {
        $this->exploreCategoryRepository->updateData($request, $id);
        Alert::success('Congratulation', 'Category Successfully Updated');
        return redirect()->back();
    }

    public function destroy(ExploreCategory $exploreCategory)
    {
        $exploreCategory->delete();
        Alert::success('Congratulation', 'Category Successfully Deleted');
        return redirect()->back();
    }
}
