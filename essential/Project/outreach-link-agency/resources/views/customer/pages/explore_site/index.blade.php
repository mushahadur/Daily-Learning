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
            @if ($lowbalance)
                @include('customer.components.balance-low')
            @endif
            @isset($filterData)
                <livewire:sites :filterData="$filterData" :explore_header="$explore_header" :explore_sub_header="$explore_sub_header" :data="$data" :isSubscriptionActive="$isSubscriptionActive" />
            @else
                <livewire:sites :explore_header="$explore_header" :explore_sub_header="$explore_sub_header" :data="$data" :isSubscriptionActive="$isSubscriptionActive" />
            @endisset
        </div>
    </div>
@endsection


@push('script')
    @include('components.select2-script');
    <script>
        document.addEventListener("livewire:load", function() {
            Livewire.hook('message.processed', function() {
                $('.my-select').select2({
                    dropdownParent: $('#filterModal')
                });
            });
        });
        $('.my-select').select2({
            dropdownParent: $('#filterModal')
        });
    </script>
    @livewireScripts
@endpush
