@extends('layout.base')

@section('content')
    <h1>Créer un joueur</h1>
    <form action="{{ route('players.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div>
            @if (isset($team_id))
                <p>Équipe sélectionnée : {{ $team->name }}</p>
            @else
                <label for="teams">Équipe du joueur</label>
                <select name="team_id" id="teams">
                    <option value="">Sélectionner une équipe</option>
                    @forelse ($teams as $team)
                        <option value="{{ $team->id }}" {{ isset($team_id) && $team_id == $team->id ? 'selected' : '' }}>
                            {{ $team->name }}</option>
                    @empty
                        <option value="">Pas d'équipe.</option>
                    @endforelse
                </select>
            @endif
        </div>

        <div>
            <label for="image">Photo du joueur</label>
            <input type="file" name="image" id="image">
        </div>

        <div>
            <label for="full_name">Nom du joueur</label>
            <input type="text" name="full_name" id="full_name" placeholder="Saisir le nom du joueur ...">
        </div>

        <div>
            <label for="age">Age du joueur</label>
            <input type="number" min="1" max="60" name="age" id="age" value="1">
        </div>

        <button type="submit">Créer le joueur</button>
    </form>
@endsection
