<?php

namespace App\Http\Controllers;

use App\Models\GoalScore;
use App\Models\FootballTeam;
use Illuminate\Http\Request;
use App\Models\FootballMatch;
use App\Models\FootballScore;
use App\Models\FootballPlayer;
use Illuminate\Support\Facades\DB;

class FootballScoreController extends Controller
{
    public function index()
    {
        $data['commentry'] = FootballScore::all();
        $data['match'] = FootballMatch::all();
        $data['team'] = FootballTeam::all();
        $data['player'] = FootballPlayer::all();
        $data['player2'] = FootballPlayer::all();
        $data['goolscore'] = GoalScore::all();
        return view('admin.manage.footballscores.index',compact('data'));
    }

    public function store(Request $request)
    {
        FootballScore::insert([
            'match_id' => $request->match_id,
            'team_id' => $request->team_id,
            'team2_id' => $request->team2_id,
            'goal_id' => $request->goal_id,
            'goal2_id' => $request->goal2_id,
            'shots_id' => $request->shots_id,
            'shots2_id' => $request->shots2_id,
            'shots_on_target_id' => $request->shots_on_target_id,
            'shots_on_target2_id' => $request->shots_on_target2_id,
            'prossession_id' => $request->prossession_id,
            'prossession2_id' => $request->prossession2_id,
            'passes_id' => $request->passes_id,
            'passes2_id' => $request->passes2_id,
            'passes_accuracy_id' => $request->passes_accuracy_id,
            'passes_accuracy2_id' => $request->passes_accuracy2_id,
            'fouls_id' => $request->fouls_id,
            'fouls2_id' => $request->fouls2_id,
            'yellow_cards_id' => $request->yellow_cards_id,
            'yellow_cards2_id' => $request->yellow_cards2_id,
            'red_cards_id' => $request->red_cards_id,
            'red_cards2_id' => $request->red_cards2_id,
            'off_sides_id' => $request->off_sides_id,
            'off_sides2_id' => $request->off_sides2_id,
            'corners_id' => $request->corners_id,
            'corners2_id' => $request->corners2_id,
        ]);
        $notification = array('message' => 'Football Score Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $commentry = FootballScore::find($id);
        $commentry->delete();
        $notification = array('message' => 'Football Score Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $data = FootballScore::find($id);
        $match = FootballMatch::all();
        $goalScores = DB::table('goal_scores')->get();

        return view('admin.manage.footballscores.edit', compact('data', 'match','goalScores'));
    }

    public function update(Request $request)
    {
        $data = array();
        $data['match_id']=$request->match_id;
        $data['team_id']=$request->team_id;
        $data['team2_id']=$request->team2_id;
        $data['goal_id']=$request->goal_id;
        $data['goal2_id']=$request->goal2_id;
        $data['shots_id']=$request->shots_id;
        $data['shots2_id']=$request->shots2_id;
        $data['shots_on_target_id']=$request->shots_on_target_id;
        $data['shots_on_target2_id']=$request->shots_on_target2_id;
        $data['prossession_id']=$request->prossession_id;
        $data['prossession2_id']=$request->prossession2_id;
        $data['passes_id']=$request->passes_id;
        $data['passes2_id']=$request->passes2_id;
        $data['passes_accuracy_id']=$request->passes_accuracy_id;
        $data['passes_accuracy2_id']=$request->passes_accuracy2_id;
        $data['fouls_id']=$request->fouls_id;
        $data['fouls2_id']=$request->fouls2_id;
        $data['yellow_cards_id']=$request->yellow_cards_id;
        $data['yellow_cards2_id']=$request->yellow_cards2_id;
        $data['red_cards_id']=$request->red_cards_id;
        $data['red_cards2_id']=$request->red_cards2_id;
        $data['off_sides_id']=$request->off_sides_id;
        $data['off_sides2_id']=$request->off_sides2_id;
        $data['corners_id']=$request->corners_id;
        $data['corners2_id']=$request->corners2_id;
        try {
            DB::table('football_scores')->where('id', $request->id)->update($data);
        } catch (\Throwable $th) {
            throw $th;
        }

        $notification = array('message' => 'Football Score Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function getTeamList(Request $request)
    {
        $match = FootballMatch::where('id',$request->id)->first();
        $teams = FootballTeam::where('id',$match->team_id)->orWhere('id',$match->team2_id)->get();
        return view('admin.manage.footballscores.team_list', compact('teams'));
    }
    public function getPlayerList(Request $request)
    {
        $players = FootballPlayer::where('team_id',$request->id)->get();
        return view('admin.manage.footballscores.player_list', compact('players'));
    }
}
