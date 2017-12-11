@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row spacing-bottom">
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        <p class="lead">
                            You've searched for: "<strong>{{ $searchQuery }}</strong>"
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md">
                @foreach($results as $result)
                    <a class="no-decoration" href="{{ url('/game/game-detail/'.$result->id) }}">
                    <div class="card spacing-bottom">
                        <div class="card-body">
                            <img src="{{ $result->image }}" alt="{{ $result->title }}" class="card-img-left">
                            <div class="card-body body-img-left">
                                <h3>
                                    {{ $result->title }}
                                </h3>
                            </div>
                        </div>
                    </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection