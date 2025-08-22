@extends('layout.base')

@section('content')
    <h1>Liste des équipes</h1>
    <a href="{{ route('teams.create') }}">
        Créer une équipe
    </a>
    <br />
    @forelse ($teams as $team)
        <div>
            <img src="{{ $team->logo == null ? URL::asset('images/placeholder.png') : Storage::url($team->logo) }}" alt="{{ $team->name }}" width="50">-
            {{ $team->name }} - {{ $team->creation_date }} - 
            <a href="{{ route('teams.edit', $team->id) }}">
                Modifier
            </a>
        </div>
    @empty
        <p>Pas d'équipe.</p>
    @endforelse
@endsection