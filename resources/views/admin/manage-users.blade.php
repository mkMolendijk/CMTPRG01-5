@extends('layouts.app')

@section('content')

    <div class="container">
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
                                    Name:
                                </strong>
                            </td>
                            <td>
                                <strong>
                                    Email address:
                                </strong>
                            </td>
                            <td>
                                <strong>
                                    Enabled:
                                </strong>
                            </td>
                            <td>
                                <strong>
                                    Role:
                                </strong>
                            </td>
                            </thead>
                            @foreach($users as $user)
                                <a data-toggle="collapse" href="@include('partials/user-edit-collapse')"
                                   aria-expanded="false" aria-controls="userEditCollapse">
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        @if($user->enabled == 0)
                                            <td>Disabled</td>
                                        @else
                                            <td>Enabled</td>
                                        @endif
                                        @if($user->admin == 1)
                                            <td>Admin</td>
                                        @else
                                            <td>User</td>
                                        @endif
                                    </tr>
                                </a>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection