<div class="modal fade" id="add-game-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add a game</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('addGame') }}">
                    {{ method_field('POST') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="game-title">Title:</label>
                        <input type="text" class="form-control" id="game-title" placeholder="Game title">
                    </div>
                    <div class="form-group">
                        <label for="game-cover">Game cover:</label>
                        <input type="file" id="game-cover">
                        <p class="help-block">Upload the cover of the game.</p>
                    </div>
                    <div class="form-group">
                        <label>Genre:</label>
                        <select class="form-control" id="game-rating">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Rating:</label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" id="rating1" value="option1"> 1
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" id="rating2" value="option2"> 2
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" id="rating3" value="option3"> 3
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" id="rating4" value="option4"> 4
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" id="rating5" value="option5"> 5
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Description (optional)</label>
                        <textarea class="form-control" id="game-desc" rows="3"></textarea>

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