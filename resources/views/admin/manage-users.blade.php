@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row spacing-bottom">
            <div class="col-md-8 col-md-offset-2">
                <a href="{{ url('/admin') }}" class="btn btn-default">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    Return to admin panel
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Manage Users</div>
                    <div class="panel-body">
                        @include('partials/session-status')
                        <table class="table table-hover">
                            <thead>
                            <td>
                                <strong>
                                    Id
                                </strong>
                            </td>
                            <td>
                                <strong>
                                    Name
                                </strong>
                            </td>
                            <td>
                                <strong>
                                    Email address
                                </strong>
                            </td>
                            <td>
                                <strong>
                                    Enabled
                                </strong>
                            </td>
                            <td>
                                <strong>
                                    Role
                                </strong>
                            </td>
                            </thead>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    @if($user->enabled == 0)
                                        <td>
                                            <a href="#">
                                                Disabled
                                            </a>
                                        </td>
                                    @else
                                        <td>
                                            <a href="#">
                                                Enabled
                                            </a>
                                        </td>
                                    @endif
                                    @if($user->admin == 1)
                                        <td>
                                            <a href="#">
                                                Admin
                                            </a>
                                        </td>
                                    @else
                                        <td>
                                            <a href="#">
                                                User
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection