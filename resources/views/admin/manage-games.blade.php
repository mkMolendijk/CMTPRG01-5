@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row spacing-bottom">
            <div class="col-md-8 col-md-offset-2">
                <a href="{{ url('/admin') }}" class="btn btn-default">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    Return to admin panel
                </a>
                <a class="btn btn-success pull-right" data-toggle="modal" data-target="#addGame">
                    <span class="glyphicon glyphicon-plus"></span>
                    Add game
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="well well-sm">
                    <div class="form-group">
                        <div class="input-group input-group-md">
                            <div class="icon-addon addon-md">
                                <input type="text" placeholder="Search..." class="form-control" v-model="query">
                            </div>
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button" @click="search()" v-if="!loading">Search!</button>
                                <button class="btn btn-default" type="button" disabled="disabled" v-if="loading">Searching...</button>
                        </span>
                        </div>
                    </div>
                    <div class="alert alert-danger" role="alert" v-if="error">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        @{{ error }}
                    </div>
                </div>
                <div id="games" class="row list-group">
                    <div class="item col-md-8 col-md-offset-2" v-for="game in games">
                        <div class="thumbnail">
                            <img class="group list-group-image" :src="game.image" alt="@{{ game.title }}" />
                            <div class="caption">
                                <h4 class="group inner list-group-item-heading">@{{ game.title }}</h4>
                                <p class="group inner list-group-item-text">@{{ game.description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('partials/session-status')
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