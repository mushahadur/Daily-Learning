<?php

namespace App\Repositories\Interfaces;

interface ExploreSiteRepositoryInterface
{
    public function all();
    public function findById($id);
    public function storeData($request);
    public function updateData($request, $id);
    public function active($id);
    public function deactive($id);
    public function pluckNameId();
}
