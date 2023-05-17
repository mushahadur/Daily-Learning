<?php

namespace App\Repositories\Interfaces;

interface RolePermissionRepositoryInterface{

    public function rollAll();
    public function permissionAll();
    public function findId($id);
    public function storeData($request);
    public function updateData($request, $id);
}
