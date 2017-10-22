<div id="games-flex-grid">
    @foreach($games as $game)
        <div class="grid-item">
            <a href="{{ url('/admin/game-detail/'.$game->id) }}" >
                <div class="thumbnail">
                    <img class="thumbnail grid-img" src="{{ $game->image }}">
                    <div class="caption">
                        <h3 class="game-title">{{ $game->title }}</h3>
                        <p>{{ $genreTitle }}</p>
                        <p>{{ $game->description }}</p>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>