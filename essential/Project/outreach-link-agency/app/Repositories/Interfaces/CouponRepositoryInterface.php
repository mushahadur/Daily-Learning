<?php

namespace App\Repositories\Interfaces;

interface CouponRepositoryInterface
{
    public function couponAll();
    public function couponCreate();
    public function exploreData();
    public function requestValidate($request);
    public function storeData($request);
    public function editData($id);
    public function findById($id);
    public function updateData($request, $id);
}
