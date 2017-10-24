@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row spacing-bottom">
            <div class="col-md-8 col-md-offset-2">
                <a href="{{ url('/admin') }}" class="btn btn-default">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    Return to admin panel
                </a>
                @include('partials/session-status')
                <a class="btn btn-success pull-right" data-toggle="modal" data-target="#addGame">
                    <span class="glyphicon glyphicon-plus"></span>
                    Add game
                </a>
            </div>
        </div>
        @include('admin/search-games')
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
                    @include('admin/games-list')

                    <!-- Grid -->
                        @include('admin/games-grid')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin/add-game-modal')

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