<div class="modal fade" id="addGenre" tabindex="-1" role="dialog" aria-labelledby="addGenreLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addGenreLabel">Add a genre</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="addGenre" method="PATCH" action="{{ url('admin/edit-genre') }}">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                <div class="modal-body">

                    <div class="form-group">
                        <label for="genreTitle">Edit genre:</label>
                        <input type="text" class="form-control" id="genreTitle" name="genreTitle" placeholder="Genre title">
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