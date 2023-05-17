<?php

namespace App\Http\Controllers\Admin;

use Response;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Admin\ExploreServiceRequest;

class ExploreServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.pages.explore_service.index', get_defined_vars());
    }

    public function edit($id)
    {
        $explore_service = $this->findById($id);
        return Response::json($explore_service);
    }

    public function update(ExploreServiceRequest $request, $id)
    {
        $explore_service = $this->findById($id);
        if (!empty($explore_service)) {
            $explore_service->price = $request->price;
            $explore_service->update();
        }
        Alert::success('Congratulation', 'Price Successfully Updated');
        return redirect()->back();
    }

    public function findById($id)
    {
        return Service::findOrFail($id);
    }
}
