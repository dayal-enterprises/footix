<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = Player::all();
        return view('players.index', [
            'players' => $players,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $teams = Team::all();
        $team = Team::find($request->team_id);
        return view('players.create', [
            'teams' => $teams,
            'team' => $team,
            'team_id' => $request->team_id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file('image');
        if ($file)
            $path = $file->store('players', 'public');

        Player::create([
            'team_id' => $request->team_id,
            'full_name' => $request->full_name,
            'age' => $request->age,
            'image' => $file ? $path : null,
        ]);

        return back()->with('success', "Joueur créé avec succès !");
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
