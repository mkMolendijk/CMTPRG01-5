<div id="games-flex-grid">
    @foreach($games as $game)
        <div class="grid-item spacing-bottom">
            <a class="grid-link" href="{{ url('/admin/game-detail/'.$game->id) }}">
                <div class="thumbnail">
                    <img class="thumbnail grid-img" src="{{ $game->image }}">
                    <div class="caption">
                        <h3 class="game-title">{{ $game->title }}</h3>
                        <p>{{ $game->genre->title }}</p>
                        <p>{{ $game->description }}</p>
                    </div>
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
            </a>
        </div>
    @endforeach
</div>