<?php

namespace App\Http\Controllers\Admin;

use Response;
use App\Http\Controllers\Controller;
use App\Models\ExplorePublicationType;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ExplorePublicationTypeRequest;
use App\Repositories\Interfaces\ExplorePublicationTypeRepositoryInterface;

class PublicationTypeController extends Controller
{
    private $explorePublicationRepository;

    public function __construct(ExplorePublicationTypeRepositoryInterface $explorePublicationRepository)
    {
        $this->explorePublicationRepository = $explorePublicationRepository;
    }

    public function index()
    {
        $explore_publication_type = $this->explorePublicationRepository->all();
        return view('admin.pages.explore_publication.index', ['explore_publication_type' => $explore_publication_type]);
    }

    public function store(ExplorePublicationTypeRequest $request)
    {
        $this->explorePublicationRepository->storeData($request);
        Alert::success('Congratulation', 'Publication type successfully created');
        return redirect()->back();
    }

    public function edit($id)
    {
        $explore_publication_type = $this->explorePublicationRepository->findById($id);
        return Response::json($explore_publication_type);
    }

    public function update(ExplorePublicationTypeRequest $request, $id)
    {
        $this->explorePublicationRepository->updateData($request, $id);
        Alert::success('Congratulation', 'Publication type successfully updated');
        return redirect()->back();
    }

    public function destroy(ExplorePublicationType $explore_publication_type)
    {
        $explore_publication_type->delete();
        Alert::success('Success', 'Publication type successfully deleted');
        return redirect()->back();
    }
}
