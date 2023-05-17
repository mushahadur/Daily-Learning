<?php
namespace App\Repositories\Interfaces;

interface UserCreateRepositoryInterface{
    public function userAll();
    public function roleAll();
    public function imageResize($request, $user);
    public function storeData($request);
    public function findById($id);
    public function updateData($request, $id);

}
