<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\FootballTeam;
use Illuminate\Http\Request;

class FootballTeamController extends Controller
{
    public function index()
    {
        $data['title'] = 'Football Teams';
        $data = FootballTeam::all();
        return view('admin.manage.footballteams.index', compact('data'));
    }

    public function footballTeamManRankings()
    {
        $data['title'] = 'Football Teams';
        $data = FootballTeam::all()->sortByDesc('man_team_points');
        return view('admin.manage.footballteams.football-team-man-ranking-status', compact('data'));
    }
    public function footballTeamWomenRankings()
    {
        $data['title'] = 'Football Teams';
        $data = FootballTeam::all()->sortByDesc('women_team_points');
        return view('admin.manage.footballteams.football-team-women-ranking-status', compact('data'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'team_name' => 'required|unique:teams|max:55',
            'man_team_points' => 'required|max:4',
            'women_team_points' => 'required|max:4',
        ]);

        FootballTeam::insert([
            'team_name' => $request->team_name,
            'man_team_points' => $request->man_team_points,
            'women_team_points' => $request->women_team_points,
        ]);

        $notification = array('message' => 'Football Team Stored!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $data = FootballTeam::findorfail($id);
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $team = FootballTeam::where('id', $request->id)->first();
        $team->update([
            'team_name' => $request->team_name,
            'man_team_points' => $request->man_team_points,
            'women_team_points' => $request->women_team_points
        ]);

        $notification = array('message' => 'Football Team Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $team = FootballTeam::find($id);
        $team->delete();
        $notification = array('message' => 'FootballTeam Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
