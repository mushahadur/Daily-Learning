
@extends('admin.layouts.app')

@section('body')
    <div class="row">
<div class="col-md-6 mx-auto">
    <div class="card">

        <p class="card-title-desc">{{Session::get('message')}}</p>
        <div class="card-body">
            <h3 class="text-center pb-5">{{ __('employee.employee_add') }}</h3>
            <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-form-label col-md-4">{{ __('employee.first_name') }}</label>
                    <div class="col-md-8">
                        <input type="text" name="first_name" class="form-control"/>
                        @error('first_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-4">{{ __('employee.last_name') }}</label>
                    <div class="col-md-8">
                        <input type="text" name="last_name" class="form-control"/>
                        @error('last_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-4">{{ __('employee.email') }}</label>
                    <div class="col-md-8">
                        <input type="email" name="email" class="form-control"/>
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-4">{{ __('employee.phone') }}</label>
                    <div class="col-md-8">
                        <input type="number" name="phone" class="form-control"/>
                        @error('phone')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-4">{{ __('employee.company_name') }}</label>
                    <div class="col-md-8">
                        <select class="form-select form-control text-primary" name="company_id">
                            <option>--- Select Company Name ---</option>
                            @foreach($company as $company)
                                <option value="{{$company->id}}"> {{$company->name}} </option>
                            @endforeach
                          </select>
                          @error('company_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-success">{{ __('employee.save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div> <!-- end row -->
@endsection
