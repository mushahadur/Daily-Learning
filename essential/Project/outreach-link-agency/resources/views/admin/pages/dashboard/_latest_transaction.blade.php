<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Latest Transaction</h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>SL</th>
                                <th>Payment ID</th>
                                <th>Billing Name</th>
                                <th>Total</th>
                                <th>Currency</th>
                                <th>Payment Method</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($payment as $item)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $item->payment_id }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>${{ $item->amount }}</td>
                                    <td>{{ $item->currency }}</td>
                                    <td>
                                        @if ($item->payment_method === 'Paypal')
                                            <i class="fab fa-cc-paypal me-1"></i>
                                        @else
                                            <i class="fab fa-cc-stripe me-1"></i>
                                        @endif
                                        {{ $item->payment_method }}
                                    </td>
                                    <td>{{ Carbon\Carbon::parse($item->created_at)->format('d-M-Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
