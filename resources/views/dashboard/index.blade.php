@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('partials/session-status')
                <button type="button" class="btn btn-success pull-right spacing-bottom" data-toggle="modal"
                        data-target="#addGame">
                    Add game
                </button>
            </div>
        </div>
        @include('dashboard/search-games')
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Games
                        <div class="game-controls pull-right">
                            <div class="btn-group">
                                <a href="#" id="list" class="btn btn-default btn-sm">
                                    <span class="glyphicon glyphicon-th-list"></span>
                                    List
                                </a>
                                <a href="#" id="grid" class="btn btn-default btn-sm">
                                    <span class="glyphicon glyphicon-th"></span>
                                    Grid
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <!-- Table -->
                    @include('dashboard/games-list')

                    <!-- Grid -->
                        @include('dashboard/games-grid')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('dashboard/add-game-modal')

@endsection

@section('footer')
    <script>
        $(document).ready(function () {
            $('#list').click(function (event) {
                event.preventDefault();
                $('#games-list').css('display', 'block');
                $('#games-flex-grid').css('display', 'none');
            });
            $('#grid').click(function (event) {
                event.preventDefault();
                $('#games-flex-grid').css('display', 'flex');
                $('#games-list').css('display', 'none');
            });
        });
    </script>
@endsection