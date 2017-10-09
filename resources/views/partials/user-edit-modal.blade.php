<div class="modal fade" id="add-game-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="user-edit-modal">Add a game</h4>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <td>Name:</td>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td>Email address:</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td>Enabled:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Role:</td>
                        <td></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>