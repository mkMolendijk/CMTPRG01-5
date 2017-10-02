@extends('layouts.app')
@include('dashboard/add-game')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-hover">
                                <div class="game-table-head">
                                    <h4 class="games-table-title">
                                        Games:
                                    </h4>
                                    <button type="button" class="add-game-btn btn btn-success" data-toggle="modal"
                                            data-target="#add-game-modal">
                                        Add game
                                    </button>
                                </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
