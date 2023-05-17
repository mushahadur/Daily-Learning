<div>
    <!--  Site Header & Sub Headers -->
    @if (!is_null($explore_header))
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="text-center border-0" style="padding: 15px 10px 0px 10px">
                        <h4 class="m-auto mb-2">
                            {{ $explore_header->description }}
                        </h4>
                        <div class="row">
                            @foreach ($explore_sub_header as $all_site)
                                <div class="col-lg-4 my-1">
                                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                                        <div class="card card-body my-2">
                                            <span class="explore_site_title" style="font-weight: 700; color: #55729e;">
                                                {{ $all_site->title }}
                                            </span>
                                            <span style="text-align: start">{{ $all_site->description }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <span style="align-items: flex-end">
                            <button class="btn mt-2 mb-4" type="button" data-bs-toggle="collapse"
                                data-bs-target=".multi-collapse" aria-expanded="false"
                                aria-controls="multiCollapseExample1 multiCollapseExample2"
                                style="color: #55729e; font-size: 16px">
                                <i class="fas fa-chevron-circle-down"></i>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (!$isNotSubscribed)
        <!--  Search, Sort & Filter -->
        <div class="row">
            <div class="col-md-5">
                <div class="mb-3">
                    <div class="search-box ms-2">
                        <div class="position-relative">
                            <input wire:model="search" type="text" class="form-control rounded border-0"
                                placeholder="Search sites" />
                            <i class="mdi mdi-magnify search-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <livewire:filter-explore-site :viewFormat="$viewFormat" />
            </div>
        </div>



        <!-- Site List -->
        @if ($viewFormat == 1)
            <div class="row">
                @foreach ($all_sites as $item)
                    <div class="col-xl-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="flex-grow-1 align-self-center">
                                        <div class="d-flex">
                                            @foreach ($item->services as $service)
                                                <span class="text-truncate font-size-12 mb-1 pe-2 ps-2 me-2"
                                                    style="background-color: #55729e; border-radius: 25px; color: aliceblue"><i
                                                        class="bx bxs-select-multiple">
                                                        {{ $service->name }} </i> </span>
                                            @endforeach
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mt-3">
                                                            <div class="my-2" style="display: grid">
                                                                <a href="{{ $item->domain_url }}" target="_blank"
                                                                    style="font-weight: 700; font-size: 18px">{{ $item->domain }}</a>
                                                                <span
                                                                    style="font-family: 'Cambria', 'Cochin', 'Georgia', 'Times', 'Times New Roman', 'serif'">{{ $item->site_name }}</span>
                                                            </div>
                                                            <div class="mt-3">
                                                                @foreach ($item->categories as $category)
                                                                    <span
                                                                        class="custome-explore">{{ $category->name }}</span>
                                                                @endforeach
                                                            </div>
                                                            <div class="mt-3">
                                                                <a href="{{ route('sites.show', $item) }}"
                                                                    style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"
                                                                    target="_blank"><i class="uil-exclamation-circle"
                                                                        style="font: bold"> View Site Info </i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-3" style="column-count: 2">
                                                        <p style="margin-bottom: 1rem">
                                                            <small class="text-style me-2"><i class="fas fa-crown"></i>
                                                                Domain
                                                                Authority</small>
                                                            <span class="badge bg-soft-success font-size-14"
                                                                style="font-weight: 900">{{ $item->moz_domain_authority }}</span>
                                                        </p>
                                                        <p style="margin-bottom: 1rem">
                                                            <small class="text-style me-2"><i class="fas fa-star"></i>
                                                                Domain
                                                                Rating</small>
                                                            <span class="badge bg-soft-success font-size-14"
                                                                style="font-weight: 900">{{ $item->ahref_domain_rating }}</span>
                                                        </p>
                                                        <p style="margin-bottom: 1rem">
                                                            <small class="text-style me-2"><i
                                                                    class="fas fa-user-friends"></i>
                                                                Organic Traffic</small>
                                                            <span class="badge bg-soft-success font-size-14"
                                                                style="font-weight: 900">{{ $item->ahref_organic_traffic }}</span>
                                                        </p>
                                                        <p style="margin-bottom: 1rem">
                                                            <small class="text-style me-2"><i
                                                                    class="fas fa-question"></i>
                                                                Spam
                                                                Score</small>
                                                            <span class="badge bg-soft-success font-size-14"
                                                                style="font-weight: 900">{{ $item->moz_spam_score }}</span>
                                                        </p>
                                                        <p style="margin-bottom: 1rem">
                                                            <small class="text-style me-2"><i
                                                                    class="fas fa-language"></i>
                                                                Language</small>
                                                            @foreach ($item->languages as $language)
                                                                <span class="badge bg-soft-success font-size-14"
                                                                    style="font-weight: 900">{{ $language->name }}</span>
                                                            @endforeach
                                                        </p>
                                                        <p style="margin-bottom: 1rem">
                                                            <small class="text-style me-2"><i class="fas fa-link"></i>
                                                                Links</small>
                                                            @foreach ($item->hyperlink_type as $link)
                                                                <span class="badge bg-soft-success font-size-14"
                                                                    style="font-weight: 900">{{ $link->name }}</span>
                                                            @endforeach
                                                        </p>
                                                    </div>
                                                    <div class="col-md-2 mt-3" style="column-count: 1">
                                                        <p style="margin-bottom: 1rem">
                                                            <small class="text-style me-2"><i
                                                                    class="fas fa-globe-asia"></i>
                                                                Countries :</small>
                                                            @foreach ($item->countries as $country)
                                                                <span class="text-style"
                                                                    v-for="country in item.countries">
                                                                    {{ $country->name }}
                                                                </span>
                                                            @endforeach
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2" style="border-left: 2px dashed rgb(72, 94, 221)">
                                                <div class="mt-3 text-center" style="display: grid">
                                                    @foreach ($item->services as $service)
                                                        @if ($service->name === 'Guest Posting')
                                                            <span class="font-size-22 mb-2"
                                                                style="font-weight: 900; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">$
                                                                {{ $service->pivot->price }}</span>
                                                        @endif
                                                    @endforeach
                                                    <a href="{{ route('order.create', ['exploreSite' => $item->id]) }}"
                                                        type="button" class="button-style btn btn-otr-primary"
                                                        target="_blank">
                                                        <b> Buy Now</b>
                                                    </a>
                                                    <!-- </form> -->
                                                </div>
                                                <div class="d-flex justify-content-center pt-2">
                                                    <a href="#"
                                                        wire:click="showCampaign('{{ $item->id }}')"
                                                        style="top" class="campaign-add" data-bs-toggle="modal"
                                                        data-bs-target=".bs-campaign-modal" wire:click="increment">
                                                        Add to Campaign
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach

                @if ($isSubscriptionActive)
                    {{ $all_sites->links() }}
                @else
                    <div>
                        <nav class="d-flex justify-items-center justify-content-center">
                            <ul class="pagination">
                                <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                                    <span class="page-link" aria-hidden="true">‹</span>
                                </li>

                                <li class="page-item active disabled" aria-current="page" data-bs-toggle="modal"
                                    data-bs-target=".bs-not-allowed-modal">
                                    <span class="page-link">{{ $all_sites->currentPage() }}</span>
                                </li>

                                @if ($all_sites->lastPage() > 10)
                                    @for ($i = 2; $i <= 10; $i++)
                                        <li class="page-item disabled" aria-current="page" data-bs-toggle="modal"
                                            data-bs-target=".bs-not-allowed-modal">
                                            <span class="page-link">{{ $i }}</span>
                                        </li>
                                    @endfor
                                    <span class="disabled">...</span>
                                    <li class="page-item disabled" aria-current="page" data-bs-toggle="modal"
                                        data-bs-target=".bs-not-allowed-modal">
                                        <span class="disabled">{{ $all_sites->lastPage() - 1 }}</span>
                                    </li>
                                    <li class="page-item disabled" aria-current="page" data-bs-toggle="modal"
                                        data-bs-target=".bs-not-allowed-modal">
                                        <span class="disabled">{{ $all_sites->lastPage() }}</span>
                                    </li>
                                @else
                                    @for ($i = 2; $i <= $all_sites->lastPage(); $i++)
                                        <li class="page-item disabled" aria-current="page" data-bs-toggle="modal"
                                            data-bs-target=".bs-not-allowed-modal">
                                            <span class="page-link">{{ $i }}</span>
                                        </li>
                                    @endfor
                                @endif

                                <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                                    <span class="page-link" aria-hidden="true">›</span>
                                </li>
                            </ul>
                        </nav>
                    </div>
                @endif

            </div>
        @else
            <div class="card shadow mb-4 mt-4">
                <div class="card-body bg-white">
                    <div class="chart-area h-100 overflow-auto scrollbar-subtle">
                        <div class="overflow-auto">
                            <table class="table">
                                <thead class="bg-white text-muted px-3 rounded w-100"
                                    style="position: sticky; top: 0; z-index:50;">
                                    <tr>
                                        <th>Domain</th>
                                        <th>DA</th>
                                        <th>DR</th>
                                        <th>Traffic</th>
                                        <th data-toggle="tooltip" title="Spam Score">SC</th>
                                        <th>Links</th>
                                        <th data-toggle="tooltip" title="Guest Post">GP</th>
                                        <th data-toggle="tooltip" title="Link Insertion">LI</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_sites as $item)
                                        <tr>
                                            <td class="domain-name">
                                                <a href="{{ $item->domain_url }}" target="_blank"
                                                    rel="noreferrer noopener"
                                                    class="text-primary font-weight-bold">{{ $item->domain }}</a>
                                                <a href="#" wire:click="showCampaign('{{ $item->id }}')"
                                                    style="top"
                                                    class="btn btn-sm btn-link btn-block p-0 d-flex justify-content-left"
                                                    data-bs-toggle="modal" data-bs-target=".bs-campaign-modal"
                                                    wire:click="increment">
                                                    <small>
                                                        Add to Campaign
                                                    </small>
                                                </a>
                                            </td>
                                            <td class="align-self-center">
                                                <small class="badge bg-soft-success font-size-14">
                                                    {{ $item->moz_domain_authority }}
                                                </small>
                                            </td>
                                            <td>
                                                <small class="badge bg-soft-success font-size-14">
                                                    {{ $item->ahref_domain_rating }}
                                                </small>
                                            </td>
                                            <td>
                                                <small class="badge bg-soft-info font-size-14">
                                                    {{ $item->ahref_organic_traffic }}
                                                </small>
                                            </td>
                                            <td>
                                                <small class="badge bg-soft-info font-size-14">
                                                    {{ $item->moz_spam_score }}
                                                </small>
                                            </td>
                                            <td>
                                                @foreach ($item->hyperlink_type as $link)
                                                    <small class="badge bg-soft-success font-size-14">
                                                        {{ $link->name }}
                                                    </small>
                                                @endforeach
                                            </td>
                                            @foreach ($item->services as $service)
                                                @if (count($item->services) == 1 && $item->services[0]->name === 'Guest Posting')
                                                    <td>
                                                        <a href="{{ route('order.create', ['exploreSite' => $item->id, 'service' => $service->id]) }}"
                                                            type="button" target="_blank"
                                                            class="btn btn-outline-primary font-size-14 btn-block px-4 py-1 d-flex align-items-center justify-content-center">
                                                            <small class="font-size-14"> Buy
                                                                (<span
                                                                    class="font-weight-bold">${{ $service->pivot->price }}</span>)
                                                            </small>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <i
                                                            class="far fa-times-circle text-muted mr-2 font-size-14"></i>
                                                        <small class="font-size-14">N/A</small>
                                                    </td>
                                                @elseif(count($item->services) == 1 && $item->services[0]->name === 'Link Insertion')
                                                    <td>
                                                        <i
                                                            class="far fa-times-circle text-muted mr-2 font-size-14"></i>
                                                        <small class="font-size-14">N/A</small>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('order.create', ['exploreSite' => $item->id, 'service' => $service->id]) }}"
                                                            type="button" target="_blank"
                                                            class="btn btn-outline-primary font-size-14 btn-block px-4 py-1 d-flex align-items-center justify-content-center">
                                                            <small class="font-size-14">Buy
                                                                (<span
                                                                    class="font-weight-bold">${{ $service->pivot->price }}</span>)
                                                            </small>
                                                        </a>
                                                    </td>
                                                @else
                                                    <td>
                                                        <a href="{{ route('order.create', ['exploreSite' => $item->id, 'service' => $service->id]) }}"
                                                            type="button" target="_blank"
                                                            class="btn btn-outline-primary font-size-14 btn-block px-4 py-1 d-flex align-items-center justify-content-center">
                                                            <small class="font-size-14"> Buy
                                                                (<span
                                                                    class="font-weight-bold">${{ $service->pivot->price }}</span>)
                                                            </small>
                                                        </a>
                                                    </td>
                                                @endif
                                            @endforeach
                                            <td>
                                                <a class="btn btn-outline-primary px-3 py-1 d-flex align-items-center justify-content-center"
                                                    href="{{ route('sites.show', $item) }}" target="_blank" <small
                                                    class="font-size-14">View</small>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @if ($isSubscriptionActive)
                {{ $all_sites->links() }}
            @else
                <div>
                    <nav class="d-flex justify-items-center justify-content-center">
                        <ul class="pagination">
                            <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                                <span class="page-link" aria-hidden="true">‹</span>
                            </li>

                            <li class="page-item active disabled" aria-current="page" data-bs-toggle="modal"
                                data-bs-target=".bs-not-allowed-modal">
                                <span class="page-link">{{ $all_sites->currentPage() }}</span>
                            </li>

                            @if ($all_sites->lastPage() > 10)
                                @for ($i = 2; $i <= 10; $i++)
                                    <li class="page-item disabled" aria-current="page" data-bs-toggle="modal"
                                        data-bs-target=".bs-not-allowed-modal">
                                        <span class="page-link">{{ $i }}</span>
                                    </li>
                                @endfor
                                <span class="disabled">...</span>
                                <li class="page-item disabled" aria-current="page" data-bs-toggle="modal"
                                    data-bs-target=".bs-not-allowed-modal">
                                    <span class="disabled">{{ $all_sites->lastPage() - 1 }}</span>
                                </li>
                                <li class="page-item disabled" aria-current="page" data-bs-toggle="modal"
                                    data-bs-target=".bs-not-allowed-modal">
                                    <span class="disabled">{{ $all_sites->lastPage() }}</span>
                                </li>
                            @else
                                @for ($i = 2; $i <= $all_sites->lastPage(); $i++)
                                    <li class="page-item disabled" aria-current="page" data-bs-toggle="modal"
                                        data-bs-target=".bs-not-allowed-modal">
                                        <span class="page-link">{{ $i }}</span>
                                    </li>
                                @endfor
                            @endif

                            <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                                <span class="page-link" aria-hidden="true">›</span>
                            </li>
                        </ul>
                    </nav>
                </div>
            @endif
        @endif
    @else
        <div class="card card-not-allowed w-100 mx-auto" style="max-width: 400px;">
            <div class="card-content">
                <div class="card-header">
                    <div class="icon-box">
                        <i class="mdi mdi-close"></i>
                    </div>
                </div>
                <div class="card-body">
                    <h4>Ooops!</h4>
                    <p class="text-center">You are not allowed to access this. Please buy a plan to access further.</p>
                    <div class="text-center">
                        <a href="{{ route('subscription.index') }}" type="button" class="btn btn-success">View
                            Plans</a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!--  Campaign modal -->
    <div wire:ignore.self class="modal fade bs-campaign-modal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text text-center">
                    <h5 class="modal-title"
                        style="color: #55729e; font-weight: 900; font-family: 'Gill Sans', 'Gill Sans MT',Calibri, 'Trebuchet MS', sans-serif; font-size: 22px;">
                        Add To Campaign
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action=""></form>
                    <div class="row">
                        <p class="text-center mb-3 text-primary" style="font-size: 1.5rem">
                            {{ $selectedSite->domain ?? '' }}
                        </p>
                    </div>
                    {{-- @dump($selectedSite->id ?? '') --}}
                    <div class="row">
                        <form action="{{ route('campaign_explore.store') }}" method="POST">
                            @csrf
                            <input type="hidden" class="form-control" id="newCampaign" name="exploresite_id"
                                value="{{ $selectedSite->id ?? '' }}">
                            <input type="hidden" class="form-control" id="newCampaign" name="price"
                                value="{{ $ServiceSitePrice }}">
                            <div class="col-md-12">
                                <label for="newCampaign" class="form-label">Create New Campaign</label>
                                <input type="text" class="form-control" id="newCampaign"
                                    placeholder="Enter Landing Domain (examle.com)" name="name"
                                    wire:model="inputValue">
                                @error('name')
                                    <span class="text-danger text-bold">{{ $message }}</span>
                                @enderror
                            </div>
                            <h2
                                style="width: 100%; text-align: center;  border-bottom: 1px solid rgba(87, 85, 85, 0.7); line-height: 0.1em; margin: 30px 0 30px;">
                                <span class="text-dark"
                                    style="background:#fff; padding:0 10px; font-size: 1.5rem">or</span>
                            </h2>
                            <div class="form-group pb-3">
                                <label for="campaignId">Choose from Saved Campaigns</label>
                                <select id="campaignId" class="form-control" name="campaign"
                                    wire:model="selectValue">
                                    <option value="">None</option>
                                    @foreach (\App\Models\Campaign::all() as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <div class="text-center" style="display: grid">
                                    <button type="submit" class="btn btn-otr-primary campaign-actions">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  Not Allowed modal -->
    <div wire:ignore.self class="modal fade bs-not-allowed-modal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-not-allowed w-100 mx-auto" style="max-width: 350px;">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <div class="icon-box">
                        <i class="mdi mdi-close"></i>
                    </div>
                    <button type="button" class="close btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <h4>Ooops!</h4>
                    <p>You are not allowed to access this. Please buy a plan to access further.</p>
                    <a href="{{ route('subscription.index') }}" type="button" class="btn btn-success">View
                        Plans</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Modal -->
    <form class="custom-validation" action="{{ route('sites.index') }}" method="GET" id="advanceFilter">
        {{-- @csrf --}}
        <x-modal title='Advance Filter' id="filterModal" modalSize='modal-lg'>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <h5 class="font-size-14 mb-3">Domain Authority</h5>
                    {{-- <input type="text" id="range_DA" name="range_DA"> --}}
                    <div class="d-flex da-dr-input me-3">
                        <div class="da-dr-field d-flex align-items-center">
                            Min
                            <input type="number" name="start_da" id="start_da" class="form-control rounded">
                        </div>
                        <div class="separator">-</div>
                        <div class="da-dr-field d-flex">
                            Max
                            <input type="number" name="end_da" id="end_da" class="form-control rounded">
                        </div>
                    </div>
                    <div id="errorContainerDA"></div>
                </div>
                <div class="col-md-6 mb-3">
                    <h5 class="font-size-14 mb-3">Domain Rating</h5>
                    {{-- <input type="text" id="range_DR" name="range_DR"> --}}
                    <div class="d-flex da-dr-input">
                        <div class="da-dr-field d-flex align-items-center">
                            Min
                            <input type="number" name="start_dr" id="start_dr" class="form-control rounded">
                        </div>
                        <div class="separator">-</div>
                        <div class="da-dr-field d-flex">
                            Max
                            <input type="number" name="end_dr" id="end_dr" class="form-control rounded">
                        </div>
                    </div>
                    <div id="errorContainerDR"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Price</label>
                    <select class="form-control selectpicker" data-live-search="true" name="price">
                        <option value="">Select Price</option>
                        <option value="0;50">0 - 50</option>
                        <option value="51;100">51 - 100</option>
                        <option value="101;200">101 - 200</option>
                        <option value="201;300">201 - 300</option>
                        <option value="301;400">301 - 400</option>
                        <option value="401;500">401 - 500</option>
                        <option value="501;600">501 - 600</option>
                        <option value="601;700">601 - 700</option>
                        <option value="701;800">701 - 800</option>
                        <option value="801;900">801 - 900</option>
                        <option value="901;1000">901 - 1000</option>
                        <option value="1001;∞">1001 - Above</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Traffic</label>
                    <select class="form-control selectpicker" data-live-search="true" name="traffic">
                        <option value="">Select Traffic</option>
                        <option value="0;1000">0 - 1000</option>
                        <option value="1001;5000">1001 - 5000</option>
                        <option value="5001;10000">5001 - 10000</option>
                        <option value="10001;50000">10001 - 50000</option>
                        <option value="50001;100000">50001 - 100000</option>
                        <option value="1000001;1000000">1000001 - 1000000</option>
                        <option value="1000001;∞">1000001 - ∞</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    {!! Form::label('category_id', 'Catogory') !!}
                    {{ Form::select('category_id[]', $data['categories'], null, ['class' => 'select2 select2-multiple my-select', 'multiple' => 'multiple', 'data-placeholder' => 'Choose categories', 'wire:ignore']) }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    {!! Form::label('country_id', 'Country') !!}
                    {{ Form::select('country_id[]', $data['countries'], null, ['class' => 'select2 select2-multiple my-select', 'multiple' => 'multiple', 'data-placeholder' => 'Choose countries', 'wire:ignore']) }}
                </div>
                <div class="col-md-6 mb-3">
                    {!! Form::label('hyperlinks_type_id', 'Hyperlink Type') !!}
                    {{ Form::select('hyperlinks_type_id[]', $data['hyperlinks_type'], isset($exploreSite) ? $exploreSite->hyperlink_type : null, ['class' => 'select2 select2-multiple my-select', 'multiple' => 'multiple', 'data-placeholder' => 'Choose Hyperlink Type', 'wire:ignore']) }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Link Insertion</label>
                    <select class="form-control selectpicker" data-live-search="true" name="link">
                        <option value="">Any</option>
                        <option value="yes">Yes</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Filter by Domain</label>
                    <select class="form-control selectpicker" data-live-search="true" name="domain">
                        <option value="">Select</option>
                        <option value=".com">.com</option>
                        <option value=".net">.net</option>
                        <option value=".org">.org</option>
                        <option value=".info">.info</option>
                        <option value=".biz">.biz</option>
                        <option value=".uk">.uk</option>
                    </select>
                </div>
            </div>
        </x-modal>
    </form>
</div>

@push('script')
    <script>
        $('#advanceFilter').submit('input', function() {
            // Domain Authority Validation
            var inputValueDA1 = $('#start_da').val();
            var inputValueDA2 = $('#end_da').val();
            if ((inputValueDA1 && !inputValueDA2) || (!inputValueDA1 && inputValueDA2)) {
                // Input has a value
                var errorMessage = $('<span class="text-danger">').text(
                    'Please fill in both fields or leave them both empty');
                $('#errorContainerDA').empty().append(errorMessage);
                event.preventDefault();
            }

            // Domain Rating Validation
            var inputValueDR1 = $('#start_dr').val();
            var inputValueDR2 = $('#end_dr').val();
            if ((inputValueDR1 && !inputValueDR2) || (!inputValueDR1 && inputValueDR2)) {
                // Input has a value
                var errorMessage = $('<span class="text-danger">').text(
                    'Please fill in both fields or leave them both empty');
                $('#errorContainerDR').empty().append(errorMessage);
                event.preventDefault();
            }
        });
    </script>
@endpush
