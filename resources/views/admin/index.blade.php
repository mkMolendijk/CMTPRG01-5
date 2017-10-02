@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Admin Dashboard</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="admin-panel-container">
                            {{--TODO: add links for the admin panel to their own pages.--}}
                            <a class="block-link" href="#">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        Link to users list
                                    </div>
                                    <div class="panel-body">
                                        <h1 class="icon-centered">
                                            <span class="glyphicon glyphicon-user"></span>
                                        </h1>
                                    </div>
                                </div>
                            </a>
                            {{--TODO: add links for the admin panel to their own pages.--}}
                            <a class="block-link" href="#">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        Link to games list
                                    </div>
                                    <div class="panel-body">
                                        <h1 class="icon-centered">
                                            <span class="glyphicon glyphicon-list-alt"></span>
                                        </h1>
                                    </div>
                                </div>
                            </a>
                            {{--TODO: add links for the admin panel to their own pages.--}}
                            <a class="block-link" href="#">
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
