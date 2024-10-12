<?php

namespace App\Http\Controllers;

use App\Models\FootballTeam;
use Illuminate\Http\Request;
use App\Models\FootballPlayer;
use Illuminate\Support\Facades\DB;

class FootballPlayerController extends Controller
{
    public function index()
    {
        $data = FootballPlayer::all();
        $team = FootballTeam::all();
        return view('admin.manage.footballplayers.index', compact('data', 'team'));
    }

    public function footballTeamStatus()
    {
        $data = FootballPlayer::all();
        return view('admin.manage.footballplayers.football-teams-status',compact('data'));
    }
    public function footballWomenTeamStatus()
    {
        $data = FootballPlayer::all();
        return view('admin.manage.footballplayers.football-women-teams-status',compact('data'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'player_name' => 'required|max:55',
            'goals' => 'required|max:4',
            'assists' => 'required|max:4',
            'man_women' => 'required|max:4',
        ]);

        FootballPlayer::insert([
            'team_id' => $request->team_id,
            'player_name' => $request->player_name,
            'goals' => $request->goals,
            'assists' => $request->assists,
            'man_women' => $request->man_women,
        ]);
        $notification = array('message' => 'Player Stored!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $player = FootballPlayer::find($id);
        $player->delete();
        $notification = array('message' => 'Player Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $data = FootballPlayer::find($id);
        $team = DB::table('football_teams')->get();

        return view('admin.manage.footballplayers.edit', compact('data', 'team'));
    }

    public function update(Request $request)
    {
        $data = array();
        $data['team_id'] = $request->team_id;
        $data['player_name'] = $request->player_name;
        $data['goals'] = $request->player_name;
        $data['assists'] = $request->player_name;
        $data['man_women'] = $request->man_women;
        DB::table('football_players')->where('id', $request->id)->update($data);

        $notification = array('message' => 'Player Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
