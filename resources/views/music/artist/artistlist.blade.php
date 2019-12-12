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
                        <th scope="col">Biography</th>
                    </tr>
                    </thead>
                    @foreach($artists as $artist)
                        <tbody>
                        <tr>
                            <th scope="row">{{$artist->id}}</th>
                            <td scope="row">{{$artist->name_fa}}</td>
                            <td scope="row">{{$artist->name_en}}</td>
                            <td scope="row">{{$artist->biography}}</td>

                        </tr>
                        </tbody>
                    @endforeach
                </table>

            </div>
        </div>
    </div>


@endsection
