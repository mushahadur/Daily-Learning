@extends('admin.layouts.app')

@section('body')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 p-3">
                            <img src="{{asset('storage/Company-logos/'.$company->logo)}}" alt="{{ $company->name }}" height="390" width="310">
                        </div>
                        <div class="col-md-6 pt-5">
                            <h4>{{ __('company.company_name') }}: {{ $company->name }} </h4>
                            <hr>
                            <h5>{{ __('company.company_email') }}: {{ $company->email }} </h5>
                            <hr>
                            <h5>{{ __('company.company_website') }}: {{ $company->website }} </h5>
                            <div class="py-5">
                                <a href="{{ url('/companies') }}" class="btn btn-info" >
                                    {{ __('company.home_back') }}
                                </a>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
