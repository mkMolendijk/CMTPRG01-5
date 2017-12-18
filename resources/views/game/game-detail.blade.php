@extends('layouts.app')

@section('head')
    @if($admin == true)
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    @endif
@endsection

@section('content')

    <div class="container">
        <div class="row spacing-bottom">
            <div class="col-md">
                @include('partials/back')

                @if($uploader == true)
                    <button href="" class="btn btn-success float-right" data-toggle="modal" data-target="#editGame">
                        Edit game
                    </button>
                @endif
            </div>
        </div>
        @include('partials/session-status')
        <div class="row">
            @foreach($gameObj as $game)
                <div class="col-md">
                    <div class="game-img-container spacing-bottom">
                        <img class="game-img" src="{{ $game->image }}" alt="{{ $game->name }}"/>
                    </div>
                </div>

                <div class="col-md">
                    <div class="game-details">
                        <div class="card">
                            <div class="card-header">
                                Details
                            </div>
                            <div class="card-body">
                                <h1 class="game-name">{{ $game->title }}</h1>
                                <strong>
                                    Genre:
                                </strong>
                                <p class="game-genre">
                                    {{ $game->genre->title }}
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
                                <strong>
                                    Likes:
                                </strong>
                                <p class="likes">
                                    Likes int hier
                                </p>
                                @if ($admin == true)
                                    <div class="enabled-status">
                                        <input type="checkbox" id="{{$game->id}}" class="enabled" data-toggle="toggle"
                                               @if($game->enabled)checked @endif >
                                    </div>
                                @endif
                            </div>
                            <div class="card-footer">
                                <div class="like-btn">
                                    <button id="like" value="{{ Auth::user()->id }}" data-game="{{ $game->id }}" class="btn btn-primary">
                                        Like
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('dashboard/edit-game-details')
@endsection

@section('footer')
    @if ($admin == true)
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        <script>
            $(document).ready(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('input.enabled:checkbox').change(function (e) {
                    $.ajax({
                        url: '/admin/' + e.target.id + '/gameStatusToggle',
                        dataType: 'json',
                        type: 'POST',
                        data: {},
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            console.log(response);
                        }
                    });
                });

                $('#like').click(function (e) {
                    e.preventDefault();
                    var g = $(this).attr("data-game");

                    $.ajax({
                        url: '/game/likes',
                        dataType: 'json',
                        type: 'POST',
                        data: {
                            user_id: e.target.value,
                            game_id: g
                        },
                        success: function (response) {
                            console.log(response);
                        }
                    });
                });

            });
        </script>
    @endif
@endsection
