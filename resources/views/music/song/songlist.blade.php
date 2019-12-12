@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name_fa</th>
                        <th scope="col">Name_en</th>
                        <th scope="col">Released_at</th>
                    </tr>
                    </thead>
                    @foreach($songs as $song)
                        <tbody>
                        <tr>
                            <th scope="row">{{$song->id}}</th>
                            <td scope="row">{{$song->name_fa}}</td>
                            <td scope="row">{{$song->name_en}}</td>
                            <td scope="row">{{$song->release_at}}</td>

                        </tr>
                        </tbody>
                    @endforeach
                </table>

            </div>
        </div>
    </div>


@endsection
