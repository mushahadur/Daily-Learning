<div class="row">
    <div class="col-sm-6">
        <div class="dropdown" style="margin-bottom: 20px">
            <button class="btn btn-otr-primary dropdown-toggle waves-effect waves-light" type="button"
                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Explore Service Status <i class="mdi mdi-chevron-down"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                @foreach ($status as $item)
                    <a class="dropdown-item" href="#">{{ $item }}</a>
                @endforeach
            </div>
        </div>
    </div>
