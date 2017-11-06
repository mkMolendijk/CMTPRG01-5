@extends('layouts.app')

@section('head')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection

@section('content')

    <div class="container">
        <div class="row spacing-bottom">
            <div class="col-md-8 col-md-offset-2">
                <a href="{{ url('/admin/manage-games') }}" class="btn btn-default">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    Return to games list
                </a>
                <a href="" class="btn btn-default pull-right" data-toggle="modal" data-target="#editGame">
                    <span class="glyphicon glyphicon-pencil"></span>
                    Edit game
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('partials/session-status')
            </div>
        </div>
        <div class="row">
            @foreach($gameObj as $game)
                <div class="col-md-4 col-md-offset-2">
                    <div class="game-img-container spacing-bottom">
                        <img class="game-img" src="{{ $game->image }}" alt="{{ $game->name }}"/>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="game-details">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Details
                            </div>
                            <div class="panel-body">
                                <h1 class="game-name">{{ $game->title }}</h1>
                                <strong>
                                    Genre:
                                </strong>
                                <p class="game-genre">
                                    {{ $game->genre->title }}
                                </p>
                                <strong>
                                    Rating:
                                </strong>
                                <p class="game-rating">
                                    {{ $game->rating }}/5
                                </p>
                                <strong>
                                    Description:
                                </strong>
                                <p class="game-desc">
                                    {{ $game->description }}
                                </p>
                                <strong>
                                    Created by:
                                </strong>
                                <p class="created-by">
                                    {{ $game->user->name }}
                                </p>
                                <strong>
                                    Created at:
                                </strong>
                                <p class="created-at">
                                    {{ $game->created_at }}
                                </p>

                                <div class="enabled-status">
                                    <input type="checkbox" id="{{$game->id}}" class="enabled" data-toggle="toggle"
                                           @if($game->enabled)checked @endif >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('admin/edit-game-details')
@endsection

@section('footer')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
        $(document).ready(function () {
            $('input.enabled:checkbox').change(function (e) {
                $.get('/admin/' + e.target.id + '/gameStatusToggle', null, function (r) {
                    console.log(r);
                });
            });
        });
    </script>
@endsection