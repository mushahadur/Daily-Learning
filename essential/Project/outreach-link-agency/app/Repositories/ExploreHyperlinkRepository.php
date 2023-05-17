<?php

namespace App\Repositories;

use App\Models\HyperlinkType;
use App\Repositories\Interfaces\ExploreHyperlinkRepositoryInterface;

class ExploreHyperlinkRepository implements ExploreHyperlinkRepositoryInterface
{
    public function all()
    {
        return HyperlinkType::all();
    }

    public function findById($id)
    {
        return HyperlinkType::findOrFail($id);
    }

    public function storeData($request)
    {
        return HyperlinkType::create($request->validated());
    }

    public function updateData($request, $id)
    {
        $explore_hyperlink = $this->findById($id);
        $explore_hyperlink->name = $request->name;
        $explore_hyperlink->save();
    }

    public function deleteData($id)
    {
        $hyperlink_type = $this->findById($id)->delete();
        return $hyperlink_type;
    }
}
