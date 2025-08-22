<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Footix</title>
</head>
<body>
    <ul>
        <li>
            <a href="{{ route('teams.index') }}">
                Liste des équipes
            </a>
        </li>
        <li>
            <a href="{{ route('players.index') }}">
                Liste des joueurs
            </a>
        </li>
        <li>
            <a href="{{ route('games.index') }}">
                Liste des match
            </a>
        </li>
        <li>
            <a href="{{ route('goals.index') }}">
                Liste des buts
            </a>
        </li>
    </ul>
    @yield('content')
</body>
</html>