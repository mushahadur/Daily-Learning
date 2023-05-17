<?php

namespace App\Http\Controllers\Admin;

use Response;
use App\Models\ExploreSite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HyperlinkType;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ExploreHyperlinkRequest;
use App\Repositories\Interfaces\ExploreHyperlinkRepositoryInterface;

class ExploreHyperlinkController extends Controller
{
    private $exploreHyperlinkRepository;

    public function __construct(ExploreHyperlinkRepositoryInterface $exploreHyperlinkRepository)
    {
        $this->exploreHyperlinkRepository = $exploreHyperlinkRepository;
    }

    public function index()
    {
        $explore_hyperlink = $this->exploreHyperlinkRepository->all();
        return view('admin.pages.explore_hyperlink.index', ['explore_hyperlink' => $explore_hyperlink]);
    }

    public function store(ExploreHyperlinkRequest $request)
    {
        $this->exploreHyperlinkRepository->storeData($request);
        Alert::success('Success', 'Hyperlink type successfully created');
        return redirect()->back();
    }

    public function edit($id)
    {
        $explore_hyperlink = $this->exploreHyperlinkRepository->findById($id);
        return Response::json($explore_hyperlink);
    }

    public function update(ExploreHyperlinkRequest $request, $id)
    {
        $this->exploreHyperlinkRepository->updateData($request, $id);
        Alert::success('Success', 'Hyperlink type successfully updated');
        return redirect()->back();
    }

    public function destroy(HyperlinkType $explore_hyperlink_type)
    {
        $explore_hyperlink_type->delete();
        Alert::success('Success', 'Hyperlink type successfully deleted');
        return redirect()->back();
    }
}
