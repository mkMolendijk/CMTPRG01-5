<div class="modal fade" id="addGenre" tabindex="-1" role="dialog" aria-labelledby="addGenreLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="addGenreLabel">Add a genre</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="">
                    {{ method_field('POST') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="game-title">Title:</label>
                        <input type="text" class="form-control" id="genreTitle" placeholder="Genre title">
                    </div>

                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>