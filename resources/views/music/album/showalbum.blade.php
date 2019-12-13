@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Show Album</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <label>Album Name</label>
                            <input class="form-control" type="text" value="{{$album->name}}" readonly><br>
                            <label>Album release at</label>
                            <input class="form-control" type="text" readonly value="{{$album->release_at}}"><br>
                            <label>Album number of track</label>
                            <input class="form-control" type="text" readonly value="{{$album->number_of_track}}"><br>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
