@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md">
                <button type="button" class="btn btn-success float-right spacing-bottom" data-toggle="modal"
                        data-target="#addGame">
                    Add game
                </button>
            </div>
        </div>
    @include('partials/session-status')

    {{--@include('dashboard/search-games')--}}
        <div class="row">
            <div class="col-md">
                <div class="card">
                    <h3 class="card-header">All games</h3>
                    <div class="card-body">
                    <!-- Grid -->
                        @include('dashboard/games-grid')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('dashboard/add-game-modal')

@endsection
