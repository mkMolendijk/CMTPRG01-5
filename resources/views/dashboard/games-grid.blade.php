<div id="games-flex-grid">
    @foreach($games as $game)
        <div class="grid-item">
            <a class="grid-link" href="{{ url('/dashboard/game-detail/'.$game->id) }}">
                <div class="thumbnail">
                    <img class="thumbnail grid-img" src="{{ $game->image }}">
                    <div class="caption">
                        <h3 class="game-title">{{ $game->title }}</h3>
                        <p>{{ $game->genre->title }}</p>
                        <p>{{ $game->description }}</p>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>