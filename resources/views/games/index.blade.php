@extends('layout.base')

@section('content')
    <h1>Liste des matchs</h1>
    <a href="{{ route('games.create') }}">
        Créer un match
    </a>
    <br />
    @forelse ($games as $game)
        <div>
            {{ $game->date }} - {{ $game->place }} - {{ $game->status }} -
            <a href="{{ route('games.edit', $game->id) }}">
                Modifier
            </a> - 
            <a href="{{ route('games.show', $game->id) }}">
                Détails
            </a>
        </div>
    @empty
        <p>Pas de match.</p>
    @endforelse
@endsection