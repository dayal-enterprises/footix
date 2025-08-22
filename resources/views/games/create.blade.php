@extends('layout.base')

@section('content')
    <h1>Créer un match</h1>
    <form action="{{ route('games.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="date">Date du match</label>
            <input type="date" name="date" id="date">
        </div>

        <div>
            <label for="place">Lieu ou stade</label>
            <input type="text" name="place" id="place" placeholder="Saisir le lieu ici ...">
        </div>

        <div>
            <label for="status">Status du match</label>
            <select name="status" id="status">
                <option value="{{ App\Enums\GameStatusEnum::EN_COURS->value }}">{{ App\Enums\GameStatusEnum::EN_COURS->value }}</option>
                <option value="{{ App\Enums\GameStatusEnum::TERMINE->value }}">{{ App\Enums\GameStatusEnum::TERMINE->value }}</option>
                <option value="{{ App\Enums\GameStatusEnum::A_VENIR->value }}">{{ App\Enums\GameStatusEnum::A_VENIR->value }}</option>
                <option value="{{ App\Enums\GameStatusEnum::REPORTE->value }}">{{ App\Enums\GameStatusEnum::REPORTE->value }}</option>
                <option value="{{ App\Enums\GameStatusEnum::ANNULE->value }}">{{ App\Enums\GameStatusEnum::ANNULE->value }}</option>
            </select>
        </div>

        <button type="submit">Créer le match</button>
    </form>
@endsection
