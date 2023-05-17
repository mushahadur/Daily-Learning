@extends('layouts.customer')

@section('title')
    Outreach Link Agency | Package Order Page
@endsection

@section('dashboard')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 header-style">Package Order Page</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-danger alert-dismissible fade show custom_alert" role="alert">
                        We strictly prohibit the acceptance of
                        content or links
                        related to Essay
                        Writing, CBD, Casino, Gambling, Betting, Dating, Drugs, Movies, Songs, Dance, Smoking, Vaping,
                        Insurance, Mortgage, Banking Loans, and any other forms of illegal activities.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                    <div class="card">
                        <form action="{{ route('package-order.store', $package->id) }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <input type="hidden" class="form-control" name="quantity" value="{{ $quantity }}">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Topic</th>
                                                <th>Anchor Text (Required)</th>
                                                <th>Landing Page (Required)</th>
                                                <th>Instructions (Not Mandatory)</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php
                                                $array = array_fill(0, $quantity, $quantity);
                                                $i = 0;
                                            @endphp

                                            @for ($j = 0; $j < count($array); $j++)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>
                                                        <input type="text" class="form-control" name="topic[]"
                                                            placeholder="Topic">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="anchor_text[]"
                                                            placeholder="Anchor Text">
                                                        @error('anchor_text.' . $j)
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="landing_page[]"
                                                            placeholder="Landing Page">
                                                        @error('landing_page.' . $j)
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <textarea class="form-control" placeholder="Describe your requirement" name="instruction[]"></textarea>
                                                    </td>
                                                </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row my-4">
                                    <div class="col">
                                        <div class="text-end mt-2 mt-sm-0 text-center">
                                            <button type="submit" class="btn btn-otr-primary">
                                                <i class="uil uil-focus-add me-1"></i> Save Package Order </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
