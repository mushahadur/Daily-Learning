<?php

namespace App\Repositories\Interfaces\CustomerInterfaces;

interface SubscriptionRepositoryInterface
{
    public function all();
    public function findById($id);
    public function countryView();
    public function viewData($id);
    public function viewMySubscriptionPlan();
    // public function storeData($request);
    // public function updateData($request, $id);
    // public function deleteData($id);
    // public function active($id);
    // public function deactive($id);
}