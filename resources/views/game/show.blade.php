@extends('layouts.app')
@push('styles')
    <link href="{{ asset('vendor/css/dropzone.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header  bg-purple border-0">My Screenshots</div>

                <div class="card-body">
                   <p>My name is <strong>{{$game->name}}</strong>, and my email is <strong>{{$game->email}}</strong>.</p>

                    <form action="/file-upload" method="post" enctype="multipart/form-data" class="dropzone">
                        <div class="fallback">
                            <input name="file" type="file" multiple />
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script src="{{ asset('vendor/js/dropzone.js') }}" defer></script>
    <script>
        myDropzone.on("complete", function(file) {
        myDropzone.removeFile(file);
        });
    </script>
@endpush
@endsection
