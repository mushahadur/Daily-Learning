<!-- Statistics  -->
<div class="row mt-3">
    @foreach ($dashboard_button as $item)
        <div class="col-md-6 col-xl-3">
            <a href="{{ route($item->route_url) }}">
                <div class="card text-center">
                    <div class="card-body py-4">
                        <h5 class="my-2 text-secondary" style="font-size: 45px;">
                            {!! $item->icon !!}
                        </h5>
                        <h5 class="fw-bold">{{ $item->name }}</h5>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
    <style>
        .card:hover h5 {
            color: #6e5fd3;
        }

        .card:hover i {
            color: #6e5fd3;
        }
    </style>
</div>
