@extends('admin.layouts.app')

@section('body')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('company.company_add') }}</h4>
                    <p class="card-title-desc">{{Session::get('message')}}</p>
                    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-md-4">{{ __('company.company_name') }}</label>
                            <div class="col-md-8">
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control"/>
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-4">{{ __('company.company_email') }}</label>
                            <div class="col-md-8">
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control"/>
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-4">{{ __('company.company_website') }}</label>
                            <div class="col-md-8">
                                <input type="text" name="website" value="{{ old('website') }}" class="form-control"/>
                                @error('website')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-4">{{ __('company.company_logo') }}</label>
                            <div class="col-md-8">
                                <input type="file" name="logo" class="form-control-file"/>
                                @error('logo')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success">{{ __('company.save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
