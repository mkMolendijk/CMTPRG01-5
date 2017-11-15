@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row spacing-bottom">
            <div class="col-md">
                <a href="{{ url('/admin') }}" class="btn btn-primary float-left">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    Return to admin panel
                </a>
                <button class="btn btn-success float-right" data-toggle="modal" data-target="#addGame">
                    <span class="glyphicon glyphicon-plus"></span>
                    Add game
                </button>
                <h1 class="text-center">Games</h1>
            </div>
        </div>

        @include('partials/session-status')

        @include('admin/search-games')

        <div class="row">
            <div class="col-md">
                <!-- Grid -->
                @include('admin/games-grid')
            </div>
        </div>
    </div>

    @include('admin/add-game-modal')

@endsection