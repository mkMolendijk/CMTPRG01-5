<<<<<<< HEAD
<div id="games-flex-grid">
    @forelse($games as $game)
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
=======
@forelse($gameObj as $game)
    <div class="card-deck">
        <div class="col-sm-6 col-md-6 col-lg-4 spacing-bottom">
            <div class="card h-100">
                <div class="game-img-container">
                    <img class="card-img-top" src="{{ $game->image }}">
>>>>>>> dev
                </div>
                <div class="card-body">
                    <h4 class="card-title">{{ $game->title }}</h4>
                    <p class="card-text">{{ $game->genre->title }}</p>
                    <p class="card-text">{{ $game->description }}</p>
                </div>
                <div class="card-footer">
                    <a class="btn btn-primary btn-block" href="{{ url('/game/game-detail/'.$game->id) }}">View
                        details</a>
                </div>
            </div>
        </div>
<<<<<<< HEAD
        @empty
            <div class="alert alert-danger" role="alert">No games found</div>
    @endforelse
</div>
=======
    </div>
@empty
    <div class="alert alert-danger" role="alert">
        No games found
    </div>
@endforelse
>>>>>>> dev
