@extends('layout.base')

@section('content')
    <h1>Créer un but</h1>
    <form action="{{ route('goals.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="games">Equipe - Match</label>
            <select name="team_game_id" id="games">
                <option value="">Sélectionner un match</option>
                @forelse ($teamGames as $teamGame)
                    <option value="{{ $teamGame->id }}">
                        Match de {{ $teamGame->game->place }} le {{ $teamGame->game->date }} - Équipe : {{ $teamGame->team->name }}
                    </option>
                @empty
                    <option value="">Pas de match.</option>
                @endforelse
            </select>
        </div>

        <div>
            <label for="players">Joueur</label>
            <select name="player_id" id="players">
                <option value="">Sélectionner un joueur</option>
                @forelse ($players as $player)
                    <option value="{{ $player->id }}">
                        {{ $player->full_name }}</option>
                @empty
                    <option value="">Pas d'équipe.</option>
                @endforelse
            </select>
        </div>

        <div>
            <label for="min">Min</label>
            <input type="number" min="0" name="min" id="min" value="0">
        </div>

        <div>
            <label for="sec">Sec</label>
            <input type="number" min="0" max="60" name="sec" id="sec" value="0">
        </div>

        <button type="submit">Créer le but</button>
    </form>
@endsection
