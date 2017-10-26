<div class="modal fade" id="addGame" tabindex="-1" role="dialog" aria-labelledby="addGameLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="addGameLabel">Add a game</h4>
            </div>
            <form role="addGame" method="POST" action="{{ url('dashboard/addGame') }}" enctype="multipart/form-data">
                {{ method_field('POST') }}
                {{ csrf_field() }}
                <div class="modal-body">

                    <div class="form-group">
                        <label for="gameTitle">Game title:</label>
                        <input type="text" class="form-control" id="gameTitle" name="gameTitle"
                               placeholder="Game title">
                    </div>
                    <div class="form-group">
                        <label for="gameImg">Upload game image:</label>
                        <input type="file" id="gameImg" name="gameImg">
                    </div>
                    <div class="form-group">
                        <label for="gameGenre">Select genre:</label>
                        <select class="form-control" id="gameGenre" name="gameGenre">
                            @foreach ($genres as $option)
                                <option>{{ $option->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gameRating">Enter your rating:</label>
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
                        <label for="gameDesc">Enter description (optional)</label>
                        <textarea class="form-control" id="gameDesc" name="gameDesc" rows="3"></textarea>
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