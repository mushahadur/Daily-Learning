<?php

namespace App\Http\Controllers\Admin;

use Response;
use App\Models\ExploreHeader;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ExploreHeaderRequest;
use App\Repositories\Interfaces\ExploreHeaderRepositoryInterface;

class ExploreHeaderController extends Controller
{
    private $exploreHeaderRepository;

    public function __construct(ExploreHeaderRepositoryInterface $exploreHeaderRepository)
    {
        $this->exploreHeaderRepository = $exploreHeaderRepository;
    }

    public function index()
    {
        $explore_headers = $this->exploreHeaderRepository->all();
        return view('admin.pages.explore_header.index', ['explore_headers' => $explore_headers]);
    }

    public function store(ExploreHeaderRequest $request)
    {
        $this->exploreHeaderRepository->storeData($request);
        Alert::success('Congratulation', 'Header Successfully Created');
        return redirect()->back();
    }

    public function edit($id)
    {
        $explore_header = $this->exploreHeaderRepository->findById($id);
        return Response::json($explore_header);
    }

    public function update(ExploreHeaderRequest $request, $id)
    {
        $this->exploreHeaderRepository->updateData($request, $id);
        Alert::success('Congratulation', 'Header Successfully Updated');
        return redirect()->back();
    }

    public function destroy(ExploreHeader $exploreHeader)
    {
        $exploreHeader->delete();
        Alert::success('Congratulation', 'Header Successfully Deleted');
        return redirect()->back();
    }
    public function active($id)
    {
        $this->exploreHeaderRepository->active($id);
        Alert::success('Congratulation', 'Header Successfully Activated');
        return redirect()->back();
    }

    public function deactive($id)
    {
        $active = $this->exploreHeaderRepository->deactive($id);
        if (!$active->is_active) {
            Alert::success('Congratulation', 'Header Successfully Deactivated');
            return redirect()->back();
        }
        Alert::warning('Oops !!', 'Header Is Already Deactive');
        return redirect()->back();
    }
}
