<?php

namespace App\Http\Controllers\Admin;

use Response;
use App\Models\ExploreSubHeader;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ExploreSubHeaderRequest;
use App\Repositories\Interfaces\ExploreSubHeaderRepositoryInterface;

class ExploreSubHeaderController extends Controller
{
    private $exploreSubHeaderRepository;

    public function __construct(ExploreSubHeaderRepositoryInterface $exploreSubHeaderRepository)
    {
        $this->exploreSubHeaderRepository = $exploreSubHeaderRepository;
    }

    public function index()
    {
        $explore_sub_headers = $this->exploreSubHeaderRepository->all();
        // dd($explore_headers);
        return view('admin.pages.explore_sub_header.index', get_defined_vars());
    }

    public function store(ExploreSubHeaderRequest $request)
    {
        // dd($request->all());
        $this->exploreSubHeaderRepository->storeData($request);
        Alert::success('Congratulation', 'Sub Header Successfully Created');
        return redirect()->back();
    }

    public function edit($id)
    {
        $explore_sub_header = $this->exploreSubHeaderRepository->findById($id);
        return Response::json($explore_sub_header);
    }

    public function update(ExploreSubHeaderRequest $request, $id)
    {
        $this->exploreSubHeaderRepository->updateData($request, $id);
        Alert::success('Congratulation', 'Sub Header Successfully Updated');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $deleted = $this->exploreSubHeaderRepository->destroy($id);
        if ($deleted) {
            Alert::success('Congratulation', 'Sub Header Successfully Deleted');
        } else {
            Alert::error('Error', 'Sub Header failed to Delete');
        }
        return redirect()->back();
    }
    public function active($id)
    {
        $this->exploreSubHeaderRepository->active($id);
        Alert::success('Congratulation', 'Sub Header Successfully Activated');
        return redirect()->back();
    }

    public function deactive($id)
    {
        $active = $this->exploreSubHeaderRepository->deactive($id);
        if (!$active->is_active) {
            Alert::success('Congratulation', 'Sub Header Successfully Deactivated');
            return redirect()->back();
        }
        Alert::warning('Oops !!', 'Header Is Already Deactive');
        return redirect()->back();
    }
}
