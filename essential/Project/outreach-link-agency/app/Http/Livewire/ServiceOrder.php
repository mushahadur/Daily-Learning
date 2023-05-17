<?php

namespace App\Http\Livewire;

use App\Models\Campaign;
use App\Models\Service;
use Livewire\Component;
use App\Models\ServiceBuyContent;
use App\Models\ExploreServiceOrder;
use App\Models\ExploreServiceOrderDetails;
use App\Models\ExploreSite;
use Illuminate\Support\Facades\Auth;
use App\Models\ServiceBuyContentWordLength;
use App\Rules\CampaignExist;
use App\Rules\CheckSameHost;
use App\Rules\UniqueDomain;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceOrder extends Component
{
    public $search;
    public $explore_site;
    public $service;
    public $buyContent;
    public $wordLength;
    public $getContentWordLength = null;
    public $getContentWordPrice = 0;
    public $grandTotal;
    public $buyContentWordLength;
    public $content;
    public $specialInstruction;
    public $service_type;
    public $orderId;

    public $orderData = [
        'content' => [
            'title' => '',
            'anchor_text' => '',
            'landing_page' => '',
            'topic' => '',
            'post_url' => ''
        ]

    ];

    protected $messages = [
        'orderData.content.title.required' => 'Title cannot be empty.',
        'orderData.content.anchor_text.required' => 'Anchor Text cannot be empty.',
        'orderData.content.landing_page.required' => 'Landing Page cannot be empty.',
        'orderData.content.landing_page.url' => 'Landing Page must be url.',
        'orderData.content.post_url.required' => 'Post url field cannot be empty.',
        'orderData.content.post_url.url' => 'Post url must be url.',
        'content.required' => 'Article Content cannot be empty.',
        'specialInstruction.required' => 'instruction field cannot be empty.',
    ];

    protected $queryString = ['search', 'service', 'buyContent', 'wordLength'];

    // public function getPrice($id)
    // {
    //     $this->getContentWordLength = ServiceBuyContentWordLength::findOrFail($id);
    //     if (!is_null($this->getContentWordLength)) {
    //         $this->getContentWordPrice = $this->getContentWordLength->price;
    //     }
    // }

    public function updatedBuyContent()
    {
        // if ($this->buyContent == 'none') {
        //     $this->clearWordLength();
        // }
        return redirect()->to(route('order.create', ['exploreSite' => $this->explore_site, 'service' => $this->service, 'buyContent' => $this->buyContent]));
    }
    public function updatedWordLength()
    {
        $this->getContentWordLength = ServiceBuyContentWordLength::findOrFail($this->wordLength);
        if (!is_null($this->getContentWordLength)) {
            $this->getContentWordPrice = $this->getContentWordLength->price;
        }
    }

    public function updatedService()
    {
        // Remove all query strings from the URL
        return redirect()->to(route('order.create', ['exploreSite' => $this->explore_site, 'service' => $this->service]));
    }

    public function clearWordLength()
    {
        $this->wordLength = '';
        $this->getContentWordLength = null;
        $this->getContentWordPrice = 0;
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        foreach ($this->explore_site->services as $item) {
            if ($item->id == $this->service)
                $this->grandTotal = $item->pivot->price + $this->getContentWordPrice;
        }
    }

    public function submit()
    {
        // dd($this->wordLength);
        if (is_null($this->orderId)) {
            if ($this->service_type[$this->service] == 'Guest Posting' && $this->buyContent == 'none') {
                $validatedData = $this->validate([
                    'orderData.content.title' => 'required',
                    'orderData.content.anchor_text' => 'required',
                    'orderData.content.landing_page' => ['required', 'url', new UniqueDomain($this->explore_site->id)],
                    'content' => ['required', new CheckSameHost($this->orderData['content']['landing_page'], $this->orderData['content']['anchor_text'])]
                ]);
            } elseif ($this->service_type[$this->service] == 'Guest Posting' && $this->buyContent != 'none') {
                $validatedData = $this->validate([
                    'orderData.content.anchor_text' => 'required',
                    'orderData.content.landing_page' => ['required', 'url', new UniqueDomain($this->explore_site->id)],
                    'wordLength' => 'required'
                ]);
            } elseif ($this->service_type[$this->service] == 'Link Insertion') {
                $validatedData = $this->validate([
                    'orderData.content.post_url' => ['required', new UniqueDomain($this->explore_site->id)],
                    'orderData.content.anchor_text' => 'required',
                    'orderData.content.landing_page' => ['required', 'url', new UniqueDomain($this->explore_site->id)],
                    'specialInstruction' => 'required'
                ]);
            }
        } else {
            $service_order = ExploreServiceOrder::with('campaign')->findOrFail($this->orderId);
            // dd($service_order);
            if ($this->service_type[$this->service] == 'Guest Posting' && $this->buyContent == 'none') {
                $validatedData = $this->validate([
                    'orderData.content.title' => 'required',
                    'orderData.content.anchor_text' => 'required',
                    'orderData.content.landing_page' => ['required', 'url', new CampaignExist($this->orderData['content']['landing_page'], $service_order)],
                    'content' => 'required'
                ]);
            } elseif ($this->service_type[$this->service] == 'Guest Posting' && $this->buyContent != 'none') {
                $validatedData = $this->validate([
                    'orderData.content.anchor_text' => 'required',
                    'orderData.content.landing_page' => ['required', 'url', new CampaignExist($this->orderData['content']['landing_page'], $service_order)],
                ]);
            } elseif ($this->service_type[$this->service] == 'Link Insertion') {
                $validatedData = $this->validate([
                    'orderData.content.post_url' => ['required'],
                    'orderData.content.anchor_text' => 'required',
                    'orderData.content.landing_page' => ['required', 'url', new CampaignExist($this->orderData['content']['landing_page'], $service_order)],
                    'specialInstruction' => 'required'
                ]);
            }
        }

        $campaign = Campaign::where('name', $this->orderData['content']['landing_page'])->first();
        // dd($campaign);
        if (is_null($campaign)) {
            // dd('done');
            $campaign = new Campaign([
                'name' => $this->orderData['content']['landing_page'],
                'user_id' => Auth::user()->id,
            ]);
            $campaign->save();
            $campaign->exploreSites()->syncWithoutDetaching($this->explore_site->id);
        } else {
            $hasExploreSite = $campaign->exploreSites()->where('explore_site_id', $this->explore_site->id)->exists();
            if (!$hasExploreSite) {
                $campaign->exploreSites()->syncWithoutDetaching($this->explore_site->id);
            }
        }

        if (is_null($this->orderId)) {
            $service_order = new ExploreServiceOrder();
            $service_order->reference_id = time() . rand(10 * 45, 100 * 98);
            $service_order->user_id = Auth::id();
            $service_order->exploresite_id = $this->explore_site->id;
            $service_order->campaign_id = $campaign->id;
            $service_order->service_buy_content_word_length_id = $this->wordLength;
            $service_order->status = 'Draft';
            $service_order->total_price = $this->grandTotal;
            $service_order->grand_total = $this->grandTotal;
            $service_order->payment_status = 'Not Paid';
            $saved = $service_order->save();
        } else {
            $service_order = ExploreServiceOrder::findOrFail($this->orderId);
            // $service_order->reference_id = time() . rand(10 * 45, 100 * 98);
            // $service_order->user_id = Auth::id();
            // $service_order->exploresite_id = $this->explore_site->id;
            // $service_order->campaign_id = $campaign->id;
            $service_order->service_buy_content_word_length_id = $this->wordLength;
            $service_order->status = 'Draft';
            $service_order->total_price = $this->grandTotal;
            $service_order->grand_total = $this->grandTotal;
            $service_order->payment_status = 'Not Paid';
            $saved = $service_order->update();
        }
        if ($saved) {
            $order_details = new ExploreServiceOrderDetails();
            $order_details->explore_service_order_id = $service_order->id;
            $order_details->service_id = $this->service;
            $order_details->title = $this->orderData['content']['title'];
            $order_details->anchor_text = $this->orderData['content']['anchor_text'];
            $order_details->landing_page = $this->orderData['content']['landing_page'];
            $order_details->topic = $this->orderData['content']['topic'];
            $order_details->post_url = $this->orderData['content']['post_url'];
            $order_details->content = $this->content;
            $order_details->specialInstruction = $this->specialInstruction;
            $order_details->save();
        }


        $this->reset();
        return redirect()->route('order.checkout', $service_order->id);
    }

    public function render()
    {
        // Set default value for 'service' query string parameter
        if (empty($this->service) && !empty($this->explore_site->services)) {
            foreach ($this->explore_site->services as $item) {
                if ($item->name === 'Guest Posting') {
                    $this->service = $item->id;
                }
            }
        }

        if (empty($this->buyContent)) {
            $is_guest_posting = Service::findOrFail($this->service);
            if (!is_null($is_guest_posting) && $is_guest_posting->name === 'Guest Posting') {
                $this->buyContent = 'none';
            }
        }
        if (!empty($this->wordLength)) {
            $this->updatedWordLength();
        }

        $this->calculateTotal();

        $this->service_type = Service::orderBy('name')->pluck('name', 'id');
        $serviceBuyContent = ServiceBuyContent::all();
        $serviceBuyContentWordLength = ServiceBuyContentWordLength::where('service_buy_content_id', $this->buyContent)->orderBy('length', 'ASC')->get();
        return view('livewire.service-order', compact('serviceBuyContent', 'serviceBuyContentWordLength'));
    }
}
