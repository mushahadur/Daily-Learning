<?php

namespace App\Repositories\Interfaces;

interface PackageRepositoryInterface
{
    public function all();
    public function storeData($request);
    public function findById($id);
    public function viewData($id);
    public function updateData($request, $id);
    public function deleteData($id);
    public function active($id);
    public function deactive($id);
}