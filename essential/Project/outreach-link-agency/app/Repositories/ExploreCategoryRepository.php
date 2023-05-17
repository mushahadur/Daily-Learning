<?php

namespace App\Repositories;

use App\Models\ExploreCategory;
use App\Repositories\Interfaces\ExploreCategoryRepositoryInterface;

class ExploreCategoryRepository implements ExploreCategoryRepositoryInterface
{
    public function all()
    {
        return ExploreCategory::all();
    }

    public function findById($id)
    {
        return ExploreCategory::findOrFail($id);
    }

    public function storeData($request)
    {
        return ExploreCategory::create($request->validated());
    }


    public function updateData($request, $id)
    {
        $explore_header = $this->findById($id);
        $explore_header->name = $request->name;
        $explore_header->save();
    }
}
