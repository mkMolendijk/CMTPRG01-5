@extends('layouts.app')

@section('title')
    {{Auth::user()->name}}'s profile
@endsection

@section('content')
    <div class="container">
        <div class="row spacing-bottom">
            <div class="col-md">
                <div class="card">
                    <h3 class="card-header">
                        {{Auth::user()->name}}
                    </h3>
                    <div class="card-body">
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
            <div class="col-md">
                <div class="card">
                    <h3 class="card-header">
                        My Games
                    </h3>
                    <div class="card-body">
                    <!-- Grid -->
                        @include('profile/games-grid')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection