@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Update Album</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="/music/album/{{$album->id}}" method="post">
                            @csrf
                            @method('put')
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">اسم فارسی  </span>
                                </div>
                                <input type="text" class="form-control" aria-label="Sizing  input"
                                       aria-describedby="inputGroup-sizing-default" name="name[fa]" value="{{$album->name}}">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">English Name</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Sizing example input"
                                       aria-describedby="inputGroup-sizing-default" name="name[en]">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">release at</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Sizing example input"
                                       aria-describedby="inputGroup-sizing-default" name="release_at" placeholder="example:2010-10-10" value="{{$album->release_at}}">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">number of tracks</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Sizing example input"
                                       aria-describedby="inputGroup-sizing-default" name="number_of_track" value="{{$album->number_of_track}}">
                            </div>


                            <button type="submit" class="btn btn-success"> create</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
