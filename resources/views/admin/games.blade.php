@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row spacing-bottom">
            <div class="col-md">
                @include('partials/back')

                <button class="btn btn-outline-success float-right" data-toggle="modal" data-target="#addGame">
                    Add game
                </button>
            </div>
        </div>

        @include('partials/session-status')

        @include('partials/search')

        <div class="row">
            <div class="col-md">
                <div class="card">
                    <h3 class="card-header">Manage games</h3>
                    <div class="card-body">
                        <!-- Grid -->
                        @include('admin/games-grid')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('game/add-game-modal')

@endsection