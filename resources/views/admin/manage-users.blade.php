@extends('layouts.app')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('content')

    <div class="container">
        <div class="row spacing-bottom">
            <div class="col-md">
                <a href="{{ url('/admin') }}" class="btn btn-primary">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    Return to admin panel
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md">
                <div class="card">
                    <h3 class="card-header">Manage Users</h3>
                    <div class="card-body">
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
                                        <form role="enabledToggle" method="POST" action="{{ url('/admin/{id}/toggleEnabledStatus') }}" enctype="multipart/form-data">
                                            {{ method_field('POST') }}
                                            {{ csrf_field() }}                                            <input type="checkbox" id="{{$user->id}}" class="enabled"
                                                   data-toggle="toggle"
                                                   @if($user->enabled)checked @endif >
                                        </form>

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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('input.enabled:checkbox').change(function (e) {
                $.ajax({
                    url: '/admin/' + e.target.id + '/toggleEnabledStatus',
                    dataType : 'json',
                    type: 'POST',
                    data: {},
                    contentType: false,
                    processData: false,
                    success:function(response) {
                        console.log(response);
                    }
                });
            });

            $('input.is-admin:checkbox').change(function (e) {
                $.ajax({
                    url: '/admin/' + e.target.id + '/toggleAdminStatus',
                    dataType : 'json',
                    type: 'POST',
                    data: {},
                    contentType: false,
                    processData: false,
                    success:function(response) {
                        console.log(response);
                    }
                });
            });
        });
    </script>
@endsection