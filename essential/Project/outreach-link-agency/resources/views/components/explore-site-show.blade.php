<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div id="site-preview" class="overflow-hidden rounded overflow-hidden"
                            style="max-height: calc(200px + 30vmin); height: calc(200px + 20vmin); background-color: #f9f8fe;">
                            <iframe referrerpolicy="no-referrer" style="pointer-events: none; overflow: hidden;"
                                title="" data-toggle="tooltip" src="{{ $exploreSite->domain_url }}" loading="lazy"
                                width="100%" height="100%" frameborder="0"
                                data-original-title="{{ $exploreSite->domain_url }}"></iframe>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div id="seo-metrics" class="explore-site-section">
                            <h2 class="explore-site-section-label">
                                <span>
                                    SEO Metrics
                                </span>
                            </h2>

                            <div class="explore-site-section-content" style="">
                                <p class="mb-0">
                                    <span class="pr-3 my-1 mr-3 ml-0">
                                        <span class="key">
                                            Moz Domain Authority:
                                        </span>
                                        <span class="val badge bg-soft-success">
                                            {{ $exploreSite->moz_domain_authority }}
                                        </span>
                                    </span>

                                    <span class="p-2 pr-3 mr-3">
                                        <span class="key">
                                            Moz Spam Score:
                                        </span>
                                        <span class="val badge bg-soft-info">
                                            {{ $exploreSite->moz_spam_score }}
                                        </span>
                                    </span>

                                    <span class="p-2 pr-3 mr-3">
                                        <span class="key">
                                            Ahref Domain Rating
                                        </span>
                                        <span class="val badge bg-soft-info">
                                            {{ $exploreSite->ahref_domain_rating }}
                                        </span>
                                    </span>

                                    <span class="p-2 pr-3 mr-3">
                                        <span class="key">
                                            Ahref Organic Traffic
                                        </span>
                                        <span class="val badge bg-soft-success">
                                            {{ $exploreSite->ahref_organic_traffic }}
                                        </span>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div id="content-guidelines" class="explore-site-section">
                            <h2 class="explore-site-section-label">
                                Content Guidelines
                            </h2>
                            <div class="explore-site-section-content" style="column-count: 3; column-width: 200px;">
                                <p class="">
                                    <span class="key text-muted">Site Name:</span>
                                    <span class="val font-weight-bold">{{ $exploreSite->site_name }}</span>
                                </p>

                                <p class="categories d-flex align-items-start align-items-md-center">
                                    <span class="key text-muted">Supported Language:</span>
                                    <span class="val">
                                        @foreach ($exploreSite->languages as $item)
                                            <span
                                                class="tag tag-muted -text-muted my-1 me-2 ms-0 font-weight-bold">{{ $item->name }}</span>
                                        @endforeach
                                    </span>
                                </p>

                                <p class="">
                                    <span class="text-muted">Example Post URL:</span>
                                    <span class="val font-weight-bold">
                                        <a href="{{ $exploreSite->example_post_url }}" target="_blank"
                                            rel="noreferrer noopener" class="">View
                                            Page</a>
                                    </span>
                                </p>

                                <p class="">
                                    <span class="key text-muted">Publication Type:</span>
                                    <span
                                        class="val font-weight-bold">{{ $exploreSite->explore_publication_type->name }}</span>
                                </p>

                                <p class="">
                                    <span class="key text-muted">Max. no. of hyperlinks:</span>
                                    <span class="val font-weight-bold">2</span>
                                </p>

                                <p class="">
                                    <span class="key text-muted">Hyperlinks Type:</span>
                                    <span class="val font-weight-bold">
                                        @foreach ($exploreSite->hyperlink_type as $item)
                                            {{ $item->name }}
                                        @endforeach
                                    </span>
                                </p>
                            </div>

                            <div class="" style="">
                                <p class="categories d-flex align-items-start align-items-md-center">
                                    <span class="key text-muted">Categories:</span>
                                    <span class="val">
                                        @foreach ($exploreSite->categories as $item)
                                            <span class="tag tag-muted -text-muted my-1 me-2 ms-0">
                                                {{ $item->name }}
                                            </span>
                                        @endforeach
                                    </span>
                                </p>

                                <p class="countries d-flex align-items-start align-items-md-center">
                                    <span class="key text-muted">Leading Countries:</span>
                                    <span class="val d-flex align-items-start align-items-md-center">
                                        @foreach ($exploreSite->countries as $item)
                                            <span
                                                class="tag tag-muted tex font-weight-bold d-flex country p-2 px-2 my-1 me-2 ms-0">
                                                <span class="flag rounded-circle overflow-hidden me-2">
                                                    {{-- <img src="https://flagcdn.com/w160/es.png"
                                                        class="img-fluid w-100 h-100" alt="ES flag"> --}}
                                                    <img src="{{ asset('vendor/blade-flags/country-' . $item->code . '.svg') }}"
                                                        class="img-fluid w-100 h-100" alt="Country flag" />
                                                </span>

                                                <span class="">{{ $item->name }}</span>
                                            </span>
                                        @endforeach
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div id="about" class="explore-site-section">
                            <h2 class="explore-site-section-label">
                                About the Site
                            </h2>
                            <div class="explore-site-section-content">
                                <span class="text-muted">
                                    {!! $exploreSite->about !!}
                                </span>
                                <p class="url">
                                    <span class="key text-muted">Domain:</span>
                                    <span class="val font-weight-bold">
                                        {{ $exploreSite->domain_url }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div
                            class="action-panel h-100 flex-column d-flex justify-content-between align-item-center explore-site-section">
                            <form>
                                <div class="explore-site-buy-section">
                                    <h1 class="header-style font-weight-bold text-wrap mb-3"
                                        style="font-size: calc(8px + 1.5rem)">
                                        <a href="{{ $exploreSite->domain_url }}"
                                            target="__blank">{{ $exploreSite->domain }}</a>
                                    </h1>
                                    <ul class="options list-unstyled service">
                                        @foreach ($exploreSite->services as $item)
                                            <li
                                                class="link-insertion d-flex justify-content-between align-items-center">
                                                <div class="vstack gap-2">
                                                    <div class="form-check">
                                                        <label class="form-check-label" for="guestPosting">
                                                            {{ $item->name }}
                                                        </label>
                                                    </div>
                                                </div>
                                                <span class="price app-currency text-muted">
                                                    $ {{ $item->pivot->price }}
                                                </span>
                                            </li>
                                        @endforeach
                                        <hr>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
