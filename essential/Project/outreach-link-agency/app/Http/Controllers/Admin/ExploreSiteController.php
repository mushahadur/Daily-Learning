<?php

namespace App\Http\Controllers\Admin;

use App\Models\ExploreSite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ExploreSiteRequest;
use App\Models\Service;
use App\Repositories\Interfaces\ExploreSiteRepositoryInterface;

class ExploreSiteController extends Controller
{
    private $exploreSiteRepository;

    public function __construct(ExploreSiteRepositoryInterface $exploreSiteRepository)
    {
        $this->exploreSiteRepository = $exploreSiteRepository;
    }

    public function index()
    {
        $explore_sites = $this->exploreSiteRepository->all();
        // dd($explore_sites);
        return view('admin.pages.explore_site.index', get_defined_vars());
    }

    public function create()
    {
        $data = $this->exploreSiteRepository->pluckNameId();
        // dd($data);
        return view('admin.pages.explore_site.create', get_defined_vars());
    }

    // public function store(Request $request)
    public function store(ExploreSiteRequest $request)
    {
        // dd($request->all());
        $this->exploreSiteRepository->storeData($request);
        Alert::success('Congratulation', 'Explore Site Successfully Created');
        return redirect()->route('explore_site.index');
    }

    public function show(ExploreSite $exploreSite)
    {
        $exploreSite->load('explore_publication_type', 'hyperlink_type', 'categories', 'countries', 'languages', 'services');
        // dd($exploreSite);
        return view('admin.pages.explore_site.show', get_defined_vars());
    }
    public function edit($id)
    {
        $data = $this->exploreSiteRepository->pluckNameId();
        $exploreSite = $this->exploreSiteRepository->findById($id);

        $services = Service::get()->map(function ($service) use ($exploreSite) {
            $service->value = data_get($exploreSite->services->firstWhere('id', $service->id), 'pivot.price') ?? null;
            return $service;
        });
        // dd($data);
        // dd($exploreSite);
        // dd($services);
        return view('admin.pages.explore_site.edit', get_defined_vars());
    }

    public function update(ExploreSiteRequest $request, $id)
    {
        $this->exploreSiteRepository->updateData($request, $id);
        Alert::success('Congratulation', 'Explore Site Successfully Updated');
        return redirect()->route('explore_site.index');
    }

    public function destroy(ExploreSite $exploreSite)
    {
        $exploreSite->delete();
        Alert::success('Congratulation', 'Header Successfully Deleted');
        return redirect()->back();
    }

    public function active($id)
    {
        $this->exploreSiteRepository->active($id);
        Alert::success('Success', 'Explore Site Successfully Activated');
        return redirect()->back();
    }

    public function deactive($id)
    {
        $active = $this->exploreSiteRepository->deactive($id);
        if (!$active->is_active) {
            Alert::success('Success', 'Package Successfully Deactivated');
            return redirect()->back();
        }
        Alert::warning('Oops !!', 'Package Is Already Deactive');
        return redirect()->back();
    }
}
