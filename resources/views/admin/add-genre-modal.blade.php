<div class="modal fade" id="addGenre" tabindex="-1" role="dialog" aria-labelledby="addGenreLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addGenreLabel">Add a genre</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="addGenre" method="POST" action="{{ url('admin/add-genre') }}">
                {{ method_field('POST') }}
                {{ csrf_field() }}
                <div class="modal-body">

                    <div class="form-group">
                        <label for="genreTitle">Enter a genre:</label>
                        <input type="text" class="form-control" id="genreTitle" name="genreTitle" placeholder="Genre title">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-success">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>