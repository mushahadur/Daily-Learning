<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PackageRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Repositories\Interfaces\PackageRepositoryInterface;

class PackageController extends Controller
{
    private $explorePackageRepository;

    public function __construct(PackageRepositoryInterface $packageRepositoryInterface)
    {
        $this->explorePackageRepository = $packageRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $package_list = $this->explorePackageRepository->all();
        return view('admin.pages.packages.index', compact('package_list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.packages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PackageRequest $request)
    {
        $this->explorePackageRepository->storeData($request);
        Alert::success('Congratulation', 'Package Successfully Created');
        return redirect(route('package.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $package_info = $this->explorePackageRepository->viewData($id);
        return Response::json($package_info);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $package = $this->explorePackageRepository->findById($id);
        return view('admin.pages.packages.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PackageRequest $request, string $id)
    {
        $this->explorePackageRepository->updateData($request, $id);
        Alert::success('Congratulation', 'Package sunnessfully udpated');
        return redirect(route('package.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->explorePackageRepository->deleteData($id);
            Alert::success('Success', 'Package Successfully Deleted');
            return back();
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->getCode();

            if ($errorCode === '23000') {
                // Foreign key constraint violation
                Alert::error('error', 'Cannot delete or update the record due to a foreign key constraint.');
            } else {
                // Other database-related errors
                Alert::error('error', 'An error occurred while processing the request.');
            }
            return back();
        }

    }

    // Package active deactive services
    public function active($id)
    {
        $this->explorePackageRepository->active($id);
        Alert::success('Success', 'Package Successfully Activated');
        return redirect()->back();
    }

    public function deactive($id)
    {
        $active = $this->explorePackageRepository->deactive($id);
        if (!$active->is_active) {
            Alert::success('Success', 'Package Successfully Deactivated');
            return redirect()->back();
        }
        Alert::warning('Oops !!', 'Package Is Already Deactive');
        return redirect()->back();
    }
}
