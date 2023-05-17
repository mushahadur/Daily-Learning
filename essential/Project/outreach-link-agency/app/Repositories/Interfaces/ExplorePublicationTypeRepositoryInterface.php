<?php

namespace App\Repositories\Interfaces;

interface ExplorePublicationTypeRepositoryInterface
{
    public function all();
    public function findById($id);
    public function storeData($request);
    public function updateData($request, $id);
    public function deleteData($id);
}
