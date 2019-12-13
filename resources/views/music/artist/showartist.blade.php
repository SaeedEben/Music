@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Show Artist</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <label>Artist Name</label>
                            <input class="form-control" type="text" value="{{$artist->name}}" readonly><br>
                            <label>Artist Biography</label>
                            <textarea class="form-control" type="text" readonly>{{$artist->biography}}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
