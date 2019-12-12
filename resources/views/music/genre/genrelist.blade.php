@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Genre Index!</div>
                    <p>If you want restore special Genre please enter the id below:</p>
                    <form action="../genre/restore" method="post">
                        @csrf
                        <div class="form-group mx-sm-3 mb-2 col-md-2">
                            <input type="text" class="form-control" aria-describedby="emailHelp" name="id">
                        </div>
                        <button class="btn btn-info btn-sm mx-sm-3 mb-2 col-md-2">Restore</button>

                    </form>
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
    </div>


@endsection
