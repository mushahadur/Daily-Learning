@extends('admin.layouts.app')

@section('body')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('company.update_company') }}</h4>
                    <p class="card-title-desc">{{Session::get('message')}}</p>
                    <form action="{{ route('companies.update', $company->id) }}" method="Post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-form-label col-md-4">{{ __('company.company_name') }}</label>
                            <div class="col-md-8">
                                <input type="text" name="name" value="{{$company->name}}"  class="form-control"/>
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-4">{{ __('company.company_email') }}</label>
                            <div class="col-md-8">
                                <input type="email" name="email" value="{{$company->email}}"  class="form-control"/>
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-4">{{ __('company.company_website') }}</label>
                            <div class="col-md-8">
                                <input type="text" name="website" value="{{$company->website}}"  class="form-control"/>
                                @error('website')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-4">{{ __('company.company_logo') }}</label>
                                <div class="col-md-8">
                                    <input type="file" class="form-control-file" id="horizontal-password-input4" name="logo"/>
                                    <img class="pt-3" src="{{asset('storage/Company-logos/'.$company->logo)}}" alt="" height="150" width="200"/>
                                </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success">{{ __('company.update_company') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
