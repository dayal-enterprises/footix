@extends('layout.base')

@section('content')
    <h1>Liste des joueurs</h1>
    <a href="{{ route('players.create') }}">
        Créer un joueur
    </a>
    <br />
    @forelse ($players as $player)
        <div>
            <img src="{{ $player->image == null ? URL::asset('images/placeholder.png') : Storage::url($player->image) }}" alt="{{ $player->full_name }}" width="50">-
            {{ $player->full_name }} - 
            <a href="{{ route('players.edit', $player->id) }}">
                Modifier
            </a>
        </div>
    @empty
        <p>Pas de joueur.</p>
    @endforelse
@endsection