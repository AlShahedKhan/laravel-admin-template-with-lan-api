<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Models\FootballRanking;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\FootballPlayer;
use App\Models\FootballTeam;

class FootballRankingController extends Controller
{
    public function index()
    {
        $data['football_rankings'] = FootballRanking::all();
        $data['points'] = Point::all();
        $data['teams'] = FootballTeam::all();
        $data['players'] = FootballPlayer::all();
        return view('footballrankings.index', compact('data'));
    }
    public function FootballManRanking()
    {
        $data['rankings'] = FootballRanking::all();
        $data['points'] = Point::all();
        $data['teams'] = FootballTeam::all();
        return view('footballrankings.man-ranking-status', compact('data'));
    }
    public function FootballWomanRanking()
    {
        $data['rankings'] = FootballRanking::all();
        $data['points'] = Point::all();
        $data['teams'] = FootballTeam::all();
        return view('footballrankings.women-ranking-status', compact('data'));
    }

    public function store(Request $request)
    {
        FootballRanking::insert([
            'team_id' => $request->team_id,
            'player_id' => $request->player_id,
            'man_women_id' => $request->man_women_id,
            'man_points_id' => $request->man_points_id,
            'woman_points_id' => $request->woman_points_id,
            'year' => $request->year,
            'month' => $request->month,
        ]);
        $notification = array('message' => 'ranking Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $footballrankings = FootballRanking::find($id);
        $footballrankings->delete();
        $notification = array('message' => 'Football Ranking Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    public function edit($id)
    {
        $data = FootballRanking::find($id);
        $players = FootballPlayer::where('team_id', $data->team_id)->get();
        $teams = FootballTeam::all();
        $points = Point::all(); // fetch all points from the database

        return view('footballrankings.edit', compact('data', 'players', 'teams', 'points'));
    }



    public function update(Request $request)
    {
        $data = array();
        $data['man_women_id'] = $request->man_women_id;
        $data['man_points_id'] = $request->man_points_id;
        $data['woman_points_id'] = $request->woman_points_id;
        $data['year'] = $request->year;
        $data['month'] = $request->month;

        DB::table('football_rankings')->where('id', $request->id)->update($data);

        $notification = array('message' => 'Football ranking Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function getPlayerList(Request $request)
    {
        $players = FootballPlayer::where('team_id', $request->id)->get();
        return view('footballrankings.player_list', compact('players'));
    }
}
