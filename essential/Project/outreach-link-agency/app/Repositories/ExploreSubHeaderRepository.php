<?php

namespace App\Repositories;

use App\Models\ExploreSubHeader;
use App\Repositories\Interfaces\ExploreSubHeaderRepositoryInterface;

class ExploreSubHeaderRepository implements ExploreSubHeaderRepositoryInterface
{
    public function all()
    {
        return ExploreSubHeader::all();
    }

    public function findById($id)
    {
        return ExploreSubHeader::findOrFail($id);
    }

    public function storeData($request)
    {
        return ExploreSubHeader::create($request->validated());
    }

    public function updateData($request, $id)
    {
        $explore_sub_header = $this->findById($id);
        if (!empty($explore_sub_header)) {
            $explore_sub_header->title = $request->title;
            $explore_sub_header->description = $request->description;
            $explore_sub_header->save();
        }
    }

    public function active($id)
    {
        $active = $this->findById($id);
        if ($active->is_active == 0) {
            $active->is_active = 1;
            $active->save();
        }
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

    public function destroy($id)
    {
        $sub_header = $this->findById($id)->delete();
        return $sub_header;
    }
}
