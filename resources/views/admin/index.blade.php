@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md">
                <h1 class="text-center spacing-bottom">Admin Panel</h1>

                @include('partials/session-status')
                <div class="admin-card-container">
                    <div class="row">
                        <div class="col-md">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Manage users</h4>
                                    <p class="card-text">List all users</p>
                                    <a class="btn btn-outline-primary" href="{{ url('/admin/users') }}">Manage users</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Manage games</h4>
                                    <p class="card-text">List all games</p>
                                    <a class="btn btn-outline-primary" href="{{ url('/admin/games') }}">Manage games</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Manage genres</h4>
                                    <p class="card-title">List all genres</p>
                                    <a class="btn btn-outline-primary" href="{{ url('/admin/genres') }}">Manage genres</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
