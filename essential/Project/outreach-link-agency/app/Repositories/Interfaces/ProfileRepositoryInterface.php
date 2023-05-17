<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\ProfileUpdateRequest;

interface ProfileRepositoryInterface{
    public function authInfo();
    public function findByUser($user);
    public function updateUser(ProfileUpdateRequest $request, $user);
}