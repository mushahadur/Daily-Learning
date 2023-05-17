@extends('layouts.customer')

@section('title')
    Outreach Link Agency | Create Package
@endsection

@push('style')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tiny.cloud/1/qwum3mb9nppyeg5mro6cgne8z1kcoqwb1d8futzd22jwixoy/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    @livewireStyles
@endpush



@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="alert alert-danger alert-dismissible fade show custom_alert" role="alert">
                We strictly prohibit the acceptance of
                content or links
                related to Essay
                Writing, CBD, Casino, Gambling, Betting, Dating, Drugs, Movies, Songs, Dance, Smoking, Vaping,
                Insurance, Mortgage, Banking Loans, and any other forms of illegal activities.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
            <livewire:service-order :explore_site="$explore_site" :orderId="$orderId" />
        </div>
    </div>

    @livewireScripts
    @stack('scripts')
@endsection
