@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row spacing-bottom">
            <div class="col-md">
                @include('partials/back')

                <button class="btn btn-outline-success float-right" data-toggle="modal" data-target="#addGenre">
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
                            <td></td>
                            <td></td>
                            </thead>
                            @foreach($genres as $genre)
                                <tr>
                                    <td>
                                        {{ $genre->id }}
                                    </td>
                                    <td>
                                        {{ $genre->title }}
                                    </td>
                                    <td>
                                        <form role="removeGenre" method="POST" action="{{ '/admin/remove-genre' }}">
                                            {{ method_field('POST') }}
                                            {{ csrf_field() }}
                                            <input type="hidden" name="genreId" value="{{ $genre->id }}">
                                            <button class="btn btn-outline-danger float-right">
                                                Remove
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-success float-right" data-toggle="modal" data-target="#editGenre{{ $genre->id }}">
                                            Edit
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin/add-genre-modal')
    @include('admin/edit-genre-modal')

@endsection
