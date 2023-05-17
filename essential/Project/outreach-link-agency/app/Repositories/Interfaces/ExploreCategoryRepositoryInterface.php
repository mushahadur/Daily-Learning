<?php

namespace App\Repositories\Interfaces;

interface ExploreCategoryRepositoryInterface
{
    public function all();
    public function findById($id);
    public function storeData($request);
    public function updateData($request, $id);
}
