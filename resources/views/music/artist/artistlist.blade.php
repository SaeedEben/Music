@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Artist List!</div>
                    <p>If you want restore special Artist please enter the id below:</p>
                    <form action="../artist/restore" method="post">
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
    </div>


@endsection
