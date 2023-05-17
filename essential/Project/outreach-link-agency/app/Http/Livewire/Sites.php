<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;
use App\Models\ExploreSite;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Sites extends Component
{
    use WithPagination;
    public $data;
    protected $all_sites;
    public $filterData;
    public $selectedSite;
    public $explore_header;
    public $explore_sub_header;
    public $isSubscriptionActive;
    // public $sitePageView;
    public $viewFormat = 1;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['reloadSites', 'changePageView'];

    public $inputValue;
    public $selectValue;
    public $ServiceSitePrice;

    protected $queryString = ['page', 'viewFormat'];


    public $search = '';
    public $sort;

    public function updatingQueryString($name, $value)
    {
        dd($name);
        if ($name === 'page') {
            return false;
        }
    }

    public function updatedInputValue()
    {
        if ($this->inputValue) {
            $this->selectValue = null;
        }
    }

    public function updatedSelectValue()
    {
        if ($this->selectValue) {
            $this->inputValue = null;
        }
    }

    public function showCampaign($id)
    {
        $exploreSite = ExploreSite::with(['services' => function ($query) {
            $query->orderBy('name', 'ASC');
        }])->findOrFail($id);

        foreach ($exploreSite->services as $item) {
            if ($item->name == 'Guest Posting') {
                $exploreSitePrice = $item->pivot->price;
            }
        }
        $this->selectedSite = $exploreSite;
        $this->ServiceSitePrice = $exploreSitePrice;
    }

    public function reloadSites($search, $sort)
    {
        $query = ExploreSite::with(['services' => function ($query) {
            $query->orderBy('name', 'ASC');
        }, 'categories', 'languages', 'countries', 'hyperlink_type']);
        if ($search) {
            $query->where('domain', 'like', '%' . $search . '%')->orWhere('site_name', 'like', '%' . $search . '%');
            // $this->search = $search;
        }
        if ($sort) {
            if ($sort == 'asc') {
                $query->orderBy('created_at', 'asc');
                $this->sort = $sort;
            }
            if ($sort == 'desc') {
                $query->orderBy('created_at', 'desc');
                $this->sort = $sort;
            }
            if ($sort == 'high_to_low') {
                $service = Service::where('name', 'Guest Posting')->first();
                $query->joinSub(function ($query) use ($service) {
                    $query->from('explore_site_service')
                        ->where('service_id', $service->id)
                        ->selectRaw('explore_site_id, MAX(price) AS price')
                        ->groupBy('explore_site_id');
                }, 'explore_site_service_min', function ($join) {
                    $join->on('explore_site_service_min.explore_site_id', '=', 'explore_sites.id');
                })
                    ->orderBy('explore_site_service_min.price', 'DESC')
                    ->orderBy('explore_sites.id', 'DESC');
                $this->sort = $sort;
            }
            if ($sort == 'low_to_high') {
                $service = Service::where('name', 'Guest Posting')->first();
                $query->joinSub(function ($query) use ($service) {
                    $query->from('explore_site_service')
                        ->where('service_id', $service->id)
                        ->selectRaw('explore_site_id, MIN(price) AS price')
                        ->groupBy('explore_site_id');
                }, 'explore_site_service_min', function ($join) {
                    $join->on('explore_site_service_min.explore_site_id', '=', 'explore_sites.id');
                })
                    ->orderBy('explore_site_service_min.price', 'ASC')
                    ->orderBy('explore_sites.id', 'ASC');
                $this->sort = $sort;
            }
        }

        $this->all_sites = $query->where('is_active', true)->paginate(10);

        $this->resetPage();
        return $this->all_sites;
    }

    public function changePageView($viewFormat)
    {
        $this->viewFormat = $viewFormat;
        // $this->resetPage();
    }


    public function updatingSearch()
    {
        $this->reloadSites($this->search, null);
        $this->resetPage();
    }

    public function mount()
    {
        $this->all_sites = ExploreSite::with(['services' => function ($query) {
            $query->orderBy('name', 'ASC');
        }, 'categories', 'languages', 'countries', 'hyperlink_type'])->where('is_active', true)->paginate(10);
    }

    public function render()
    {
        if ($this->page > 1) {
            if (!$this->isSubscriptionActive) {
                $this->all_sites = [];
                return view('livewire.sites', [
                    'all_sites' => $this->all_sites,
                    'currentPage' => $this->page,
                    'viewFormat' => $this->viewFormat,
                    'isNotSubscribed' => true
                ]);
            }
        }
        if ($this->search || $this->sort) {
            $this->all_sites = $this->reloadSites($this->search, $this->sort);
            return view('livewire.sites', [
                'all_sites' => $this->all_sites,
                'currentPage' => $this->page,
                'viewFormat' => $this->viewFormat,
                'isNotSubscribed' => false
            ]);
        }
        if (empty($this->filterData)) {
            $this->all_sites = ExploreSite::with(['services' => function ($query) {
                $query->orderBy('name', 'ASC');
            }, 'categories', 'languages', 'countries', 'hyperlink_type'])->where('is_active', true)->paginate(10);
            return view('livewire.sites', [
                'all_sites' => $this->all_sites,
                'currentPage' => $this->page,
                'viewFormat' => $this->viewFormat,
                'isNotSubscribed' => false
            ]);
        } else {

            $filterData = $this->filterData;
            $services = Service::pluck('id', 'name');
            $guest_posting = $services['Guest Posting'];
            $link_insertion = $services['Link Insertion'];

            $exploreSite = ExploreSite::with(['services' => function ($query) {
                $query->orderBy('name', 'ASC');
            }, 'categories', 'languages', 'countries', 'hyperlink_type']);

            if (isset($filterData['start_dr'], $filterData['end_dr']) && !is_null($filterData['start_dr']) && !is_null($filterData['end_dr'])) {
                $exploreSite->whereBetween('ahref_domain_rating', [(int)$filterData['start_dr'], (int)$filterData['end_dr']]);
            }
            if (isset($filterData['start_da'], $filterData['end_da']) && !is_null($filterData['start_da']) && !is_null($filterData['end_da'])) {
                $exploreSite->whereBetween('moz_domain_authority', [(int)$filterData['start_da'], (int)$filterData['end_da']]);
            }

            if (!empty($filterData['price'])) {
                $price_range = explode(';', $filterData['price']);
                if ($price_range[1] === '∞') {
                    $exploreSite->whereHas('services', function ($query) use ($price_range, $guest_posting) {
                        $query->where('explore_site_service.service_id', $guest_posting)
                            ->where('explore_site_service.price', '>=', $price_range[0]);
                    });
                } else {
                    $exploreSite->whereHas('services', function ($query) use ($price_range, $guest_posting) {
                        $query->where('explore_site_service.service_id', $guest_posting)
                            ->whereBetween('explore_site_service.price', $price_range);
                    });
                }
            }

            if (!empty($filterData['traffic'])) {
                $traffic_range = explode(';', $filterData['traffic']);
                if ($traffic_range[1] === '∞') {
                    $exploreSite->where('ahref_organic_traffic', '>=', $traffic_range);
                } else {
                    $exploreSite->whereBetween('ahref_organic_traffic', $traffic_range);
                }
            }

            if (isset($filterData['category_id']) && !empty($filterData['category_id'])) {
                $categoryIds = $filterData['category_id'];
                $exploreSite->whereHas('categories', function ($query) use ($categoryIds) {
                    $query->whereIn('explore_category_id', $categoryIds);
                });
            }

            if (isset($filterData['country_id']) && !empty($filterData['country_id'])) {
                $countryIds = $filterData['country_id'];
                $exploreSite->whereHas('countries', function ($query) use ($countryIds) {
                    $query->whereIn('explore_country_id', $countryIds);
                });
            }

            if (isset($filterData['hyperlinks_type_id']) && !empty($filterData['hyperlinks_type_id'])) {
                $hyperlinksTypeIds = $filterData['hyperlinks_type_id'];
                $exploreSite->whereHas('hyperlink_type', function ($query) use ($hyperlinksTypeIds) {
                    $query->whereIn('hyperlink_type_id', $hyperlinksTypeIds);
                });
            }

            if (!empty($filterData['link'])) {
                if ($filterData['link'] === 'yes') {
                    $exploreSite->whereHas('services', function ($query) use ($link_insertion) {
                        $query->where('explore_site_service.service_id', $link_insertion);
                    });
                } else {
                    $exploreSite->whereHas('services', function ($query) use ($link_insertion) {
                        $query->where('explore_site_service.service_id', '!=', $link_insertion);
                    });
                }
            }

            if (!empty($filterData['domain'])) {
                $exploreSite->where('domain', 'LIKE', '%' . $filterData['domain'] . '%');
            }

            $this->all_sites = $exploreSite->where('is_active', true)->paginate(10);
            // dd($this->all_sites);
            return view('livewire.sites', [
                'all_sites' => $this->all_sites,
                'currentPage' => $this->page,
                'viewFormat' => $this->viewFormat,
                'isNotSubscribed' => false
            ]);
        }
    }
}
