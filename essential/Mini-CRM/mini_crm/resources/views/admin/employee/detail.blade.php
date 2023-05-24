@extends('admin.layouts.app')

@section('body')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 p-3">
                            <img src="{{asset($employee->company->logo)}}" alt="{{ $employee->company->name }}" height="290" width="310">
                            <h5 class="text-justify py-3"> {{ $employee->company->name }} </h5>
                        </div>
                        <div class="col-md-6 pt-5">
                            <h4>Employee Name: {{$employee->first_name}}   {{$employee->last_name}}  </h4>
                            <hr>
                            <h5>Employee Email: {{ $employee->email }} </h5>
                            <hr>
                            <h5>Employee Phone: {{ $employee->phone }} </h5>
                            <hr>
                            <h5>Employee🥄s  Company Name: {{ $employee->company->name }} </h5>
                            <div class="py-5">
                                <a href="{{ url('/employees') }}" class="btn btn-info" >
                                    Back Home
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
