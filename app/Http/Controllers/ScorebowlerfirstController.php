<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Matchh;
use App\Models\Player;
use App\Models\Series;
use App\Models\Scoreupdate;
use App\Models\Updatebowler;
use Illuminate\Http\Request;
use App\Models\Scorebowlerfirst;
use Illuminate\Support\Facades\DB;

class ScorebowlerfirstController extends Controller
{
    public function index()
    {
        $data['scorebowlerfirst'] = Scorebowlerfirst::all();
        $data['series'] = Series::all();
        $data['match'] = Matchh::all();
        $data['scoreupdate'] = Scoreupdate::all();
        $data['updatebowler'] = Updatebowler::all();
        return view('admin.manage.scorebowlerfirst.index', compact('data'));
    }

    public function store(Request $request)
    {
        Scorebowlerfirst::insert([
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
        $notification = array('message' => 'Scorebowlerfirst Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $score = Scorebowlerfirst::find($id);
        $score->delete();
        $notification = array('message' => 'Scorebowlerfirst Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $data = Scorebowlerfirst::find($id);
        $match = Matchh::all();
        $series = Series::all();
        $team = Team::where('id', $data->team_id)->first();
        $player = Player::where('id', $data->team_id)->first();
        $scoreupdate = DB::table('scoreupdates')->get();
        $updatebowler = DB::table('updatebowlers')->get();

        return view('admin.manage.scorebowlerfirst.edit', compact(
            'data',
            'series',
            'match',
            'team',
            'scoreupdate',
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

        DB::table('scorebowlerfirsts')->where('id', $request->id)->update($data);

        $notification = array('message' => 'Scorebowlerfirst Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function getTeamList(Request $request)
    {
        $match = Matchh::where('id', $request->id)->first();
        $teams = Team::where('id', $match->team_id)->orWhere('id', $match->team2_id)->get();
        return view('admin.manage.scorebowlerfirst.team_list', compact('teams'));
    }
    public function getPlayerList(Request $request)
    {
        $players = Player::where('team_id', $request->id)->get();
        return view('admin.manage.scorebowlerfirst.player_list', compact('players'));
    }
}