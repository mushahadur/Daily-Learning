<div class="data-table-component table-responsive">
    {{-- <table id="data-table" class="table"> --}}
    <table id="data-table" class="table table-centered datatable dt-responsive nowrap table-card-list"
        style="border-collapse: collapse; border-spacing: 0 12px; width: 100%;">
        <thead>
            <tr>
                @foreach ($headers as $item)
                    <th>{{ $item }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>
