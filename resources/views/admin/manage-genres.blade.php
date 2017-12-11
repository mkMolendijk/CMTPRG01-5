@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row spacing-bottom">
            <div class="col-md">
                @include('partials/back')

                <button class="btn btn-success float-right" data-toggle="modal" data-target="#addGenre">
                    <span class="glyphicon glyphicon-plus"></span>
                    Add genre
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-md">
                <div class="card">
                    <h3 class="card-header">Manage Genres</h3>
                    <div class="card-body">
                        @include('partials/session-status')
                        <table class="table table-hover">
                            <thead>
                            <td>
                                <strong>
                                    Id
                                </strong>
                            </td>
                            <td>
                                <strong>
                                    Name
                                </strong>
                            </td>
                            </thead>
                            @foreach($genres as $genre)
                                <tr>
                                    <td>{{ $genre->id }}</td>
                                    <td>{{ $genre->title }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('admin/add-genre-modal')

@endsection
