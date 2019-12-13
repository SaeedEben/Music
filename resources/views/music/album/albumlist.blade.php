@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Album List!</div>
                    <p>If you want restore special Album please enter the id below:</p>
                    <form action="../album/restore" method="post">
                        @csrf
                        <div class="form-group mx-sm-3 mb-2 col-md-2">
                            <input type="text" class="form-control" name="id">
                        </div>
                        <button class="btn btn-info btn-sm mx-sm-3 mb-2 col-md-2">Restore</button>
                    </form>
                        <table class="table table-dark">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name_fa</th>
                                <th scope="col">Name_en</th>
                                <th scope="col">number_of_track</th>
                                <th scope="col">Released_at</th>
                            </tr>
                            </thead>
                            @foreach($albums as $album)
                                <tbody>
                                <tr>
                                    <th scope="row">{{$album->id}}</th>
                                    <td scope="row">{{$album->name_fa}}</td>
                                    <td scope="row">{{$album->name_en}}</td>
                                    <td scope="row">{{$album->number_of_track}}</td>
                                    <td scope="row">{{$album->release_at}}</td>

                                </tr>
                                </tbody>
                            @endforeach
                        </table>

                </div>
            </div>
        </div>
    </div>


@endsection
