<div>
    <div class="row mb-2">
        <div class="col-md-5">
            <div class="mb-3">
                <select wire:model="sort" wire:change="filter" class="form-control" name="sort" id="Sort">
                    <option value="">Select</option>
                    <option value="asc">Oldest</option>
                    <option value="desc">Latest</option>
                    <option value="high_to_low">Price: High to Low</option>
                    <option value="low_to_high">Price: Low to High</option>
                </select>
            </div>
        </div>
        <div class="col-md-5 mb-3">
            <button type="button" class="btn waves-effect waves-light form-control"
                style="background-color: white;color: #55729e;font-weight: 900;" data-bs-toggle="modal"
                data-bs-target=".bs-filter-modal">
                <i class="fas fa-filter"></i> Filter
            </button>
        </div>
        <div class="col-md-2">
            <label data-toggle="tooltip" title="Card View"
                class="{{ $viewFormat == 1 ? 'bg-primary text-white' : 'bg-white' }} shadow rounded p-2 m-0
            mr-2 cursor-pointer"
                for="card-format">
                <input wire:model="viewFormat" type="radio" class="d-none" name="view-format" id="card-format"
                    value="1">
                <i class="fas fa-th-large"></i>
            </label>

            <label data-toggle="tooltip" title="List View"
                class="{{ $viewFormat == 2 ? 'bg-primary text-white' : 'bg-white' }} shadow rounded p-2 m-0 cursor-pointer"
                for="table-format">
                <input wire:model="viewFormat" type="radio" class="d-none" name="view-format" id="table-format"
                    value="2">
                <i class="fas fa-list"></i>
            </label>
        </div>
    </div>

    {{-- <!-- Filter Modal -->
    <form class="custom-validation" action="{{ route('sites.filter') }}" method="POST">
        @csrf
        <x-modal title='Advance Filter' id="filterModal" modalSize='modal-lg'>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="p-3">
                        <h5 class="font-size-14 mb-3">Domain Authority</h5>
                        <input type="text" id="range_DA" name="range_DA">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="p-3">
                        <h5 class="font-size-14 mb-3">Domain Rating</h5>
                        <input type="text" id="range_DR" name="range_DR">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Price</label>
                    <select class="form-control selectpicker" data-live-search="true" name="price">
                        <option value="">Select Price</option>
                        <option value="0;50">0 - 50</option>
                        <option value="51;100">51 - 100</option>
                        <option value="101;200">101 - 200</option>
                        <option value="201;300">201 - 300</option>
                        <option value="301;400">301 - 400</option>
                        <option value="401;500">401 - 500</option>
                        <option value="501;600">501 - 600</option>
                        <option value="601;700">601 - 700</option>
                        <option value="701;800">701 - 800</option>
                        <option value="801;900">801 - 900</option>
                        <option value="901;1000">901 - 1000</option>
                        <option value="1001;∞">1001 - Above</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Traffic</label>
                    <select class="form-control selectpicker" data-live-search="true" name="traffic">
                        <option value="">Select Traffic</option>
                        <option value="0;1000">0 - 1000</option>
                        <option value="1001;5000">1001 - 5000</option>
                        <option value="5001;10000">5001 - 10000</option>
                        <option value="10001;50000">10001 - 50000</option>
                        <option value="50001;100000">50001 - 100000</option>
                        <option value="1000001;1000000">1000001 - 1000000</option>
                        <option value="1000001;∞">1000001 - ∞</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    {!! Form::label('category_id', 'Catogory') !!}
                    {{ Form::select('category_id[]', $data['categories'], null, ['class' => 'select2 select2-multiple', 'multiple' => 'multiple', 'data-placeholder' => 'Choose categories']) }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    {!! Form::label('country_id', 'Country') !!}
                    {{ Form::select('country_id[]', $data['countries'], null, ['class' => 'select2 select2-multiple', 'multiple' => 'multiple', 'data-placeholder' => 'Choose countries']) }}
                </div>
                <div class="col-md-6 mb-3">
                    {!! Form::label('hyperlinks_type_id', 'Hyperlink Type') !!}
                    {{ Form::select('hyperlinks_type_id[]', $data['hyperlinks_type'], isset($exploreSite) ? $exploreSite->hyperlink_type : null, ['class' => 'select2 select2-multiple', 'multiple' => 'multiple', 'data-placeholder' => 'Choose languages']) }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Link Insertion</label>
                    <select class="form-control selectpicker" data-live-search="true" name="link">
                        <option value="">Select</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Filter by Domain</label>
                    <select class="form-control selectpicker" data-live-search="true" name="domain">
                        <option value="">Select</option>
                        <option value=".com">.com</option>
                        <option value=".net">.net</option>
                        <option value=".org">.org</option>
                        <option value=".info">.info</option>
                        <option value=".biz">.biz</option>
                    </select>
                </div>
            </div>
        </x-modal>
    </form> --}}
</div>
