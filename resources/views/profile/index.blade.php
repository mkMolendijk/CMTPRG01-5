@extends('layouts.app')

@section('title')
    {{Auth::user()->name}}'s profile
@endsection

@section('head')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4>{{Auth::user()->name}}</h4>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <td>Email address:</td>
                                <td>{{Auth::user()->email}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProfile">
                            Edit profile
                        </button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form role="editProfile" method="POST" action="{{ url('profile/update') }}">
                                    {{ method_field('PATCH') }}
                                    {{ csrf_field() }}
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
                                    </div>
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label for="inputName">Name</label>
                                            <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Email address</label>
                                            <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword">Password</label>
                                            <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

@section('footer')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endsection
