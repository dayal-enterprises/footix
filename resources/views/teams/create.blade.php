@extends('layout.base')

@section('content')
    <h1>Créer une équipe</h1>
    <form action="{{ route('teams.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="logo">Logo de l'équipe</label>
            <input type="file" name="logo" id="logo">
        </div>

        <div>
            <label for="name">Nom de l'équipe</label>
            <input type="text" name="name" id="name" placeholder="Saisir le nom de l'équipe ...">
        </div>

        <div>
            <label for="creation_date">Date de création de l'équipe</label>
            <input type="date" name="creation_date" id="creation_date">
        </div>

        <button type="submit">Créer l'équipe</button>
    </form>
@endsection