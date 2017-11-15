<div class="modal fade" id="editGame" tabindex="-1" role="dialog" aria-labelledby="editGameLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editGameLabel">Edit a game</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="editGameDetails" method="POST" action="{{ url('admin/editGameDetails/'. $game->id) }}"
                  enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="gameTitle">Enter new game title:</label>
                        <input type="text" class="form-control" id="gameTitle" name="gameTitle"
                               value="{{ $game->title }}">
                    </div>
                    <div class="form-group">
                        <label for="gameGenre">Edit genre:</label>
                        <select class="form-control" id="gameGenre" name="gameGenre">
                            @foreach ($genreObj as $option)
                                <option>{{ $option->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gameRating">Edit your rating:</label>
                        <div class="form-group">
                            <label class="radio-inline">
                                <input type="radio" name="gameRating" id="gameRating" value="1"> 1
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="gameRating" id="gameRating" value="2"> 2
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="gameRating" id="gameRating" value="3"> 3
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="gameRating" id="gameRating" value="4"> 4
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="gameRating" id="gameRating" value="5"> 5
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gameDesc">Edit description</label>
                        <textarea class="form-control" id="gameDesc" name="gameDesc"
                                  rows="3">{{ $game->description }}</textarea>
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