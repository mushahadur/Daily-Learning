<?php

namespace App\Repositories;

use App\Models\ExploreSite;
use App\Models\ExploreCountry;
use App\Models\ExploreCategory;
use App\Models\HyperlinkType;
use App\Models\ExploreLanguage;
use App\Models\ExplorePublicationType;
use App\Models\Service;
use App\Repositories\Interfaces\ExploreSiteRepositoryInterface;

class ExploreSiteRepository implements ExploreSiteRepositoryInterface
{
    public function all()
    {
        return ExploreSite::with('explore_publication_type')->orderBy('created_at', 'DESC')->get();
    }
    public function findById($id)
    {
        return ExploreSite::with('hyperlink_type', 'categories', 'countries', 'languages', 'services')->findOrFail($id);
    }
    public function storeData($request)
    {

        $exploreSite = ExploreSite::create($request->validated());
        $exploreSite->categories()->sync($request->input('category_id', []));
        $exploreSite->countries()->sync($request->input('country_id', []));
        $exploreSite->languages()->sync($request->input('language_id', []));
        $exploreSite->hyperlink_type()->sync($request->input('hyperlinks_type_id', []));
        $service_types = collect($request->input('service-type', []))
            ->map(function ($service_type) {
                return ['price' => $service_type];
            });
        $exploreSite->services()->sync($service_types);
        // dd($service_types);
        return $exploreSite;
    }
    public function updateData($request, $id)
    {
        $exploreSite = $this->findById($id);
        $exploreSite->update($request->validated());
        $service_types = collect($request->input('service-type', []))
            ->map(function ($service_type) {
                return ['price' => $service_type];
            });
        $exploreSite->services()->sync($service_types);
        // dd($request->all());
        return $exploreSite;
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
    public function pluckNameId()
    {
        $data = [
            'supported_languages' => ExploreLanguage::orderBy('name', 'ASC')->pluck('name', 'id'),
            'categories' => ExploreCategory::orderBy('name', 'ASC')->pluck('name', 'id'),
            'countries' => ExploreCountry::orderBy('name', 'ASC')->pluck('name', 'id'),
            'publication_type' => ExplorePublicationType::all()->pluck('name', 'id'),
            'hyperlinks_type' => HyperlinkType::all()->pluck('name', 'id'),
            'service_type' => Service::orderBy('name', 'ASC')->pluck('name', 'id')
        ];
        return $data;
    }
}
