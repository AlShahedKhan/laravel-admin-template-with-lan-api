<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Matchh;
use App\Models\Player;
use App\Models\Series;
use App\Models\Scoreupdate;
use App\Models\Updatebowler;
use Illuminate\Http\Request;
use App\Models\Scorebattersecond;
use Illuminate\Support\Facades\DB;

class ScorebattersecondController extends Controller
{
    public function index()
    {
        $data['scorebattersecond'] = Scorebattersecond::all();
        $data['series'] = Series::all();
        $data['match'] = Matchh::all();
        $data['scoreupdate'] = Scoreupdate::all();
        $data['updatebowler'] = Updatebowler::all();
        return view('admin.manage.scorebattersecond.index', compact('data'));
    }

    public function store(Request $request)
    {
        Scorebattersecond::insert([
            'series_id' => $request->series_id,
            'match_id' => $request->match_id,
            'team_id' => $request->team_id,
            'player_id' => $request->player_id,
            'scoreupdate_id' => $request->scoreupdate_id,
            'outby_id' => $request->outby_id,
            'one_id' => $request->one_id,
            'two_id' => $request->two_id,
            'three_id' => $request->three_id,
            'four_id' => $request->four_id,
            'six_id' => $request->six_id,
            'balls_played_id' => $request->balls_played_id,
        ]);
        $notification = array('message' => 'Score Batter Second Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $scorebattersecond = Scorebattersecond::find($id);
        $scorebattersecond->delete();
        $notification = array('message' => 'Score Batter Second Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $data = Scorebattersecond::find($id);
        $series = Series::all();
        $match = Matchh::all();
        $team = Team::where('id', $data->team_id)->first();
        $player = Player::where('id', $data->team_id)->first();
        $scoreupdate = DB::table('scoreupdates')->get();
        $updatebowler = DB::table('updatebowlers')->get();

        return view('admin.manage.scorebattersecond.edit', compact(
            'series',
            'data',
            'match',
            'team',
            'player',
            'scoreupdate',
            'updatebowler',
            'scoreupdate'
        )
        );
    }

    public function update(Request $request)
    {
        $data = array();
        $data['scoreupdate_id'] = $request->scoreupdate_id;
        $data['outby_id'] = $request->outby_id;
        $data['one_id'] = $request->one_id;
        $data['two_id'] = $request->two_id;
        $data['three_id'] = $request->three_id;
        $data['four_id'] = $request->four_id;
        $data['six_id'] = $request->six_id;
        $data['balls_played_id'] = $request->balls_played_id;

        DB::table('scorebatterseconds')->where('id', $request->id)->update($data);

        $notification = array('message' => 'Score Batter Soconds Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function getTeamList(Request $request)
    {
        $match = Matchh::where('id', $request->id)->first();
        $teams = Team::where('id', $match->team_id)->orWhere('id', $match->team2_id)->get();
        return view('admin.manage.scorebattersecond.team_list', compact('teams'));
    }
    public function getPlayerList(Request $request)
    {
        $players = Player::where('team_id', $request->id)->get();
        return view('admin.manage.scorebattersecond.player_list', compact('players'));
    }
}