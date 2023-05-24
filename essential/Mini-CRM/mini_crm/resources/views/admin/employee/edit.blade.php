@extends('admin.layouts.app')

@section('body')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('employee.update_employee') }}</h4>
                    <p class="card-title-desc">{{Session::get('message')}}</p>
                    <form action="{{ route('employees.update', $employee->id) }}" method="Post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-form-label col-md-4">{{ __('employee.first_name') }}</label>
                            <div class="col-md-8">
                                <input type="text" name="first_name" value="{{$employee->first_name}}"  class="form-control"/>
                                @error('first_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-4">{{ __('employee.last_name') }}</label>
                            <div class="col-md-8">
                                <input type="text" name="last_name" value="{{$employee->last_name}}"  class="form-control"/>
                                @error('last_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-4">{{ __('employee.email') }}</label>
                            <div class="col-md-8">
                                <input type="email" name="email" value="{{$employee->email}}" readonly class="form-control"/>
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-4">{{ __('employee.phone') }}</label>
                            <div class="col-md-8">
                                <input type="number" name="phone"  value="{{$employee->phone}}" class="form-control"/>
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
                                <button type="submit" class="btn btn-success">{{ __('employee.update_employee') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
