<?php

namespace App\Repositories;

use App\Models\ExploreHeader;
use RealRashid\SweetAlert\Facades\Alert;
use App\Repositories\Interfaces\ExploreHeaderRepositoryInterface;

class ExploreHeaderRepository implements ExploreHeaderRepositoryInterface
{
    public function all()
    {
        return ExploreHeader::all();
    }

    public function findById($id)
    {
        return ExploreHeader::findOrFail($id);
    }

    public function storeData($request)
    {
        return ExploreHeader::create($request->validated());
    }

    public function updateData($request, $id)
    {
        $explore_header = $this->findById($id);
        if (!empty($explore_header)) {
            $explore_header->title = $request->title;
            $explore_header->description = $request->description;
            $explore_header->save();
        }
    }

    public function active($id)
    {
        $active = ExploreHeader::where('is_active', 1)->first();
        if (!is_null($active)) {
            $active->is_active = 0;
            $active->save();
        }
        $header = $this->findById($id);
        $header->is_active = 1;
        $header->update();
    }

    public function deactive($id)
    {
        $active = $this->findById($id);

        if ($active->is_active) {
            $active->is_active = 0;
            $active->save();
        }
        return $active;
    }
}
