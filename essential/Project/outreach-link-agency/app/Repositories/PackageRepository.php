<?php

namespace App\Repositories;

use App\Http\Requests\PackageRequest;
use App\Models\Package;
use App\Repositories\Interfaces\PackageRepositoryInterface;

class PackageRepository implements PackageRepositoryInterface
{
    public function all()
    {
        return Package::orderBy('created_at', 'DESC')->get();
    }

    public function findById($id)
    {
        return Package::findOrFail($id);
    }

    public function storeData($request)
    {
        return Package::create($request->validated());
    }

    public function viewData($id)
    {
        $package_info = $this->findById($id);
        return $package_info;
    }

    public function updateData($request, $id)
    {
        $package = $this->findById($id);
        return $package->update($request->validated());
    }

    public function deleteData($id)
    {
        $package = $this->findById($id)->delete();
        return $package;
    }

    public function active($id)
    {
        $active = $this->findById($id);
        if ($active->is_active == 0) {
            $active->is_active = 1;
            $active->save();
        }
    }

    public function deactive($id)
    {
        $active = $this->findById($id);
        if ($active->is_active == 1) {
            $active->is_active = 0;
            $active->save();
        }
        return $active;
    }
}
