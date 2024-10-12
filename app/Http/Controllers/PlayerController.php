<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Player;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    public function index()
    {
        $data = Player::all();
        $team = Team::all();
        return view('admin.manage.players.index', compact('data', 'team'));
    }

    public function cricketTeamStatus()
    {
        $data = Player::all();
        return view('admin.manage.players.cricket-team-status',compact('data'));
    }
    public function cricketWomenTeamStatus()
    {
        $data = Player::all();
        return view('admin.manage.players.cricket-women-team-status',compact('data'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'player_name' => 'required|max:55',
            'player_runs' => 'required|max:10',
            'player_wickets' => 'required|max:10',
            'man_women' => 'required|max:4',
        ]);

        Player::insert([
            'team_id' => $request->team_id,
            'player_name' => $request->player_name,
            'player_runs' => $request->player_runs,
            'player_wickets' => $request->player_wickets,
            'man_women' => $request->man_women,
            'player_slug' => Str::slug($request->player_name, '-')
        ]);
        $notification = array('message' => 'New player has been added.', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $player = Player::find($id);
        $player->delete();
        $notification = array('message' => 'Player has been deleted successfully.', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $data = Player::find($id);
        $team = DB::table('teams')->get();

        return view('admin.manage.players.edit', compact('data', 'team'));
    }

    public function update(Request $request)
    {
        $data = array();
        $data['team_id'] = $request->team_id;
        $data['player_name'] = $request->player_name;
        $data['player_runs'] = $request->player_runs;
        $data['player_wickets'] = $request->player_wickets;
        $data['man_women'] = $request->man_women;
        $data['player_slug'] = Str::slug($request->player_name, '-');
        DB::table('players')->where('id', $request->id)->update($data);

        $notification = array('message' => 'Player has been updated successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
