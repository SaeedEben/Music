@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Artist Index!</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <button type="button" class="btn-lg btn-block btn-success"><a href="artist/create"
                                                                                      style="text-decoration: none; color: #171a1d;">Create</a>
                        </button>


                        <table class="table table-dark">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name_fa</th>
                                <th scope="col">Name_en</th>
                                <th scope="col">Do Some...</th>
                            </tr>
                            </thead>
                            @foreach($artists as $artist)
                                <tbody>
                                <tr>
                                    <th scope="row">{{$artist->id}}</th>
                                    <td>{{$artist->name_fa}}</td>
                                    <td>{{$artist->name_en}}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="First group">
                                            <button type="button" class="btn btn-warning"><a
                                                    href="artist/{{$artist->id}}"
                                                    style="text-decoration: none; color: #171a1d;">Show</a>
                                            </button>

                                            <button type="button" class="btn btn-secondary"><a
                                                    href="updateart/{{$artist->id}}"
                                                    style="text-decoration: none; color: #171a1d;">Update</a>
                                            </button>
                                            <form action="artist/{{$artist->id}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger" style="color: #171a1d;">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                                </tbody>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
