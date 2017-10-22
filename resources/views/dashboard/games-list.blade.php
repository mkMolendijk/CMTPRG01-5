<div id="games-list">
    @foreach($games as $game)
        <div class="list-item spacing-bottom">
            <a href="{{ url('/dashboard/game-detail/'.$game->id) }}">
                <div class="thumbnail">
                    <img class="thumbnail list-img pull-left" src="{{ $game->image }}">
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