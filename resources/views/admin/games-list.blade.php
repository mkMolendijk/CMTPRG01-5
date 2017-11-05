<div id="games-list">
    @foreach($games as $game)
        <div class="list-item spacing-bottom">
            <a class="list-link" href="{{ url('/admin/game-detail/'.$game->id) }}">
                <div class="thumbnail">
                    <img class="thumbnail list-img pull-left" src="{{ $game->image }}">
                    <div class="caption">
                        <h3 class="game-title">{{ $game->title }}</h3>
                        <p>{{ $game->genre->title }}</p>
                        <p>{{ $game->description }}</p>
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
                </div>
            </a>
        </div>
    @endforeach
</div>