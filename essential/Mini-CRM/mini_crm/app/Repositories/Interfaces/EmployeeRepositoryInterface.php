<?php

namespace App\Repositories\Interfaces;

interface EmployeeRepositoryInterface
{
    public function All();
    public function CompanyAllData();
    public function findById($id);
    public function requestValidate($request);
    public function storeData($request);
    public function updateData($request, $id);
    public function delete($id);
}
