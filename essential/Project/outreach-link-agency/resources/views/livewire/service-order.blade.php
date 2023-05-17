<div id="order-details" class="card">
    <div class="card-header bg-white border-bottom-0 mt-3 d-flex justify-content-between align-items-center">
        <h1 class="page-title text-center text-muted font-weight-bold" style="font-size: calc(1rem + 1vmin);">
            Publish on <span class="domain header-style">{{ $explore_site->domain }}</span>
        </h1>
        <span class="badge bg-info"><span style="font-weight: 700; font-size: 18px">Price:
                ${{ $grandTotal }}</span></span>
    </div>
    <div class="card-body">
        <form id="create-order-form" wire:submit.prevent="submit">
            <div class="service-options mb-4">
                <div class="btn-group btn-group-toggle btn-toggle-options w-100" data-toggle="buttons">
                    @foreach ($service_type as $key => $val)
                        @if (in_array($val, array_column($explore_site->services->toArray(), 'name')))
                            <label class="btn btn-otr-outline-primary {{ $service == $key ? 'active' : '' }} shadow"
                                data-bs-toggle="tooltip" data-bs-placement="top">
                                <input wire:model="service" value="{{ $key }}" type="radio" name="service"
                                    autocomplete="off" class="service-option-tabs">{{ $val }}
                            </label>
                        @else
                            <label class="btn btn-otr-outline-primary disabled not-allowed" data-bs-toggle="tooltip"
                                data-bs-placement="top">
                                <input wire:model="service" value="{{ $key }}" type="radio" name="service"
                                    class="service-option-tabs" autocomplete="off">{{ $val }}
                            </label>
                        @endif
                    @endforeach
                </div>
            </div>
            @if ($service_type[$service] == 'Guest Posting')
                <div class="content-options mb-4 mt-4 text-center">
                    <div class="btn-group btn-group-toggle btn-toggle-options" data-toggle="buttons">
                        @foreach ($serviceBuyContent as $item)
                            @if ($item->name == 'Content Publication')
                                <label
                                    class="btn btn-otr-outline-primary {{ $buyContent == 'none' ? 'active' : '' }} shadow"
                                    data-bs-toggle="tooltip" data-bs-placement="top">
                                    <input wire:model="buyContent" value="none" type="radio" name="service"
                                        autocomplete="off" class="service-option-tabs">{{ $item->name }}
                                </label>
                            @else
                                <label
                                    class="btn btn-otr-outline-primary {{ $buyContent == $item->id ? 'active' : '' }} shadow"
                                    data-bs-toggle="tooltip" data-bs-placement="top">
                                    <input wire:model="buyContent" value="{{ $item->id }}" type="radio"
                                        name="service" autocomplete="off"
                                        class="service-option-tabs">{{ $item->name }}
                                </label>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
            @if (count($serviceBuyContentWordLength) && $service_type[$service] == 'Guest Posting')
                <div class="content-options mb-4 mt-4 text-center">
                    <label class="sec-title text-muted d-block text-center">
                        Choose Content Length
                    </label>
                    <div class="btn-group btn-group-toggle btn-toggle-options" data-toggle="buttons">
                        @foreach ($serviceBuyContentWordLength as $item)
                            <label
                                class="btn btn-otr-outline-primary {{ $wordLength == $item->id ? 'active' : '' }} shadow"
                                data-bs-toggle="tooltip" data-bs-placement="top">
                                <input wire:model="wordLength" value="{{ $item->id }}" type="radio"
                                    name="service" autocomplete="off" class="service-option-tabs">{{ $item->length }}
                                Words
                            </label>
                        @endforeach
                    </div>
                </div>
                @error('wordLength')
                    <span class="error d-flex justify-content-center text-center">{{ $message }}</span>
                @enderror
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        @if ($service_type[$service] == 'Guest Posting')
                            @if ($buyContent == 'none')
                                <label class="text-primary font-weight-bold" for="title">Title of the
                                    Article:</label>
                                <small id="title-help" class="text-muted d-block">
                                    Enter the title of your article. It should be 150-160 characters in length.
                                </small>
                                <input wire:model.lazy="orderData.content.title" type="text" name="title"
                                    id="title" class="form-control mt-2 empty" placeholder="My awesome article"
                                    aria-describedby="title-help">
                                @error('orderData.content.title')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            @else
                                <label class="text-primary font-weight-bold" for="topic">Topic</label>
                                <small id="topic-help" class="text-muted d-block">
                                    Enter the Topic of your content. It will be used to check the performed task for
                                    compliance
                                    with your requirements.
                                </small>
                                <input wire:model.lazy="orderData.content.topic" type="text" name="topic"
                                    id="topic" class="form-control mt-2 empty" placeholder="Enter a topic"
                                    aria-describedby="topic-help">
                                @error('orderData.content.topic')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            @endif
                        @else
                            <label class="text-primary font-weight-bold" for="post_url">Post URL</label>
                            <small id="post_url-help" class="text-muted d-block">
                                Enter the post URL from where you want to get a link. If you have been unable to find an
                                article on the publisher site that you feel would be perfect, please leave this space
                                blank. Our team will find the article and place your link accordingly for maximum
                                traction.
                            </small>
                            <input wire:model.lazy="orderData.content.post_url" type="text" name="post_url"
                                id="post_url" class="form-control mt-2 empty" placeholder="Enter a post url"
                                aria-describedby="post_url-help">
                            @error('orderData.content.post_url')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        @endif
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <div class="form-group">
                        <label for="anchor_text" class="text-primary font-weight-bold">Keyword/Anchor Text:
                        </label>
                        <small id="anchor-text-help" class="text-muted d-block">
                            Enter the main anchor text or keyword of your article. The anchor text is where the
                            publisher will add your link on.
                        </small>
                        <input wire:model.lazy="orderData.content.anchor_text" type="text" name="anchor_text"
                            id="anchor_text" class="form-control mt-2 empty" placeholder="A perfect anchor text"
                            aria-describedby="anchor-text-help">

                        @error('orderData.content.anchor_text')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <div class="form-group">
                        <label for="landing-page" class="text-primary font-weight-bold">Landing Page/Link URL:
                        </label>
                        <small id="landing-page-help" class="text-muted d-block">
                            Enter the landing page or link of your article. It should be your main landing page or
                            link on which the anchor text will carry.
                        </small>
                        <input wire:model.lazy="orderData.content.landing_page" type="text" name="landing-page"
                            id="landing-page" class="form-control mt-2 empty" placeholder="My awesome landing page"
                            aria-describedby="title-help">
                        @error('orderData.content.landing_page')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                @if ($service_type[$service] == 'Guest Posting' && $buyContent == 'none')
                    <div class="col-12 mt-4">
                        <div wire:key="content-group" class="form-group">
                            <label for="content" class="text-primary font-weight-bold">Article Content:</label>
                            <small id="content-help" class="text-muted d-block mb-2">
                                Add your content here. Please make sure the above anchor and landing page exist in
                                the content. You can copy and paste the content from a Word Doc that should contain
                                the Anchor Text and Anchor Link/Landing Page URL here.
                            </small>
                            <div wire:ignore>
                                <textarea wire:model.lazy="content" class="min-h-fit h-48 " name="content" id="content"></textarea>
                            </div>
                            @error('content')
                                <span class="error">{{ $message }}</span>
                            @enderror

                        </div>
                @endif

                <div class="col-12  mt-4">
                    <div wire:ignore="" wire:key="insturctions-group" class="form-group">
                        <label for="instructions" class="text-primary font-weight-bold">Special
                            Instructions:</label>
                        <small id="instructions-help" class="text-muted d-block mb-2">
                            If you have any special requirements or suggestions for us, please mention them here.
                            Our team will make sure that we go through them and incorporate them in your order.
                        </small>

                        <div wire:ignore>
                            <textarea wire:model.lazy="specialInstruction" class="min-h-fit h-48 " name="specialInstruction"
                                id="specialInstruction"></textarea>
                        </div>
                        @error('specialInstruction')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
            </div>

        </form>
    </div>


    <div wrie:key="prices-section" id="order-prices" class="c_panel mt-5">

        <div class="card-header text-center text-primary section-label font-weight-bold"
            style="font-size: calc(8px + 0.75rem);">
            Payable for: {{ $explore_site->domain }}
        </div>
        <div class="card-body">
            <table class="prices m-auto table table-borderless w-auto" style="min-width: calc(100px + 50vmin);">
                <tbody class="">
                    <tr class="border-bottom">

                        @foreach ($explore_site->services as $item)
                            @if ($item->id === $service)
                                <span class="app-currency"></span>
                                <td class="text-muted">{{ $item->name }}</td>
                                <td class="text-primary"><span class="app-currency">$
                                        {{ $item->pivot->price }}</span>
                            @endif
                        @endforeach

                        </td>
                    </tr>
                    @if (!is_null($getContentWordLength))
                        <tr class="border-bottom">
                            <td class="text-muted">Content Writing({{ $getContentWordLength->length }})words </td>
                            <td class="text-primary"><span class="app-currency">$
                                    {{ $getContentWordPrice }}</span>
                            </td>
                        </tr>
                    @endif
                </tbody>
                <tfoot class="">
                    <tr class="border-bottom font-weight-bold">
                        <td class="text-primary">Total Amount</td>
                        <td class="text-primary"><span class="app-currency">$ {{ $grandTotal }}
                            </span></td>
                    </tr>
                </tfoot>
            </table>

            <div class="w-100 text-center mt-3">
            </div>

            <div class="actions mt-4 text-center">
                <button type="submit" form="create-order-form" class="btn btn-otr-primary m-2"
                    style="color: #896cfe">Save &amp;
                    Next</button>
            </div>

        </div>
    </div>
</div>

@push('scripts')
    <script>
        tinymce.init({
            selector: '#content',
            plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
            imagetools_cors_hosts: ['picsum.photos'],
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
            toolbar_sticky: true,
            forced_root_block: false,
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.set('content', editor.getContent());
                });
            }
        });


        tinymce.init({
            selector: '#specialInstruction',
            plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
            imagetools_cors_hosts: ['picsum.photos'],
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
            toolbar_sticky: true,
            forced_root_block: false,
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.set('specialInstruction', editor.getContent());
                });
            }
        });
    </script>
@endpush
