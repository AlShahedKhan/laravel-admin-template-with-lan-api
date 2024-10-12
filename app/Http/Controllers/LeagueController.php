<?php

namespace App\Http\Controllers;

use App\Models\FootballTeam;
use App\Models\League;
use Illuminate\Http\Request;
use DateTime;


class LeagueController extends Controller
{
    public function index()
    {
        $leagues = League::orderBy('league_start_time', 'DESC')->paginate(10);
        return view('leagues.index', compact('leagues'));
    }
    public function create()
    {
        $team = FootballTeam::all();
        return view('leagues.create',compact('team'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'league_name' => 'required',
            'venue' => 'required',
            'league_start_time' => 'required|date',
            'league_end_time' => 'required|date|after:league_start_time',
        ]);

        League::create($request->all());

        return redirect()->route('leagues.index')
            ->with('success', 'League created successfully.');
    }

    public function edit($id)
    {
        $leagues = League::find($id);

        $startTime = new DateTime($leagues->league_start_time);
        $endTime = new DateTime($leagues->league_end_time);
        
        return view('leagues.edit', compact('leagues','startTime','endTime'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'league_name' => 'required',
            'venue' => 'required',
            'league_start_time' => 'required|date',
            'league_end_time' => 'required|date|after:league_start_time',
        ]);


        $leagues = League::find($id);
        $leagues->update($request->all());

        
        return redirect()->route('leagues.index')
            ->with('success', 'Leagues updated successfully.');
    }

    public function delete($id)
    {
        $leagues = League::find($id);
        $leagues->delete();

        return redirect()->route('leagues.index')
            ->with('success', 'Leagues deleted successfully.');
    }
}
