<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTeamRequest;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();
        return view('teams.index', [
            'teams' => $teams,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTeamRequest $request)
    {
        $file = $request->file('logo');
        if ($file)
            $path = $file->store('logos', 'public');

        Team::create([
            'name' => $request->name,
            'creation_date' => $request->creation_date,
            'logo' => $file ? $path : null,
        ]);

        return back()->with('success', "Equipe créée avec succès !");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('teams.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $team = Team::find($id);
        return view('teams.edit', [
            'team' => $team,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateTeamRequest $request, string $id)
    {
        $file = $request->file('logo');
        if ($file)
            $path = $file->store('logos', 'public');

        $team = Team::find($id);

        $team->update([
            'name' => $request->name,
            'creation_date' => $request->creation_date,
            'logo' => $file ? $path : $team->logo,
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
