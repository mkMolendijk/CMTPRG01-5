@extends('layouts.app')

@section('title')
    {{Auth::user()->name}}'s profile
@endsection
{{-- TODO: Refactor profile page --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4>{{Auth::user()->name}}</h4>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <td>Name:</td>
                                <td>{{Auth::user()->name}}</td>
                                <td>
                                    <a data-toggle="modal" data-target="#editName">Edit</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Email address:</td>
                                <td>{{Auth::user()->email}}</td>
                                <td>
                                    <a data-toggle="modal" data-target="#editEmail">Edit</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td></td>
                                <td>
                                    <a data-toggle="modal" data-target="#editPass">Edit</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    @include('profile/edit-name-modal')
                    @include('profile/edit-email-modal')
                    @include('profile/edit-password-modal')
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        My Games
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
                    @include('profile/games-list')

                    <!-- Grid -->
                        @include('profile/games-grid')
                    </div>
                </div>
            </div>
        </div>
    </div>
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