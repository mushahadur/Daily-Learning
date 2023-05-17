<?php

namespace App\Repositories;

use App\Models\ExplorePublicationType;
use App\Repositories\Interfaces\ExplorePublicationTypeRepositoryInterface;

class ExplorePublicationTypeRepository implements ExplorePublicationTypeRepositoryInterface
{
    public function all()
    {
        return ExplorePublicationType::all();
    }

    public function findById($id)
    {
        return ExplorePublicationType::findOrFail($id);
    }

    public function storeData($request)
    {
        return ExplorePublicationType::create($request->validated());
    }

    public function updateData($request, $id)
    {
        $explore_publication_type = $this->findById($id);
        $explore_publication_type->name = $request->name;
        $explore_publication_type->save();
    }

    public function deleteData($id)
    {
        $publication_type = $this->findById($id)->delete();
        return $publication_type;
    }
}
