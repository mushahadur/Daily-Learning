@if (isset($exploreSite))
    {!! Form::model($exploreSite, [
        'url' => "admin/explore_site/$exploreSite->id",
        'method' => 'put',
        'class' => 'form-horizontal',
    ]) !!}
@else
    {!! Form::open(['url' => 'admin/explore_site', 'method' => 'post', 'class' => 'form-horizontal']) !!}
@endif

<div class="row">
    <div class="col-lg-12">
        <div id="addsite-accordion" class="custom-accordion">
            {{-- Site Basic Info --}}
            <div class="card">
                <a href="#addsite-basic-collapse" class="text-dark" data-bs-toggle="collapse" aria-expanded="true"
                    aria-controls="addsite-basic-collapse">
                    <div class="p-4">

                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar-xs">
                                    <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                        01
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="font-size-16 mb-1">Site Basic Info</h5>
                                <p class="text-muted text-truncate mb-0">Fill all information below</p>
                            </div>
                            <div class="flex-shrink-0">
                                <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                            </div>

                        </div>

                    </div>
                </a>

                <div id="addsite-basic-collapse" class="collapse show" data-bs-parent="#addsite-accordion">
                    <div class="p-4 border-top">

                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <div class="form-group {{ $errors->has('site_name') ? 'has-error' : '' }}">
                                    {!! Form::label('site_name', 'Site Name') !!}
                                    {!! Form::text('site_name', null, [
                                        'class' => 'form-control',
                                        'placeholder' => 'Enter Site Name',
                                        'autocomplete' => 'off',
                                    ]) !!}
                                    <span class="text-danger">
                                        {{ $errors->first('site_name') }}
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="form-group {{ $errors->has('domain') ? 'has-error' : '' }}">
                                    {!! Form::label('domain', 'Domain') !!}
                                    {!! Form::text('domain', null, [
                                        'class' => 'form-control',
                                        'placeholder' => 'Enter Domain',
                                        'autocomplete' => 'off',
                                    ]) !!}
                                    <span class="text-danger">
                                        {{ $errors->first('domain') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <div class="form-group {{ $errors->has('domain_url') ? 'has-error' : '' }}">
                                    {!! Form::label('domain_url', 'Domain Url') !!}
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon3">https://example.com</span>
                                        {!! Form::text('domain_url', null, [
                                            'class' => 'form-control',
                                            'placeholder' => 'Enter Domain Url',
                                            'autocomplete' => 'off',
                                            'aria-describedby' => 'basic-addon3',
                                        ]) !!}
                                    </div>
                                    <span class="text-danger">
                                        {{ $errors->first('domain_url') }}
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="form-group {{ $errors->has('example_post_url') ? 'has-error' : '' }}">
                                    {!! Form::label('example_post_url', 'Example Post Url') !!}
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon3">https://example.com/blog</span>
                                        {!! Form::text('example_post_url', null, [
                                            'class' => 'form-control',
                                            'placeholder' => 'Enter Example Post Url',
                                            'autocomplete' => 'off',
                                        ]) !!}
                                    </div>
                                    <span class="text-danger">
                                        {{ $errors->first('example_post_url') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- SEO Matrics --}}
            <div class="card">
                <a href="#addsite-seo-collapse" class="text-dark collapsed" data-bs-toggle="collapse"
                    aria-haspopup="true" aria-expanded="false" aria-haspopup="true"
                    aria-controls="addsite-seo-collapse">
                    <div class="p-4">

                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar-xs">
                                    <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                        02
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="font-size-16 mb-1">SEO Metrics</h5>
                                <p class="text-muted text-truncate mb-0">Fill all information below</p>
                            </div>
                            <div class="flex-shrink-0">
                                <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                            </div>

                        </div>

                    </div>
                </a>

                <div id="addsite-seo-collapse" class="collapse" data-bs-parent="#addsite-accordion">
                    <div class="p-4 border-top">

                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <div class="form-group {{ $errors->has('moz_domain_authority') ? 'has-error' : '' }}">
                                    {!! Form::label('moz_domain_authority', 'Moz Domain Authority') !!}
                                    {!! Form::number('moz_domain_authority', null, [
                                        'class' => 'form-control',
                                        'placeholder' => 'Enter Moz Domain Authority',
                                        'autocomplete' => 'off',
                                    ]) !!}
                                    <span class="text-danger">
                                        {{ $errors->first('moz_domain_authority') }}
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="form-group {{ $errors->has('moz_spam_score') ? 'has-error' : '' }}">
                                    {!! Form::label('moz_spam_score', 'Moz Spam Score') !!}
                                    {!! Form::number('moz_spam_score', null, [
                                        'class' => 'form-control',
                                        'placeholder' => 'Enter Moz Spam Score',
                                        'autocomplete' => 'off',
                                    ]) !!}
                                    <span class="text-danger">
                                        {{ $errors->first('moz_spam_score') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <div class="form-group {{ $errors->has('ahref_domain_rating') ? 'has-error' : '' }}">
                                    {!! Form::label('ahref_domain_rating', 'Ahref Domain Rating') !!}
                                    {!! Form::number('ahref_domain_rating', null, [
                                        'class' => 'form-control',
                                        'placeholder' => 'Enter Ahref Domain Rating',
                                        'autocomplete' => 'off',
                                    ]) !!}
                                    <span class="text-danger">
                                        {{ $errors->first('ahref_domain_rating') }}
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="form-group {{ $errors->has('ahref_organic_traffic') ? 'has-error' : '' }}">
                                    {!! Form::label('ahref_organic_traffic', 'Ahref Organic Traffic') !!}
                                    {!! Form::number('ahref_organic_traffic', null, [
                                        'class' => 'form-control',
                                        'placeholder' => 'Enter Ahref Organic Traffic',
                                        'autocomplete' => 'off',
                                    ]) !!}
                                    <span class="text-danger">
                                        {{ $errors->first('ahref_organic_traffic') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Content Guidelines --}}
            <div class="card">
                <a href="#addsite-guidline-collapse" class="text-dark collapsed" data-bs-toggle="collapse"
                    aria-haspopup="true" aria-expanded="false" aria-haspopup="true"
                    aria-controls="addsite-guidline-collapse">
                    <div class="p-4">

                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar-xs">
                                    <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                        03
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="font-size-16 mb-1">Content Guidelines</h5>
                                <p class="text-muted text-truncate mb-0">Fill all information below</p>
                            </div>
                            <div class="flex-shrink-0">
                                <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                            </div>

                        </div>

                    </div>
                </a>

                <div id="addsite-guidline-collapse" class="collapse" data-bs-parent="#addsite-accordion">
                    <div class="p-4 border-top">

                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <div class="form-group {{ $errors->has('max_no_of_hyperlink') ? 'has-error' : '' }}">
                                    {!! Form::label('max_no_of_hyperlink', 'Max. no. of hyperlinks') !!}
                                    {!! Form::number('max_no_of_hyperlink', null, [
                                        'class' => 'form-control',
                                        'placeholder' => 'Enter Max. no. of hyperlinks',
                                        'autocomplete' => 'off',
                                    ]) !!}
                                    <span class="text-danger">
                                        {{ $errors->first('max_no_of_hyperlink') }}
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                {!! Form::label('explore_publication_type_id', 'Publication Type') !!}
                                {{ Form::select('explore_publication_type_id', $data['publication_type'], null, ['class' => 'select2 publication-type-input', 'placeholder' => '']) }}
                                <span class="text-danger">
                                    {{ $errors->first('explore_publication_type_id') }}
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                {!! Form::label('hyperlinks_type_id', 'Hyperlink Type') !!}
                                {{ Form::select('hyperlinks_type_id[]', $data['hyperlinks_type'], isset($exploreSite) ? $exploreSite->hyperlink_type : null, ['class' => 'select2 select2-multiple', 'multiple' => 'multiple', 'data-placeholder' => 'Choose hyperlink type']) }}
                                <span class="text-danger">
                                    {{ $errors->first('hyperlinks_type_id') }}
                                </span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                {!! Form::label('language_id', 'Supported Language') !!}
                                {{ Form::select('language_id[]', $data['supported_languages'], isset($exploreSite) ? $exploreSite->languages : null, ['class' => 'select2 select2-multiple', 'multiple' => 'multiple', 'data-placeholder' => 'Choose languages']) }}
                                <span class="text-danger">
                                    {{ $errors->first('language_id') }}
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                {!! Form::label('category_id', 'Catogory') !!}
                                {{ Form::select('category_id[]', $data['categories'], isset($exploreSite) ? $exploreSite->categories : null, ['class' => 'select2 select2-multiple', 'multiple' => 'multiple', 'data-placeholder' => 'Choose categories']) }}
                                <span class="text-danger">
                                    {{ $errors->first('category_id') }}
                                </span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                {!! Form::label('country_id', 'Country') !!}
                                {{ Form::select('country_id[]', $data['countries'], isset($exploreSite) ? $exploreSite->countries : null, ['class' => 'select2 select2-multiple', 'multiple' => 'multiple', 'data-placeholder' => 'Choose countries']) }}
                                <span class="text-danger">
                                    {{ $errors->first('country_id') }}
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 my-3">
                                {!! Form::textarea('about', null, [
                                    'class' => 'form-control editor',
                                    'rows' => 30,
                                    'cols' => 10,
                                    'placeholder' => 'Describe about your explore site',
                                ]) !!}
                                <span class="text-danger">
                                    {{ $errors->first('hyperlink_type') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Service Type and Price --}}
            <div class="card">
                <a href="#addsite-servicetype-collapse" class="text-dark collapsed" data-bs-toggle="collapse"
                    aria-haspopup="true" aria-expanded="false" aria-haspopup="true"
                    aria-controls="addsite-servicetype-collapse">
                    <div class="p-4">

                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar-xs">
                                    <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                        04
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="font-size-16 mb-1">Service Type & Price</h5>
                                <p class="text-muted text-truncate mb-0">Fill all information below</p>
                            </div>
                            <div class="flex-shrink-0">
                                <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                            </div>

                        </div>

                    </div>
                </a>

                <div id="addsite-servicetype-collapse" class="collapse" data-bs-parent="#addsite-accordion">
                    <div class="p-4 border-top">
                        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <div class="vstack gap-2">
                                    <table>
                                        {{-- @dump($data['service_type']) --}}
                                        @foreach ($data['service_type'] as $key => $val)
                                            @php
                                                $input_val = '';
                                            @endphp
                                            @if (isset($services))
                                                @foreach ($services as $item)
                                                    @php
                                                        if ($item->id == $key) {
                                                            $input_val = $item->value;
                                                        }
                                                    @endphp
                                                @endforeach
                                            @endif
                                            <tr>
                                                <td><input {{ $input_val ? 'checked' : null }}
                                                        data-id="{{ $key }}" type="checkbox"
                                                        class="serviceType-enable"
                                                        {{ $val === 'Guest Posting' ? 'required' : '' }}></td>
                                                <td>{{ $val }}</td>
                                                <td>
                                                    <input data-id="{{ $key }}"
                                                        name="service-type[{{ $key }}]" type="text"
                                                        value="{{ $input_val ?? null }}"
                                                        {{ $input_val ? null : 'disabled' }}
                                                        class="serviceType-amount form-control" placeholder="Price"
                                                        {{ $val === 'Guest Posting' ? 'required' : '' }}>
                                                    {{-- {!! Form::text('service-type[{{ $key }}]', $services, null, [
                                                        'class' => 'serviceType-amount form-control',
                                                        'placeholder' => 'Enter Price',
                                                        'autocomplete' => 'off',
                                                    ]) !!} --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                    @foreach ($data['service_type'] as $item)
                                        <div class="form-check">
                                            {{-- <input class="form-check-input" type="checkbox" id="formCheck1"
                                                name="service_type[]" value="{{ $key }}">
                                            <input {{ $val ? 'checked' : null }} data-id="{{ $key }}"
                                                type="checkbox" class="service-enable">
                                            <label class="form-check-label" for="formCheck1">
                                                {{ $val }}
                                            </label> --}}
                                        </div>
                                        <div class="">
                                            {{-- <input value="{{ $val ?? null }}" {{ $val ? null : 'disabled' }}
                                                data-id="{{ $key }}" name="services[{{ $key }}]"
                                                type="text" class="service-price form-control"
                                                placeholder="Price"> --}}
                                        </div>
                                    @endforeach
                                </div>
                                {{-- <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                                    {!! Form::label('price', 'Price') !!}
                                    {!! Form::number('price', null, [
                                        'class' => 'form-control',
                                        'placeholder' => 'Enter Price',
                                        'autocomplete' => 'off',
                                    ]) !!}
                                    <span class="text-danger">
                                        {{ $errors->first('price') }}
                                    </span>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@if (isset($exploreSite))
    {!! Form::button('<i class="fas fa-save"></i> Update', [
        'type' => 'submit',
        'class' => 'btn btn-success pull-right mt-4',
    ]) !!}
@else
    {!! Form::button('<i class="fas fa-save"></i> Submit', [
        'type' => 'submit',
        'class' => 'btn btn-otr-primary pull-right mt-4',
    ]) !!}
@endif



{!! Form::close() !!}
