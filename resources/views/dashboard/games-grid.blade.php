<div id="games-flex-grid">
    @foreach($games as $game)
        <div class="grid-item">
            <div class="thumbnail">
                <img class="thumbnail" src="{{ $game->image }}">
                <div class="caption">
                    <h3 class="game-title">{{ $game->title }}</h3>
                    <p>{{ $genreTitle }}</p>
                    <p>{{ $game->description }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>