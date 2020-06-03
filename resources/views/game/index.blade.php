@extends('layouts.app')

@push('styles')
    <link href="{{ asset('custom/css/styles.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg p-3 mb-5 bg-white rounded">

                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{session('success')}}
                        </div>
                    @endif
                    <table class="table">
                        <thead class="thead-purple">
                            <tr>
                                <th style="text-align:center">#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($games as $game)
                            <tr>
                                <td scope="row"> <div class="circle"> <img src=" {{ url("storage/games/thumbnail/{$game->image}") }}"> </div> </td>
                                <td scope="row">{{$game->name}}</td>
                                <td>{{$game->description}}</td>
                                <td class="td-action">
                                    <form action="{{route('game.destroy', $game->id)}}" method="POST">
                                        @csrf
                                        <a href="{{route('game.show', $game->id)}}" class="btn btn-outline-success">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{route('game.edit', $game->id)}}" class="btn btn-outline-primary">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>
                                        <button type="submit" class="btn btn-outline-danger">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <a href="{{route('game.create')}}" class="btn btn-secondary">New game</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
