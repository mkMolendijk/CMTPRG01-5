@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row spacing-bottom">
            <div class="col-md">
                {{--TODO: Make back button partial--}}
                {{--<a href="{{ url('/dashboard/') }}" class="btn btn-primary">--}}
                    {{--<span class="glyphicon glyphicon-chevron-left"></span>--}}
                    {{--Return to dashboard--}}
                {{--</a>--}}
                @foreach($gameObj as $game)
                    @if(Auth::user()->id == $game->user_id)
                        <button href="" class="btn btn-success float-right" data-toggle="modal" data-target="#editGame">
                            Edit game
                        </button>
                    @endif
                @endforeach
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
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('dashboard/edit-game-details')
@endsection