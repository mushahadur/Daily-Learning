<?php

namespace App\Repositories\Interfaces;

interface CompanyRepositoryInterface
{
    public function All();
    public function Create();
    public function requestValidate($request);
    public function requestValidateForUpdate($request);
    public function storeData($request);
    public function findById($id);
    public function updateData($request, $id);
    public function delete($id);
}
