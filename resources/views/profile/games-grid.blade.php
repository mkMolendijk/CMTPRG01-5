<div class="card-deck">
    @forelse($games as $game)
        <div class="col-sm-6 col-md-4 spacing-bottom">
            <div class="card">
                <img class="card-img-top" src="{{ $game->image }}">
                <div class="card-body">
                    <h4 class="card-title">{{ $game->title }}</h4>
                    <p class="card-text">{{ $game->genre->title }}</p>
                    <p class="card-text">{{ $game->description }}</p>
                </div>
                <div class="card-footer">
                    @if ($game->user->admin === 1)
                        <a class="btn btn-primary btn-block" href="{{ url('/admin/game-detail/'.$game->id) }}">View
                            details</a>
                    @else
                        <a class="btn btn-primary btn-block" href="{{ url('/dashboard/game-detail/'.$game->id) }}">View
                            details</a>
                    @endif
                </div>
            </div>
        </div>
</div>
@empty
    <div class="alert alert-danger" role="alert">No games found</div>
@endforelse
