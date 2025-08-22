@extends('layout.base')

@section('content')
    <h1>Modifier un match</h1>
    <form action="{{ route('games.update', $game->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="date">Date du match</label>
            <input type="date" name="date" id="date" value="{{ $game->date }}">
        </div>

        <div>
            <label for="place">Lieu ou stade</label>
            <input type="text" name="place" id="place" placeholder="Saisir le lieu ici ..."
                value="{{ $game->place }}">
        </div>

        <div>
            <label for="status">Status du match</label>
            <select name="status" id="status">
                <option value="{{ App\Enums\GameStatusEnum::EN_COURS->value }}"
                    {{ $game->status == App\Enums\GameStatusEnum::EN_COURS->value ? 'selected' : '' }}>
                    {{ App\Enums\GameStatusEnum::EN_COURS->value }}
                </option>
                <option value="{{ App\Enums\GameStatusEnum::TERMINE->value }}"
                    {{ $game->status == App\Enums\GameStatusEnum::TERMINE->value ? 'selected' : '' }}>
                    {{ App\Enums\GameStatusEnum::TERMINE->value }}
                </option>
                <option value="{{ App\Enums\GameStatusEnum::A_VENIR->value }}"
                    {{ $game->status == App\Enums\GameStatusEnum::A_VENIR->value ? 'selected' : '' }}>
                    {{ App\Enums\GameStatusEnum::A_VENIR->value }}
                </option>
                <option value="{{ App\Enums\GameStatusEnum::REPORTE->value }}"
                    {{ $game->status == App\Enums\GameStatusEnum::REPORTE->value ? 'selected' : '' }}>
                    {{ App\Enums\GameStatusEnum::REPORTE->value }}
                </option>
                <option value="{{ App\Enums\GameStatusEnum::ANNULE->value }}"
                    {{ $game->status == App\Enums\GameStatusEnum::ANNULE->value ? 'selected' : '' }}>
                    {{ App\Enums\GameStatusEnum::ANNULE->value }}
                </option>
            </select>
        </div>

        @php
            $exculedId = 0;
        @endphp

        <div>
            <label for="team-1">Équipe 1</label>
            <select name="team_1" id="team-1">
                <option value="">Sélectionner l'équipe 1</option>
                @forelse ($teams as $team)
                    <option value="{{ $team->id }}"
                        {{ $game->teamGames()->where('team_id', $team->id)->get()->count() > 0 ? 'selected' : '' }}>
                        @if ($game->teamGames()->where('team_id', $team->id)->get()->count() > 0)
                            @php
                                $exculedId = $team->id;
                            @endphp
                            {{ $team->name }}
                        @endif
                    </option>
                @empty
                    <option value="">Pas d'équipe</option>
                @endforelse
            </select>
        </div>

        <div>
            <label for="team-2">Équipe 2</label>
            <select name="team_2" id="team-2">
                <option value="">Sélectionner l'équipe 2</option>
                @forelse ($teams as $team)
                    <option value="{{ $team->id }}"
                        {{ $game->teamGames()->where('team_id', $team->id)->where('team_id', '<>', $exculedId)->get()->count() > 0 ? 'selected' : '' }}>
                        {{ $team->name }}
                    </option>
                @empty
                    <option value="">Pas d'équipe</option>
                @endforelse
            </select>
        </div>

        <button type="submit">Mettre à jour le match</button>
    </form>
@endsection
