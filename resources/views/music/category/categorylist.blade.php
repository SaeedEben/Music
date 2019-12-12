@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">Category Index!</div>
                    <p>If you want restore special Category please enter the id below:</p>
                    <form action="../category/restore" method="post">
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
                        @foreach($categories as $category)
                            <tbody>
                            <tr>
                                <th scope="row">{{$category->id}}</th>
                                <td scope="row">{{$category->name_fa}}</td>
                                <td scope="row">{{$category->name_en}}</td>

                            </tr>
                            </tbody>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>


@endsection
