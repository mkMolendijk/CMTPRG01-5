<!-- Edit Password Modal -->
<div class="modal fade" id="editPass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="editPass" method="POST" action="{{ url('profile/updatePassword') }}">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Change your password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <input type="hidden" id="inputId" name="inputId" value="{{ $userObj->id }}">
                        <input type="password" class="form-control" id="inputPassword"
                               name="inputPassword" placeholder="New password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close
                    </button>
                    <button type="submit" class="btn btn-outline-success">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>