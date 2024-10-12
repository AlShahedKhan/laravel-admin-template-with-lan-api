<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\Team;
use App\Models\Matchh;
use Illuminate\Http\Request;

class MatchhController extends Controller
{
    public function index()
    {
        $team  = Team::all();
        $series  = Series::all();
        $data = Matchh::orderBy('match_datetime', 'DESC')->get();
        return view('admin.manage.matchh.index', compact('series','data','team'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'match_datetime' => 'required',
        ]);

        Matchh::insert([
            'series_id' => $request->series_id,
            'team_id' => $request->team_id,
            'team2_id' => $request->team2_id,
            'match_datetime' => $request->match_datetime,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $notification = array('message'=>'Match Inserted!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $data = Matchh::findOrFail($id);
        $series = Series::all();
    
        return response()->json([
            'data' => $data,
            'series' => $series,
        ]);
    }
    

    public function update(Request $request)
    {
        $match=Matchh::where('id',$request->id)->first();
        $match->series_id = $request->series_id;
        $match->team_id = $request->team_id;
        $match->team2_id = $request->team2_id;
        $match->match_datetime = $request->match_datetime;
        $match->is_game_over = $request->status;
        $match->updated_at = now();
        $match->save();
        $notification = array('message'=>'Match Update!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $match=Matchh::find($id);
        $match->delete();
        $notification = array('message'=>'Match Deleted!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
}
