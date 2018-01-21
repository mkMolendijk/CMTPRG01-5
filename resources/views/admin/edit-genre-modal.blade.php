@foreach($genres as $genre)
    <div class="modal fade" id="editGenre{{ $genre->id }}" tabindex="-1" role="dialog" aria-labelledby="editGenreLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editGenreLabel">Edit genre</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="editGenre" method="post" action="{{ url('/admin/edit-genre') }}">
                    {{ method_field('POST') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="genreTitle">Edit genre: {{ $genre->title }}</label>
                            <input type="hidden" class="form-control" id="genreId" name="genreId"
                                   value="{{ $genre->id }}">
                            <input type="text" class="form-control" id="genreTitle" name="genreTitle"
                                   placeholder="{{ $genre->title }}">
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
@endforeach
