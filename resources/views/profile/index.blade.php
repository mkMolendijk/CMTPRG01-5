@extends('layouts.app')

@section('title')
    {{Auth::user()->name}}'s profile
@endsection
{{-- TODO: Refactor profile page --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4>{{Auth::user()->name}}</h4>
                    </div>
                    <div class="panel-body">
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
                    <!-- Edit Name Modal -->
                    <div class="modal fade" id="editName" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form role="editName" method="POST" action="{{ url('profile/updateName') }}">
                                    {{ method_field('PATCH') }}
                                    {{ csrf_field() }}
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Change your name</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="inputName">Name</label>
                                            <input type="text" class="form-control" id="inputName" name="inputName"
                                                   placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                        </button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Email Modal -->
                    <div class="modal fade" id="editEmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form role="editEmail" method="POST" action="{{ url('profile/updateEmail') }}">
                                    {{ method_field('PATCH') }}
                                    {{ csrf_field() }}
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Change your email address</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="inputEmail">Email address</label>
                                            <input type="email" class="form-control" id="inputEmail" name="inputEmail"
                                                   placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                        </button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Password Modal -->
                    <div class="modal fade" id="editPass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form role="editPass" method="POST" action="{{ url('profile/updatePassword') }}">
                                    {{ method_field('PATCH') }}
                                    {{ csrf_field() }}
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Change your password</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="inputPassword">Password</label>
                                            <input type="password" class="form-control" id="inputPassword"
                                                   name="inputPassword" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                        </button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
