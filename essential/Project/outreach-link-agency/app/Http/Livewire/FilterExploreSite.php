<?php

namespace App\Http\Livewire;

use App\Repositories\ExploreSiteRepository;
use Livewire\Component;

class FilterExploreSite extends Component
{
    public $search;
    public $sort;
    public $range_DA;
    public $range_DR;
    public $range_price;
    public $range_traffic;
    public $category_id;
    public $country_id;
    public $hyperlinks_type_id;
    public $link_insertion;
    public $viewFormat;


    public function render()
    {
        $data = (new ExploreSiteRepository)->pluckNameId();
        return view('livewire.filter-explore-site', ['data' => $data, 'viewFormat' => $this->viewFormat]);
    }

    public function updatedViewFormat()
    {
        $this->emitUp('changePageView', $this->viewFormat);
    }

    public function filter()
    {
        $this->emitTo('sites', 'reloadSites', $this->search, $this->sort);
    }
}
