<!-- Edit Email Modal -->
<div class="modal fade" id="editEmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="editEmail" method="post" action="{{ url('/profile/update-email') }}">
                {{ method_field('POST') }}
                {{ csrf_field() }}
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Change your email address</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputEmail">Email address</label>
                        <input type="hidden" id="inputId" name="inputId" value="{{ $userObj->id }}">
                        <input type="email" class="form-control" id="inputEmail" name="inputEmail"
                               value="{{ $userObj->email }}">
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