@extends('layout.base')

@section('content')
    <h1>Liste des buts</h1>
    <a href="{{ route('goals.create') }}">
        Créer un but
    </a>
    <br />
    <hr />
    @forelse ($goals as $goal)
        <div>
            Match: {{ $goal->teamGame->game->place }} : {{ $goal->teamGame->game->date }}<br />
            Equipe: {{ $goal->teamGame->team->name }}<br />
            Joueur: {{ $goal->player->full_name }}<br />
            Temps: {{ $goal->min }}:{{ $goal->sec }}<br />
        </div>
        <hr />
    @empty
        <p>Pas de but.</p>
    @endforelse
@endsection