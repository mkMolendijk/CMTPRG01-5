<div id="games-flex-grid">
    @foreach($games as $game)
        <div class="grid-item">
            @if ($game->user->admin === 1)
                <a class="list-link" href="{{ url('/admin/game-detail/'.$game->id) }}">
            @else
                <a class="list-link" href="{{ url('/dashboard/game-detail/'.$game->id) }}">
            @endif
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