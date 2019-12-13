@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Song</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="post" action="/music/song" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="اسم فارسی" name="name[fa]"
                                           value="{{old('name[fa]')}}" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="English Name" name="name[en]"
                                           value="{{old('name[en]')}}">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="duration" name="duration"
                                           value="{{old('duration')}}">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="release at" name="release_at"
                                           value="{{old('release_at')}}">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <label>Genre</label>
                                    <select class="form-control form-control-sm" name="genre">
                                        @foreach($genre as $genr)
                                            <option>{{$genr->id}}.{{$genr->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label>Category</label>
                                    <select class="form-control form-control-sm" name="category">
                                        @foreach($category as $cat)
                                            <option>{{$cat->id}}.{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Lyric</label>
                                <textarea class="form-control" name="lyric" rows="3">{{old('lyric')}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Choose your input song</label>
                                <input type="file" class="form-control-file" name="songname">
                            </div>

                            <button type="submit" class="btn btn-success">Upload</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
