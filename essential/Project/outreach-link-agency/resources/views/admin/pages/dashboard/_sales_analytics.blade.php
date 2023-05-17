<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4 header-style">Sales Analytics</h4>

                <div class="mt-1">
                    <ul class="list-inline main-chart mb-0">
                        <li class="list-inline-item chart-border-left me-0 border-0">
                            <h3 class="text-primary">$<span data-plugin="counterup">{{ $yearlyRevenue }}</span><span
                                    class="text-muted d-inline-block font-size-15 ms-3">Revenue of
                                    {{ date('Y') }}</span></h3>
                        </li>
                        <li class="list-inline-item chart-border-left me-0">
                            <h3><span data-plugin="counterup">{{ $currentYearTotalOrder }}</span><span
                                    class="text-muted d-inline-block font-size-15 ms-3">Sales of
                                    {{ date('Y') }}</span>
                            </h3>
                        </li>
                    </ul>
                </div>
                <canvas id="myChart" height="100px"></canvas>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div> <!-- end row-->

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        var labels = {{ Js::from($chartLabels) }};
        var exploreserviceorder = {{ Js::from($exploreserviceorderData) }};
        var packageorder = {{ Js::from($packageorderData) }};
        var contentorder = {{ Js::from($contentorderData) }};


        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            data: {
                labels: labels,
                datasets: [{
                        type: 'line',
                        fill: {
                            target: 'origin',
                            below: '#5b73e8'
                        },
                        label: 'Explore Service Order',
                        data: exploreserviceorder,
                        borderWidth: 1
                    },
                    {
                        type: 'bar',
                        label: 'Package Order',
                        data: packageorder,
                        borderWidth: 1
                    },
                    {
                        type: 'line',
                        label: 'Content Order',
                        data: contentorder,
                        borderWidth: 5
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            // Include a dollar sign in the ticks
                            callback: function(value, index, ticks) {
                                return '$' + value;
                            }
                        }
                    }
                }
            }
        });
    </script>
@endpush
