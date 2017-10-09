@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row spacing-bottom">
            <div class="col-md-8 col-md-offset-2">
                <a href="{{ url('/admin') }}" class="btn btn-default">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    Return to admin panel
                </a>

                <a href="#" class="btn btn-success pull-right">
                    <span class="glyphicon glyphicon-plus"></span>
                    Add game
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Manage Games</div>
                    <div class="panel-body">
                        @include('partials/session-status')
                        Hier komen alle games in een table view
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection