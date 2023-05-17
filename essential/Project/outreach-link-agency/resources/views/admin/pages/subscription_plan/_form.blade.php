@if (isset($subscription_plan))
    {!! Form::model($subscription_plan, [
        'url' => "admin/subscription-plan/$subscription_plan->id",
        'method' => 'put',
        'class' => 'form-horizontal',
        'before' => 'csrf',
    ]) !!}
@else
    {!! Form::open(['url' => 'admin/subscription-plan', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    {{-- {!! Form::token() !!} --}}
@endif
{{-- {!! Form::open(['url' => 'department']) !!} --}}
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <div class="row">
        <div class="col-sm-6 mb-3">
            {!! Form::label('name', 'Subscription Plan Name') !!}
            {!! Form::text('name', null, [
                'class' => 'form-control',
                'placeholder' => 'Subscribe Plan Name',
                'autocomplete' => 'off',
                'require' => 'required',
            ]) !!}
            <span class="text-danger">
                {{ $errors->first('name') }}
            </span>
        </div>
        <div class="col-sm-6 mb-3">
            {!! Form::label('name', 'Price ( $ )') !!}
            {!! Form::number('price', null, ['class' => 'form-control', 'placeholder' => 'Enter Price', 'require' => 'required', 'autocomplete' => 'off']) !!}
            <span class="text-danger">
                {{ $errors->first('price') }}
            </span>
        </div>
        <div class="col-sm-12 mb-3">
            {!! Form::textarea('description', null, [
                'class' => 'form-control editor',
                'rows' => 30,
                'cols' => 10,
                'placeholder' => 'Describe your subscription plan',
                'id' => 'editor',
            ]) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('name', 'Subscription plan status') !!}
            {{ Form::select('is_active', ['1' => 'Active', '0' => 'Inactive'], $package->is_active ?? null, ['class' => 'form-control']) }}
        </div>
        <div class="col-sm-6">
            {!! Form::label('name', 'Validity') !!}
            {{ Form::select('validity', ['Monthly' => 'Monthly', 'Yearly' => 'Yearly'], $package->validity ?? null, ['class' => 'form-control']) }}
        </div>
    </div>
</div>

@if (isset($package))
    {!! Form::Submit('Update', ['class' => 'btn btn-success pull-right mt-3']) !!}
@else
    {!! Form::Submit('Submit', ['class' => 'btn btn-primary pull-right mt-3']) !!}
@endif



{!! Form::close() !!}
