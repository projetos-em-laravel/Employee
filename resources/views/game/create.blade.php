@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header bg-purple border-0">Dashboard</div>

                <div class="card-body">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{route('game.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                                </div>
                                <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Year</span>
                                </div>
                                <input type="number" id="year" name="year" class="form-control" value="{{old('year')}}">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Category</span>
                                </div>
                                <select class="custom-select" id="category" name="category">
                                    <option {{old('category')=="rpg"? 'selected':''}}  value="rpg">rpg</option>
                                    <option {{old('category')=="action"? 'selected':''}} value="action">action</option>
                                    <option {{old('category')=="corrida"? 'selected':''}} value="action">corrida</option>
                                    <option {{old('category')=="acarde"? 'selected':''}} value="action">acarde</option>
                                </select>
                                <!-- <input type="text" id="category" name="category" class="form-control" value="{{old('category')}}"> -->
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">description</span>
                                </div>
                                <textarea rows="2" id="description" name="description" class="form-control">{{old('description')}}</textarea>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="customFile" value="{{old('image')}}">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-primary" type="submit">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
