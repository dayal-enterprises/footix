<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Goal;
use App\Models\Player;
use App\Models\Team;
use App\Models\TeamGame;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $goals = Goal::all();
        return view('goals.index', [
            'goals' => $goals,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teamGames = TeamGame::all();
        $players = Player::all();
        return view('goals.create', [
            'teamGames' => $teamGames,
            'players' => $players,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Goal::create([
            'team_game_id' => $request->team_game_id,
            'player_id' => $request->player_id,
            'min' => $request->min,
            'sec' => $request->sec,
        ]);

        return back()->with('success', "Match créé avec succès !");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
