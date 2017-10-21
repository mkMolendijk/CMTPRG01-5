<div id="games-list-table">
    <table class="table games-table">
        <thead>
        <td>
            <strong>
                Id
            </strong>
        </td>
        <td>
            <strong>
                Title
            </strong>
        </td>
        <td>
            <strong>
                Cover image
            </strong>
        </td>
        <td>
            <strong>
                Genre
            </strong>
        </td>
        </thead>
        @foreach($games as $game)
            <tr>
                <td class="td-centered">{{ $game->id }}</td>
                <td class="td-centered">{{ $game->title }}</td>
                <td class="td-centered">{{ $genreTitle }}</td>
                <td class="td-cover td-centered"><img class="game-cover" src="{{ $game->image }}"></td>
            </tr>
        @endforeach
    </table>
</div>