@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-3 card-profile">
                    <div class="card shadow-lg">
                        <div class="card-horizontal">
                            <div class="img-profile">
                                <img class="card-img-top img-fluid" src=" {{ url("storage/games/{$game->image}") }}">
                            </div>
                            <div class="card-body-profile">
                                <h4 class="card-name-profile text-purple">{{$game->name}}</h4>

                                <dl>
                                    <dd class="list-item">
                                        <strong> Year: </strong>
                                        <span class="badge badge-light">{{$game->year}}</span>
                                    </dd>
                                    <dd class="list-item">
                                        <strong> Category: </strong>
                                        <span class="badge badge-light">{{$game->category}}</span>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">{{$game->description}}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-1 col-xl-2 card-profile-left">
            <div class="card border-0 shadow-lg bg-white rounded" style="width: 10rem;">
                <img class="card-img-top img-fluid" src=" {{ url("storage/games/{$game->image}") }}">
                <button class="btn btn-warning shadow">
                    <h5 class="card-title font-weight-bold">{{$game->name}}</h5>
                </button>
                <div class="card-body-profile-left">
                    <dl>
                        <dd class="list-item">
                            <strong> Year: </strong>
                            <span class="badge badge-light">{{$game->year}}</span>
                        </dd>
                        <dd class="list-item">
                            <strong> Category: </strong>
                            <span class="badge badge-light">{{$game->category}}</span>
                        </dd>
                    </dl>
                </div>
                <div class="card-footer">
                    <p class="card-text">{{$game->description}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-10">
            <div class="card border-0 shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header  bg-purple border-0">My Screenshots</div>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{session('success')}}
                        </div>
                    @endif
                <div class="card-body">
                   <div class="row">
                        @foreach($game->screenshot as $screenshot)
                            <div class="col-lg-4 col-md-6 bloco-card">
                                <div class="card shadow-lg" style="width: 16rem;">

                                    <!-- Card image -->
                                    <div class="box-image">
                                        <img class="card-img-top card-image shadow" src=" {{ url("storage/games/screenshots/{$screenshot->screenshot}") }}">
                                    </div>
                                    <div class="subtitle-card-image shadow ">
                                        <h6 class="font-weight-bold py-2 text-center">{{$screenshot->subtitle}}</h6>
                                    </div>
                                    <!-- Card content -->
                                    <div class="card-body card-body-height text-center">

                                        <!-- Title -->
                                        <h4 class="card-title"><strong>{{$screenshot->title}}</strong></h4>

                                        <!-- Text -->
                                        <p class="card-text text-muted">
                                            {{$screenshot->description}}
                                        </p>


                                        <form action="{{route('screenshot.destroy', $screenshot->id)}}" method="POST">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <div class="card-button">
                                                <a id="update-screenshot" type="button" class="btn btn-small btn-info text-white button"
                                                    data-toggle="modal" data-target="#screenshotModalUpdate"
                                                    data-id="{{$screenshot->id}}"
                                                    data-title="{{$screenshot->title}}"
                                                    data-subtitle="{{$screenshot->subtitle}}"
                                                    data-description="{{$screenshot->description}}"
                                                    data-screenshot="{{ url("storage/games/screenshots/{$screenshot->screenshot}") }}">
                                                    <i class="fa fa-edit"></i></a>
                                                <!-- Twitter -->
                                                <button type="submit" class="btn btn-small bg-purple text-white button"><i class="fa fa-trash-o"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer">
                    <!-- Button trigger modal -->
                    <button type="button" id="create-screenshot" class="btn btn-primary" data-toggle="modal" data-target="#screenshotModalCreate">
                    Create new screenshot
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal screenshot -->
    @include('game.modals.screenshotCreate')
    @include('game.modals.screenshotUpdate')
<!-- /.tab-pane -->

@push('js')
    <script src="{{asset('custom/js/modalsCustom.js')}}"></script>
@endpush
@endsection
