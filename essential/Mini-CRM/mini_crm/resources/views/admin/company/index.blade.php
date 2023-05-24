@extends('admin.layouts.app')

@section('body')
<div class="row">
    <div class="col-md-12">
        <div class="card py-3">
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
            <div class="col-md-3"> <a class="btn btn-primary" href="{{ route('companies.create') }}">{{ __('company.company_add') }}</a></div>

        </div>
    </div>
</div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('company.all_company_information') }}</h4>
                    <p class="ctext-center text-success">{{Session::get('message')}}</p>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>{{ __('company.si_no') }}</th>
                            <th>{{ __('company.name') }}</th>
                            <th>{{ __('company.email') }}</th>
                            <th>{{ __('company.website') }}</th>
                            <th>{{ __('company.logo') }}</th>
                            <th>{{ __('company.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($companies as $company)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$company->name}}</td>
                                <td>{{$company->email}}</td>
                                <td>{{$company->website}}</td>
                                <td><img src="{{asset('storage/Company-logos/'.$company->logo)}}" alt="{{$company->logo}}" height="30" width="40"/></td>
                                <td class="d-flex justify-content-start">
                                    <a href="{{ route('companies.show', $company->id) }}" class="btn btn-outline-info mx-1" >
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-outline-success mx-1">
                                        @method('PUT')
                                        <i class="fa fa-edit"></i>
                                    </a>
                                     <form id="delete-form" action="{{ route('companies.destroy', $company->id) }}" method="POST" >
                                         @csrf
                                         @method('DELETE')
                                            <button class="btn btn-outline-danger mx-1" type="submit"><i class="fa fa-trash"></i></button>
                                     </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
