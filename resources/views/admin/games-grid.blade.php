<div class="card-deck">
    @foreach($games as $game)
        <div class="col-sm-6 col-md-4 spacing-bottom">
            <div class="card h-100">
                <img class="card-img-top" src="{{ $game->image }}">
                <div class="card-body">
                    <h4 class="card-title">{{ $game->title }}</h4>
                    <p class="card-text">{{ $game->genre->title }}</p>
                    <p class="card-text">{{ $game->description }}</p>
                    <div class="status">
                        @if($game->enabled == "1")
                            <p class="text-success">
                                <strong>
                                    Enabled
                                </strong>
                            </p>
                        @else
                            <p class="text-danger">
                                <strong>
                                    Disabled
                                </strong>
                            </p>
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-primary btn-block" href="{{ url('/admin/game-detail/'.$game->id) }}">View details</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
