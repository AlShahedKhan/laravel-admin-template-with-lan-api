<?php

namespace App\Http\Controllers;

use App\Models\FootballMatch;
use App\Models\FootballTeam;
use App\Models\League;
use Illuminate\Http\Request;

class FootballMatchController extends Controller
{
    public function index()
    {
        $team  = FootballTeam::all();
        $leagues  = League::all();
        $data  = FootballMatch::orderby('match_datetime', 'ASC')->get();
        return view('admin.manage.footballmatchs.index', compact('leagues','data','team'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'match_datetime' => 'required',
        ]);

        FootballMatch::insert([
            'team_id' => $request->team_id,
            'team2_id' => $request->team2_id,
            'leagues_id' => $request->leagues_id,
            'match_datetime' => $request->match_datetime,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $notification = array('message'=>'Match Inserted!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $data=FootballMatch::findorfail($id);
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $match=FootballMatch::where('id',$request->id)->first();
        $match->team_id = $request->team_id;
        $match->team2_id = $request->team2_id;
        $match->leagues_id = $request->leagues_id;
        $match->match_datetime = $request->match_datetime;
        $match->is_game_over = $request->status;
        $match->updated_at = now();
        $match->save();
        $notification = array('message'=>'Match Update!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $match=FootballMatch::find($id);
        $match->delete();
        $notification = array('message'=>'Match Deleted!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
}
