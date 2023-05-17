<?php

namespace App\Http\Controllers\Customer;

use Carbon\Carbon;
use App\Models\Service;
use App\Models\Campaign;
use App\Models\Subscriber;
use App\Models\ExploreSite;
use Illuminate\Http\Request;
use App\Models\ExploreHeader;
use App\Models\ExploreCategory;
use App\Models\ExploreSubHeader;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ExploreSiteRepository;
use App\Repositories\Interfaces\ExploreSiteRepositoryInterface;

class SiteController extends Controller
{
    private $exploreSiteRepository;

    public function __construct(ExploreSiteRepositoryInterface $exploreSiteRepository)
    {
        $this->exploreSiteRepository = $exploreSiteRepository;
    }

    public function index(Request $request)
    {
        $filterData = $request->all();
        $filterData = collect($request->all())->except(['viewFormat', 'page'])->toArray();
        $explore_header = ExploreHeader::where('is_active', 1)->first();
        $explore_sub_header = ExploreSubHeader::where('is_active', 1)->get();
        $data = $this->exploreSiteRepository->pluckNameId();
        $subscription_type = Subscriber::where('user_id', Auth::id())->first();
        $currentDateTime = Carbon::parse($subscription_type->active_until);
        $diffInDays = $currentDateTime->diffInDays(Carbon::now());
        if (!is_null($subscription_type) && $subscription_type->status && $diffInDays > 0) {
            $isSubscriptionActive = true;
        } else {
            $isSubscriptionActive = false;
        }
        return view('customer.pages.explore_site.index', compact('filterData', 'isSubscriptionActive', 'explore_header', 'explore_sub_header', 'data'));
    }

    public function show(ExploreSite $exploreSite)
    {
        $exploreSite->load('explore_publication_type', 'hyperlink_type', 'categories', 'countries', 'languages', 'services');
        return view('customer.pages.explore_site.show', compact('exploreSite'));
    }

    public function filter(Request $request)
    {
        $filterData = $request->all();
        $test = explode(';', $filterData['price']);

        $explore_header = ExploreHeader::where('is_active', 1)->first();
        $explore_sub_header = ExploreSubHeader::where('is_active', 1)->get();
        $data = $this->exploreSiteRepository->pluckNameId();
        $subscription_type = Subscriber::where('user_id', Auth::id())->first();
        $currentDateTime = Carbon::parse($subscription_type->active_until);
        $diffInDays = $currentDateTime->diffInDays(Carbon::now());
        if (!is_null($subscription_type) && $subscription_type->status && $diffInDays > 0) {
            $isSubscriptionActive = true;
        } else {
            $isSubscriptionActive = false;
        }
        return view('customer.pages.explore_site.index', compact('filterData', 'isSubscriptionActive', 'explore_header', 'explore_sub_header', 'data'));
    }
}
