@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Admin Dashboard</div>
                    <div class="panel-body">
                        @include('partials/session-status')
                        <div class="admin-panel-container">
                            <a class="block-link" href="{{ url('/admin/manage-users') }}">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        Manage users
                                    </div>
                                    <div class="panel-body">
                                        <h1 class="icon-centered">
                                            <span class="glyphicon glyphicon-user"></span>
                                        </h1>
                                    </div>
                                </div>
                            </a>
                            <a class="block-link" href="{{ url('/admin/manage-games') }}">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        Manage games
                                    </div>
                                    <div class="panel-body">
                                        <h1 class="icon-centered">
                                            <span class="glyphicon glyphicon-list-alt"></span>
                                        </h1>
                                    </div>
                                </div>
                            </a>
                            <a class="block-link" href="{{ url('/admin/manage-genres') }}">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        Manage Genre's
                                    </div>
                                    <div class="panel-body">
                                        <h1 class="icon-centered">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
