@if (isset($package))
    {!! Form::model($package, [
        'url' => "admin/package/$package->id",
        'method' => 'put',
        'class' => 'form-horizontal',
        'before' => 'csrf',
    ]) !!}
@else
    {!! Form::open(['url' => 'admin/package', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    {{-- {!! Form::token() !!} --}}
@endif
{{-- {!! Form::open(['url' => 'department']) !!} --}}
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <div class="row">
        <div class="col-sm-6 mb-3">
            {!! Form::label('name', 'Package Name') !!}
            {!! Form::text('name', null, [
                'class' => 'form-control',
                'placeholder' => 'Enter Package Name',
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
        <div class="col-sm-6 mb-3">
            {!! Form::label('name', 'Initial Quantity') !!}
            {!! Form::number('initial_quantity', null, [
                'class' => 'form-control',
                'placeholder' => 'Enter Initial Quantity',
                'require' => 'required',
                'autocomplete' => 'off',
            ]) !!}
            <span class="text-danger">
                {{ $errors->first('initial_quantity') }}
            </span>
        </div>
        <div class="col-sm-6 mb-3">
            {!! Form::label('name', 'Increment/Decrement Quantity') !!}
            {!! Form::number('increment_decrement_quantity', null, [
                'class' => 'form-control',
                'placeholder' => 'Enter Increment/Decrement Quantity',
                'require' => 'required',
                'autocomplete' => 'off',
            ]) !!}
            <span class="text-danger">
                {{ $errors->first('increment_decrement_quantity') }}
            </span>
        </div>
        <div class="col-sm-12 mb-3">
            {!! Form::textarea('description', null, [
                'class' => 'form-control',
                'rows' => 30,
                'cols' => 10,
                'placeholder' => 'Describe your package',
                'id' => 'editor',
            ]) !!}
        </div>
        <div class="col-sm-12">
            {!! Form::label('name', 'Package Status') !!}
            {{ Form::select('is_active', ['1' => 'Active', '0' => 'Inactive'], $package->is_active ?? null, ['class' => 'form-control']) }}
        </div>
    </div>
</div>

@if (isset($package))
    {!! Form::Submit('Update', ['class' => 'btn btn-success pull-right mt-3']) !!}
@else
    {!! Form::Submit('Submit', ['class' => 'btn btn-primary pull-right mt-3']) !!}
@endif



{!! Form::close() !!}
