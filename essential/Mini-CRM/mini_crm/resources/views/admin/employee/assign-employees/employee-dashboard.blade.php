
@extends('admin.layouts.app')

@section('body')
    <div class="row">
<div class="col-md-4 mx-auto">
    <div class="card">

        <p class="card-title-desc">{{Session::get('message')}}</p>
        <div class="card-body">
            <h3 class="text-center pb-5">Employee   Dashboard</h3>

        </div>
    </div>
</div>
</div> <!-- end row -->
@endsection
