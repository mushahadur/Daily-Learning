@extends('layouts.customer')

@section('title')
    Outreach Link Agency | Explore Site
@endsection

@push('style')
    @livewireStyles
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            {{-- @if ($lowbalance)
                @include('customer.components.balance-low')
            @endif --}}
            {{-- @isset($filterData)
                <livewire:sites :filterData="$filterData" :explore_header="$explore_header" :explore_sub_header="$explore_sub_header" :data="$data" :isSubscriptionActive="$isSubscriptionActive" />
            @else
                <livewire:sites :explore_header="$explore_header" :explore_sub_header="$explore_sub_header" :data="$data" :isSubscriptionActive="$isSubscriptionActive" />
            @endisset --}}

            <div class="card shadow mb-4 mt-4">
                <div class="card-body bg-white">
                   <div class="chart-area h-100 overflow-auto scrollbar-subtle">
                      <div class="overflow-auto">
                         <table class="table">
                            <thead class="bg-white text-muted px-3 rounded w-100" style="position: sticky; top: 0; z-index:50;">
                               <tr>
                                  <th>Domain</th>
                                  <th>DA</th>
                                  <th>DR</th>
                                  <th>Traffic</th>
                                  <th data-toggle="tooltip" title="Spam Score">SC</th>
                                  <th>Links</th>
                                  <th data-toggle="tooltip" title="Guest Post">GP</th>
                                  <th data-toggle="tooltip" title="Link Insertion">LI</th>
                                  <th data-toggle="tooltip" title="Grey Niche">GN</th>
                                  <th>Action</th>
                               </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="domain-name">
                                        <a href="https://mommyhoodlife.com" target="_blank" rel="noreferrer noopener" class="text-primary font-weight-bold">mommyhoodlife.com </a>
                                        <button class="btn btn-sm btn-link btn-block p-0 d-flex justify-content-left" onclick="openCampaignModal(23084)">
                                            <small>
                                                Add to Campaign
                                            </small>
                                        </button>
                                    </td>
                                    <td class="align-self-center">
                                        <small class="badge bg-soft-success font-size-14">
                                        34
                                        </small>
                                    </td>
                                    <td>
                                        <small class="badge bg-soft-success font-size-14">
                                        34
                                        </small>
                                    </td>
                                    <td>
                                        <small class="badge bg-soft-info font-size-14">
                                        744
                                        </small>
                                    </td>
                                    <td>
                                        <small class="badge bg-soft-info font-size-14">
                                        2
                                        </small>
                                    </td>
                                    <td>
                                        <small class="badge bg-soft-success font-size-14">
                                        Dofollow
                                        </small>
                                    </td>
                                    <td>
                                        <button onclick="onBuy('https://dashboard.bloggeroutreach.io/orders/create?siteId=23084&amp;service=1',23084)" target="_blank" class="btn btn-outline-primary font-size-14 btn-block px-4 py-1 d-flex align-items-center justify-content-center">
                                            <small class="font-size-14"> Buy (<span class="font-weight-bold">$80</span>)</small>
                                        </button>
                                    </td>
                                    <td>
                                        <button onclick="onBuy('https://dashboard.bloggeroutreach.io/orders/create?siteId=23084&amp;service=2',23084)" class="btn btn-outline-primary btn-block font-size-14 px-4 py-1 d-flex align-items-center justify-content-center">
                                            <small class="font-size-14"> Buy (<span class="font-weight-bold">$80</span>) </small>
                                        </button>
                                    </td>
                                    <td>
                                        <i class="far fa-times-circle text-muted mr-2 font-size-14"></i> <small class="font-size-14">N/A</small>
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-primary px-3 py-1 d-flex align-items-center justify-content-center" onclick="onView('https://dashboard.bloggeroutreach.io/sites/23084',23084)">
                                            <small class="font-size-14">View</small>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="domain-name">
                                        <a href="https://mommyhoodlife.com" target="_blank" rel="noreferrer noopener" class="text-primary font-weight-bold">mommyhoodlife.com </a>
                                        <button class="btn btn-sm btn-link btn-block p-0 d-flex justify-content-left" onclick="openCampaignModal(23084)">
                                            <small>
                                                Add to Campaign
                                            </small>
                                        </button>
                                    </td>
                                    <td class="align-self-center">
                                        <small class="badge bg-soft-success font-size-14">
                                        34
                                        </small>
                                    </td>
                                    <td>
                                        <small class="badge bg-soft-success font-size-14">
                                        34
                                        </small>
                                    </td>
                                    <td>
                                        <small class="badge bg-soft-info font-size-14">
                                        744
                                        </small>
                                    </td>
                                    <td>
                                        <small class="badge bg-soft-info font-size-14">
                                        2
                                        </small>
                                    </td>
                                    <td>
                                        <small class="badge bg-soft-success font-size-14">
                                        Dofollow
                                        </small>
                                    </td>
                                    <td>
                                        <button onclick="onBuy('https://dashboard.bloggeroutreach.io/orders/create?siteId=23084&amp;service=1',23084)" target="_blank" class="btn btn-outline-primary font-size-14 btn-block px-4 py-1 d-flex align-items-center justify-content-center">
                                            <small class="font-size-14"> Buy (<span class="font-weight-bold">$80</span>)</small>
                                        </button>
                                    </td>
                                    <td>
                                        <button onclick="onBuy('https://dashboard.bloggeroutreach.io/orders/create?siteId=23084&amp;service=2',23084)" class="btn btn-outline-primary btn-block font-size-14 px-4 py-1 d-flex align-items-center justify-content-center">
                                            <small class="font-size-14"> Buy (<span class="font-weight-bold">$80</span>) </small>
                                        </button>
                                    </td>
                                    <td>
                                        <i class="far fa-times-circle text-muted mr-2 font-size-14"></i> <small class="font-size-14">N/A</small>
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-primary px-3 py-1 d-flex align-items-center justify-content-center" onclick="onView('https://dashboard.bloggeroutreach.io/sites/23084',23084)">
                                            <small class="font-size-14">View</small>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="domain-name">
                                        <a href="https://mommyhoodlife.com" target="_blank" rel="noreferrer noopener" class="text-primary font-weight-bold">mommyhoodlife.com </a>
                                        <button class="btn btn-sm btn-link btn-block p-0 d-flex justify-content-left" onclick="openCampaignModal(23084)">
                                            <small>
                                                Add to Campaign
                                            </small>
                                        </button>
                                    </td>
                                    <td class="align-self-center">
                                        <small class="badge bg-soft-success font-size-14">
                                        34
                                        </small>
                                    </td>
                                    <td>
                                        <small class="badge bg-soft-success font-size-14">
                                        34
                                        </small>
                                    </td>
                                    <td>
                                        <small class="badge bg-soft-info font-size-14">
                                        744
                                        </small>
                                    </td>
                                    <td>
                                        <small class="badge bg-soft-info font-size-14">
                                        2
                                        </small>
                                    </td>
                                    <td>
                                        <small class="badge bg-soft-success font-size-14">
                                        Dofollow
                                        </small>
                                    </td>
                                    <td>
                                        <button onclick="onBuy('https://dashboard.bloggeroutreach.io/orders/create?siteId=23084&amp;service=1',23084)" target="_blank" class="btn btn-outline-primary font-size-14 btn-block px-4 py-1 d-flex align-items-center justify-content-center">
                                            <small class="font-size-14"> Buy (<span class="font-weight-bold">$80</span>)</small>
                                        </button>
                                    </td>
                                    <td>
                                        <button onclick="onBuy('https://dashboard.bloggeroutreach.io/orders/create?siteId=23084&amp;service=2',23084)" class="btn btn-outline-primary btn-block font-size-14 px-4 py-1 d-flex align-items-center justify-content-center">
                                            <small class="font-size-14"> Buy (<span class="font-weight-bold">$80</span>) </small>
                                        </button>
                                    </td>
                                    <td>
                                        <i class="far fa-times-circle text-muted mr-2 font-size-14"></i> <small class="font-size-14">N/A</small>
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-primary px-3 py-1 d-flex align-items-center justify-content-center" onclick="onView('https://dashboard.bloggeroutreach.io/sites/23084',23084)">
                                            <small class="font-size-14">View</small>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="domain-name">
                                        <a href="https://mommyhoodlife.com" target="_blank" rel="noreferrer noopener" class="text-primary font-weight-bold">mommyhoodlife.com </a>
                                        <button class="btn btn-sm btn-link btn-block p-0 d-flex justify-content-left" onclick="openCampaignModal(23084)">
                                            <small>
                                                Add to Campaign
                                            </small>
                                        </button>
                                    </td>
                                    <td class="align-self-center">
                                        <small class="badge bg-soft-success font-size-14">
                                        34
                                        </small>
                                    </td>
                                    <td>
                                        <small class="badge bg-soft-success font-size-14">
                                        34
                                        </small>
                                    </td>
                                    <td>
                                        <small class="badge bg-soft-info font-size-14">
                                        744
                                        </small>
                                    </td>
                                    <td>
                                        <small class="badge bg-soft-info font-size-14">
                                        2
                                        </small>
                                    </td>
                                    <td>
                                        <small class="badge bg-soft-success font-size-14">
                                        Dofollow
                                        </small>
                                    </td>
                                    <td>
                                        <button onclick="onBuy('https://dashboard.bloggeroutreach.io/orders/create?siteId=23084&amp;service=1',23084)" target="_blank" class="btn btn-outline-primary font-size-14 btn-block px-4 py-1 d-flex align-items-center justify-content-center">
                                            <small class="font-size-14"> Buy (<span class="font-weight-bold">$80</span>)</small>
                                        </button>
                                    </td>
                                    <td>
                                        <button onclick="onBuy('https://dashboard.bloggeroutreach.io/orders/create?siteId=23084&amp;service=2',23084)" class="btn btn-outline-primary btn-block font-size-14 px-4 py-1 d-flex align-items-center justify-content-center">
                                            <small class="font-size-14"> Buy (<span class="font-weight-bold">$80</span>) </small>
                                        </button>
                                    </td>
                                    <td>
                                        <div for="siteId-23080" class="dropdown show" onclick="openSelectAddonsModal(23080)">
                                            <a class="btn btn-link dropdown-toggle p-0 text-primary" href="#" role="button">
                                            <i class="far fa-check-circle text-primary mr-2"></i>
                                            <small class="font-size-14">View All</small>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-primary px-3 py-1 d-flex align-items-center justify-content-center" onclick="onView('https://dashboard.bloggeroutreach.io/sites/23084',23084)">
                                            <small class="font-size-14">View</small>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="domain-name">
                                        <a href="https://mommyhoodlife.com" target="_blank" rel="noreferrer noopener" class="text-primary font-weight-bold">mommyhoodlife.com </a>
                                        <button class="btn btn-sm btn-link btn-block p-0 d-flex justify-content-left" onclick="openCampaignModal(23084)">
                                            <small>
                                                Add to Campaign
                                            </small>
                                        </button>
                                    </td>
                                    <td class="align-self-center">
                                        <small class="badge bg-soft-success font-size-14">
                                        34
                                        </small>
                                    </td>
                                    <td>
                                        <small class="badge bg-soft-success font-size-14">
                                        34
                                        </small>
                                    </td>
                                    <td>
                                        <small class="badge bg-soft-info font-size-14">
                                        744
                                        </small>
                                    </td>
                                    <td>
                                        <small class="badge bg-soft-info font-size-14">
                                        2
                                        </small>
                                    </td>
                                    <td>
                                        <small class="badge bg-soft-success font-size-14">
                                        Dofollow
                                        </small>
                                    </td>
                                    <td>
                                        <button onclick="onBuy('https://dashboard.bloggeroutreach.io/orders/create?siteId=23084&amp;service=1',23084)" target="_blank" class="btn btn-outline-primary font-size-14 btn-block px-4 py-1 d-flex align-items-center justify-content-center">
                                            <small class="font-size-14"> Buy (<span class="font-weight-bold">$80</span>)</small>
                                        </button>
                                    </td>
                                    <td>
                                        <button onclick="onBuy('https://dashboard.bloggeroutreach.io/orders/create?siteId=23084&amp;service=2',23084)" class="btn btn-outline-primary btn-block font-size-14 px-4 py-1 d-flex align-items-center justify-content-center">
                                            <small class="font-size-14"> Buy (<span class="font-weight-bold">$80</span>) </small>
                                        </button>
                                    </td>
                                    <td>
                                        <div for="siteId-23080" class="dropdown show" onclick="openSelectAddonsModal(23080)">
                                            <a class="btn btn-link dropdown-toggle p-0 text-primary" href="#" role="button">
                                            <i class="far fa-check-circle text-primary mr-2"></i>
                                            <small class="font-size-14">View All</small>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-primary px-3 py-1 d-flex align-items-center justify-content-center" onclick="onView('https://dashboard.bloggeroutreach.io/sites/23084',23084)">
                                            <small class="font-size-14">View</small>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="domain-name">
                                        <a href="https://mommyhoodlife.com" target="_blank" rel="noreferrer noopener" class="text-primary font-weight-bold">mommyhoodlife.com </a>
                                        <button class="btn btn-sm btn-link btn-block p-0 d-flex justify-content-left" onclick="openCampaignModal(23084)">
                                            <small>
                                                Add to Campaign
                                            </small>
                                        </button>
                                    </td>
                                    <td class="align-self-center">
                                        <small class="badge bg-soft-success font-size-14">
                                        34
                                        </small>
                                    </td>
                                    <td>
                                        <small class="badge bg-soft-success font-size-14">
                                        34
                                        </small>
                                    </td>
                                    <td>
                                        <small class="badge bg-soft-info font-size-14">
                                        744
                                        </small>
                                    </td>
                                    <td>
                                        <small class="badge bg-soft-info font-size-14">
                                        2
                                        </small>
                                    </td>
                                    <td>
                                        <small class="badge bg-soft-success font-size-14">
                                        Dofollow
                                        </small>
                                    </td>
                                    <td>
                                        <button onclick="onBuy('https://dashboard.bloggeroutreach.io/orders/create?siteId=23084&amp;service=1',23084)" target="_blank" class="btn btn-outline-primary font-size-14 btn-block px-4 py-1 d-flex align-items-center justify-content-center">
                                            <small class="font-size-14"> Buy (<span class="font-weight-bold">$80</span>)</small>
                                        </button>
                                    </td>
                                    <td>
                                        <button onclick="onBuy('https://dashboard.bloggeroutreach.io/orders/create?siteId=23084&amp;service=2',23084)" class="btn btn-outline-primary btn-block font-size-14 px-4 py-1 d-flex align-items-center justify-content-center">
                                            <small class="font-size-14"> Buy (<span class="font-weight-bold">$80</span>) </small>
                                        </button>
                                    </td>
                                    <td>
                                        <div for="siteId-23080" class="dropdown show" onclick="openSelectAddonsModal(23080)">
                                            <a class="btn btn-link dropdown-toggle p-0 text-primary" href="#" role="button">
                                            <i class="far fa-check-circle text-primary mr-2"></i>
                                            <small class="font-size-14">View All</small>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-primary px-3 py-1 d-flex align-items-center justify-content-center" onclick="onView('https://dashboard.bloggeroutreach.io/sites/23084',23084)">
                                            <small class="font-size-14">View</small>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="domain-name">
                                        <a href="https://mommyhoodlife.com" target="_blank" rel="noreferrer noopener" class="text-primary font-weight-bold">mommyhoodlife.com </a>
                                        <button class="btn btn-sm btn-link btn-block p-0 d-flex justify-content-left" onclick="openCampaignModal(23084)">
                                            <small>
                                                Add to Campaign
                                            </small>
                                        </button>
                                    </td>
                                    <td class="align-self-center">
                                        <small class="badge bg-soft-success font-size-14">
                                        34
                                        </small>
                                    </td>
                                    <td>
                                        <small class="badge bg-soft-success font-size-14">
                                        34
                                        </small>
                                    </td>
                                    <td>
                                        <small class="badge bg-soft-info font-size-14">
                                        744
                                        </small>
                                    </td>
                                    <td>
                                        <small class="badge bg-soft-info font-size-14">
                                        2
                                        </small>
                                    </td>
                                    <td>
                                        <small class="badge bg-soft-success font-size-14">
                                        Dofollow
                                        </small>
                                    </td>
                                    <td>
                                        <button onclick="onBuy('https://dashboard.bloggeroutreach.io/orders/create?siteId=23084&amp;service=1',23084)" target="_blank" class="btn btn-outline-primary font-size-14 btn-block px-4 py-1 d-flex align-items-center justify-content-center">
                                            <small class="font-size-14"> Buy (<span class="font-weight-bold">$80</span>)</small>
                                        </button>
                                    </td>
                                    <td>
                                        <button onclick="onBuy('https://dashboard.bloggeroutreach.io/orders/create?siteId=23084&amp;service=2',23084)" class="btn btn-outline-primary btn-block font-size-14 px-4 py-1 d-flex align-items-center justify-content-center">
                                            <small class="font-size-14"> Buy (<span class="font-weight-bold">$80</span>) </small>
                                        </button>
                                    </td>
                                    <td>
                                        <i class="far fa-times-circle text-muted mr-2 font-size-14"></i> <small class="font-size-14">N/A</small>
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-primary px-3 py-1 d-flex align-items-center justify-content-center" onclick="onView('https://dashboard.bloggeroutreach.io/sites/23084',23084)">
                                            <small class="font-size-14">View</small>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="domain-name">
                                        <a href="https://mommyhoodlife.com" target="_blank" rel="noreferrer noopener" class="text-primary font-weight-bold">mommyhoodlife.com </a>
                                        <button class="btn btn-sm btn-link btn-block p-0 d-flex justify-content-left" onclick="openCampaignModal(23084)">
                                            <small>
                                                Add to Campaign
                                            </small>
                                        </button>
                                    </td>
                                    <td class="align-self-center">
                                        <small class="badge bg-soft-success font-size-14">
                                        34
                                        </small>
                                    </td>
                                    <td>
                                        <small class="badge bg-soft-success font-size-14">
                                        34
                                        </small>
                                    </td>
                                    <td>
                                        <small class="badge bg-soft-info font-size-14">
                                        744
                                        </small>
                                    </td>
                                    <td>
                                        <small class="badge bg-soft-info font-size-14">
                                        2
                                        </small>
                                    </td>
                                    <td>
                                        <small class="badge bg-soft-success font-size-14">
                                        Dofollow
                                        </small>
                                    </td>
                                    <td>
                                        <button onclick="onBuy('https://dashboard.bloggeroutreach.io/orders/create?siteId=23084&amp;service=1',23084)" target="_blank" class="btn btn-outline-primary font-size-14 btn-block px-4 py-1 d-flex align-items-center justify-content-center">
                                            <small class="font-size-14"> Buy (<span class="font-weight-bold">$80</span>)</small>
                                        </button>
                                    </td>
                                    <td>
                                        <button onclick="onBuy('https://dashboard.bloggeroutreach.io/orders/create?siteId=23084&amp;service=2',23084)" class="btn btn-outline-primary btn-block font-size-14 px-4 py-1 d-flex align-items-center justify-content-center">
                                            <small class="font-size-14"> Buy (<span class="font-weight-bold">$80</span>) </small>
                                        </button>
                                    </td>
                                    <td>
                                        <i class="far fa-times-circle text-muted mr-2 font-size-14"></i> <small class="font-size-14">N/A</small>
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-primary px-3 py-1 d-flex align-items-center justify-content-center" onclick="onView('https://dashboard.bloggeroutreach.io/sites/23084',23084)">
                                            <small class="font-size-14">View</small>
                                        </a>
                                    </td>
                                </tr>

                            </tbody>
                         </table>
                      </div>
                   </div>
                </div>
             </div>

        </div>
    </div>
@endsection


@push('script')
    @include('components.select2-script');

    <script>
        $('.select2').select2({
            dropdownParent: $('#filterModal')
        });

        $(document).ready(function() {
            $('#Sort').on('change', function() {
                $.ajax({
                    url: '{{ route('sites.filter') }}',
                    type: "get", //send it through get method
                    data: {
                        value: this.value
                    },
                    success: function(response) {
                        //Do Something
                    },
                    error: function(xhr) {
                        //Do Something to handle error
                    }
                });
            })

            // $(document).on('click', '.pagination a', function(event) {
            //     event.preventDefault();

            //     var page = $(this).attr('href').split('page=')[1];
            //     fetchData(page);
            // });

            // function fetchData(page) {
            //     $.ajax({
            //         url: '?page=' + page,
            //         type: "get",
            //         dataType: "html",
            //         success: function(data) {
            //             $('#dataContainer').html(data);
            //         }
            //     });
            // }
        });
    </script>
    @livewireScripts
@endpush
