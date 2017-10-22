@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row spacing-bottom">
            <div class="col-md-8 col-md-offset-2">
                <a href="{{ url('/dashboard/') }}" class="btn btn-default">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    Return to dashboard
                </a>
            </div>
        </div>
        @include('partials/session-status')
        <div class="row">
            <div class="col-md-4 col-md-offset-2">
                <div class="game-img-container spacing-bottom">
                    <img class="game-img" src="{{ $gameObj->image }}" alt="{{ $gameObj->name }}"/>
                </div>
            </div>

            <div class="col-md-4">
                <div class="game-details">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Details
                        </div>
                        <div class="panel-body">
                            <h1 class="game-name">{{ $gameObj->title }}</h1>
                            <strong>
                                Genre:
                            </strong>
                            <p class="game-genre">
                                {{ $genreObj->title }}
                            </p>
                            <strong>
                                Rating:
                            </strong>
                            <p class="game-rating">
                                {{ $gameObj->rating }}/5
                            </p>
                            <strong>
                                Description:
                            </strong>
                            <p class="game-desc">
                                {{ $gameObj->description }}
                            </p>
                            <strong>
                                Created by:
                            </strong>
                            <p class="created-by">
                                {{ $creatorObj->name }}
                            </p>
                            <strong>
                                Created at:
                            </strong>
                            <p class="created-at">
                                {{ $gameObj->created_at }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection