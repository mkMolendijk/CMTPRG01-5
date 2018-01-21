<<<<<<< HEAD
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
=======
<div class="card-deck">
    @forelse($games as $game)
        <div class="col-md-6 col-md-6 col-lg-4 spacing-bottom">
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
    @empty
        <div class="alert alert-danger" role="alert">
            No games found
        </div>
    @endforelse
</div>