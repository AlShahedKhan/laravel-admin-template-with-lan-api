<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Curve;
use App\Models\Matchh;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurveController extends Controller
{
    public function index()
    {
        // $data['score_short'] = Curve::select(
        //     'id',
        //     'team_id',
        //     'match_id',
        // )
        //     ->groupBy('team_id')
        //     ->get();
        $data['curve'] = Curve::all();
        $data['match'] = Matchh::all();
        return view('admin.manage.curve.index', compact('data'));
    }

    public function store(Request $request)
    {
        Curve::insert([
            'match_id' => $request->match_id,
            'team_id' => $request->team_id,
            'runs' => $request->runs,
        ]);
        $notification = array('message' => 'New record Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $curve = Curve::find($id);
        $curve->delete();
        $notification = array('message' => 'Record Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $data = Curve::find($id);
        $match = Matchh::all();
        $team = Team::where('id',$data->team_id)->first();
        $player = Player::where('id',$data->team_id)->first();

        return view('admin.manage.curve.edit', compact('data', 'match', 'team','player'));
    }

    public function update(Request $request)
    {
        $data = array();
        $data['runs'] = $request->runs;
        
        DB::table('curves')->where('id', $request->id)->update($data);

        $notification = array('message' => 'Record Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function getTeamList(Request $request)
    {
        $match = Matchh::where('id',$request->id)->first();
        $teams = Team::where('id',$match->team_id)->orWhere('id',$match->team2_id)->get();
        return view('admin.manage.curve.team_list', compact('teams'));
    }
    public function getPlayerList(Request $request)
    {
        $players = Player::where('team_id',$request->id)->get();
        return view('admin.manage.curve.player_list', compact('players'));
    }
}
