@extends('layouts.customer')

@section('title')
    Outreach Link Agency | Create Package
@endsection

@push('style')
    @livewireStyles
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/richtexteditor/rte_theme_default.css') }}" />
@endpush

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <livewire:service-order :explore_site="$explore_site" />
        </div>
    </div>
@endsection
@push('script')
    @include('components.select2-script');
    @livewireScripts
    {{-- <script type="text/javascript" src="{{ asset('assets/richtexteditor/rte.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/richtexteditor/plugins/all_plugins.js') }}"></script>
    <script>
        var editor1 = new RichTextEditor("#inp_editor1");
    </script> --}}

    <script src="https://cdn.tiny.cloud/1/2m5ighz5h4zqb899rgqy37754lzia5cbxjdk5v2rnw4jh7ff/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '.my-tiny-editor',
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

        document.addEventListener('livewire:load', function() {
            Livewire.on('contentUpdated', function(newContent) {
                tinymce.get('my-editor').setContent(newContent);
            });
        });
    </script>
@endpush
