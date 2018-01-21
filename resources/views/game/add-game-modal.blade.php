<div class="modal fade" id="addGame" tabindex="-1" role="dialog" aria-labelledby="addGameLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addGameLabel">Add a game</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="addGame" method="POST" action="{{ url('game/add-game') }}" enctype="multipart/form-data">
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
                            @foreach ($genre as $option)
                                <option>{{ $option->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gameDesc">Enter description</label>
                        <textarea class="form-control" id="gameDesc" name="gameDesc" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>