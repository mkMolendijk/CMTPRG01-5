<div id="games-list">
    @foreach($games as $game)
        <div class="list-item spacing-bottom">
            @if ($game->user->admin === 1)
                <a class="list-link" href="{{ url('/admin/game-detail/'.$game->id) }}">
                    @else
                        <a class="list-link" href="{{ url('/dashboard/game-detail/'.$game->id) }}">
                            @endif
                            <div class="thumbnail">
                                <img class="thumbnail list-img pull-left" src="{{ $game->image }}">
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