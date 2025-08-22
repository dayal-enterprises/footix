@extends('layout.base')

@section('content')
    <h1>Détails du match</h1>
    <p>
        <b>Date</b>: {{ $game->date }}<br />
        <b>Lieu</b>: {{ $game->place }}<br />
        <b>Status</b>: {{ $game->status }}<br />
    </p>
    <div style="display: flex; gap: 20px">
        @foreach ($game->teamGames as $teamGame)
            @if ($loop->last)
                <div>{{ $teamGame->goals()->count() }}&nbsp;&nbsp;</div>
            @endif
            <div>
                {{ $teamGame->team->name }}
                @foreach ($teamGame->goals as $goal)
                    <div>
                        {{ $goal->player->full_name }} {{ $goal->min }}:{{ $goal->sec }}
                    </div>
                @endforeach
            </div>
            @if ($loop->first)
                <div>&nbsp;&nbsp;{{ $teamGame->goals()->count() }}</div>
                <div>-</div>
            @endif
        @endforeach
    </div>
@endsection
