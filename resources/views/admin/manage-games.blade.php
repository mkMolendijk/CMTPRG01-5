@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row spacing-bottom">
            <div class="col-md-8 col-md-offset-2">
                <a href="{{ url('/admin') }}" class="btn btn-default">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    Return to admin panel
                </a>
                <a class="btn btn-success pull-right" data-toggle="modal" data-target="#addGame">
                    <span class="glyphicon glyphicon-plus"></span>
                    Add game
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Manage Games</div>
                    <div class="panel-body">
                        @include('partials/session-status')
                        <table class="table games-table">
                            <thead>
                            <td>
                                <strong>
                                    Id
                                </strong>
                            </td>
                            <td>
                                <strong>
                                    Title
                                </strong>
                            </td>
                            <td>
                                <strong>
                                    Cover image
                                </strong>
                            </td>
                            <td>
                                <strong>
                                    Genre
                                </strong>
                            </td>
                            </thead>
                            @foreach($games as $game)
                                <tr>
                                    <td class="td-centered">{{ $game->id }}</td>
                                    <td class="td-centered">{{ $game->title }}</td>
                                    <td class="td-centered">{{ $genreTitle }}</td>
                                    <td class="td-cover td-centered"><img class="game-cover" src="{{ $game->image }}"></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin/add-game-modal')

@endsection