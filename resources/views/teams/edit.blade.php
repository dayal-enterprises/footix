@extends('layout.base')

@section('content')
    <h1>Modifier une équipe</h1>
    <form action="{{ route('teams.update', $team->id) }}" method="post" enctype="multipart/form-data">
        @csrf

        <img src="{{ $team->logo == null ? URL::asset('images/placeholder.png') : Storage::url($team->logo) }}" alt="{{ $team->name }}" width="150">

        @method('PUT')
        <div>
            <label for="logo">Logo de l'équipe</label>
            <input type="file" name="logo" id="logo">
        </div>

        <div>
            <label for="name">Nom de l'équipe</label>
            <input type="text" name="name" id="name" placeholder="Saisir le nom de l'équipe ..." value="{{ $team->name }}">
        </div>

        <div>
            <label for="creation_date">Date de création de l'équipe</label>
            <input type="date" name="creation_date" id="creation_date" value="{{ $team->creation_date }}">
        </div>

        <button type="submit">Mettre à jour l'équipe</button>
    </form>
@endsection