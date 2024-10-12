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
use App\Models\Scorebowlersecond;
use Illuminate\Support\Facades\DB;

class ScorebowlersecondController extends Controller
{
    public function index()
    {
        $data['scorebowlersecond'] = Scorebowlersecond::all();
        $data['series'] = Series::all();
        $data['match'] = Matchh::all();
        $data['scoreupdate'] = Scoreupdate::all();
        $data['updatebowler'] = Updatebowler::all();
        return view('admin.manage.scorebowlersecond.index', compact('data'));
    }

    public function store(Request $request)
    {
        Scorebowlersecond::insert([
            'series_id' => $request->series_id,
            'match_id' => $request->match_id,
            'team_id' => $request->team_id,
            'player_id' => $request->player_id,
            'overs_id' => $request->overs_id,
            'strick_id' => $request->strick_id,
            'maidens_id' => $request->maidens_id,
            'runs_id' => $request->runs_id,
            'wickets_id' => $request->wickets_id,
            'no_balls_id' => $request->no_balls_id,
            'wides_id' => $request->wides_id,
            'panalty_runs_id' => $request->panalty_runs_id,
        ]);
        $notification = array('message' => 'Scorebowlersecond Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $score = Scorebowlersecond::find($id);
        $score->delete();
        $notification = array('message' => 'Scorebowlersecond Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $data = Scorebowlersecond::find($id);
        $match = Matchh::all();
        $series = Series::all();
        $team = Team::where('id', $data->team_id)->first();
        $player = Player::where('id', $data->team_id)->first();
        $scoreupdate = DB::table('scoreupdates')->get();
        $updatebowler = DB::table('updatebowlers')->get();

        return view('admin.manage.scorebowlersecond.edit', compact(
            'series',
            'data',
            'scoreupdate',
            'match',
            'team',
            'player',
            'updatebowler'
        )
        );
    }

    public function update(Request $request)
    {
        $data = array();
        $data['overs_id'] = $request->overs_id;
        $data['strick_id'] = $request->strick_id;
        $data['maidens_id'] = $request->maidens_id;
        $data['runs_id'] = $request->runs_id;
        $data['wickets_id'] = $request->wickets_id;
        $data['no_balls_id'] = $request->no_balls_id;
        $data['wides_id'] = $request->wides_id;
        $data['panalty_runs_id'] = $request->panalty_runs_id;

        DB::table('scorebowlerseconds')->where('id', $request->id)->update($data);

        $notification = array('message' => 'Score bowler second updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function getTeamList(Request $request)
    {
        $match = Matchh::where('id', $request->id)->first();
        $teams = Team::where('id', $match->team_id)->orWhere('id', $match->team2_id)->get();
        return view('admin.manage.scorebowlersecond.team_list', compact('teams'));
    }
    public function getPlayerList(Request $request)
    {
        $players = Player::where('team_id', $request->id)->get();
        return view('admin.manage.scorebowlersecond.player_list', compact('players'));
    }
}