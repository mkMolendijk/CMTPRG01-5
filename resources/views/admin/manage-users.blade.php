@extends('layouts.app')
@section('head')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
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
                        <table class="table user-table">
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
                                    Role
                                </strong>
                            </td>
                            <td>
                                <strong>
                                    Enabled
                                </strong>
                            </td>

                            <td>
                                <strong>
                                    Is admin
                                </strong>
                            </td>
                            </thead>
                            @foreach($users as $user)
                                <tr>
                                    <td class="td-centered">{{ $user->id }}</td>
                                    <td class="td-centered">{{ $user->name }}</td>
                                    <td class="td-centered">{{ $user->email }}</td>
                                    @if($user->admin == 1)
                                        <td class="td-centered">
                                            Admin
                                        </td>
                                    @else
                                        <td class="td-centered">
                                            User
                                        </td>
                                    @endif
                                    <td>
                                        <input type="checkbox" id="{{$user->id}}" class="enabled" data-toggle="toggle"
                                               @if($user->enabled)checked @endif >

                                    </td>
                                    <td>
                                        <input type="checkbox" id="{{$user->id}}" class="is-admin" data-toggle="toggle"
                                               @if($user->admin)checked @endif >
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
        $(document).ready(function () {
            $('input.enabled:checkbox').change(function (e) {
                $.get('/admin/' + e.target.id + '/toggleEnabledStatus', null, function (r) {
                    console.log(r);
                });
            });

            $('input.is-admin:checkbox').change(function (e) {
                $.get('/admin/' + e.target.id + '/toggleAdminStatus', null, function (r) {
                    console.log(r);
                });
            });
        });
    </script>
@endsection