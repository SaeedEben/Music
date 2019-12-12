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
                    </tr>
                    </thead>
                    @foreach($genres as $genre)
                        <tbody>
                        <tr>
                            <th scope="row">{{$genre->id}}</th>
                            <td scope="row">{{$genre->name_fa}}</td>
                            <td scope="row">{{$genre->name_en}}</td>

                        </tr>
                        </tbody>
                    @endforeach
                </table>

            </div>
        </div>
    </div>


@endsection
