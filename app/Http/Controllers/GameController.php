<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use App\Models\TeamGame;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::all();
        return view('games.index', [
            'games' => $games,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        Game::create([
            'date' => $request->date,
            'place' => $request->place,
            'status' => $request->status,
        ]);

        return back()->with('success', "Match créé avec succès !");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $game = Game::find($id);
        return view('games.show', [
            'game' => $game,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $game = Game::find($id);
        $teams = Team::all();
        return view('games.edit', [
            'game' => $game,
            'teams' => $teams,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $game = Game::find($id);

        $game->update([
            'date' => $request->date,
            'place' => $request->place,
            'status' => $request->status,
        ]);

        TeamGame::create([
            'game_id' => $id,
            'team_id' => $request->team_1,
        ]);

        TeamGame::create([
            'game_id' => $id,
            'team_id' => $request->team_2,
        ]);

        return back()->with('success', "Equipe créée avec succès !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
