@extends('layouts.app')

@section('title')
    {{Auth::user()->name}}'s profile
@endsection

@section('content')
    <div class="container">

        <div class="row spacing-bottom">
            <div class="col-md">
                @include('partials/back')
            </div>
        </div>

        <div class="row spacing-bottom">
            <div class="col-md">
                @include('partials/session-status')
            </div>
        </div>

        <div class="row spacing-bottom">
            <div class="col-md">
                <div class="card">
                    <h3 class="card-header">
                        My Details
                    </h3>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>Name:</td>
                                <td>{{$userObj->name}}</td>
                                <td>
                                    <button class="btn btn-outline-success float-right" data-toggle="modal" data-target="#editName">Edit</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Email address:</td>
                                <td>{{$userObj->email}}</td>
                                <td>
                                    <button class="btn btn-outline-success float-right" data-toggle="modal" data-target="#editEmail">Edit</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td></td>
                                <td>
                                    <button class="btn btn-outline-success float-right" data-toggle="modal" data-target="#editPass">Edit</button>
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