<?php

namespace App\Http\Controllers;

use App\Events\MyEvent;
use Illuminate\Http\Request;
use App\Models\FootballMatch;
use App\Models\FootballScore;

class FootballHomeController extends Controller
{
    public function view()
    {
        // $data = Score::all();
        $match = FootballMatch::with('score')->orderby('match_datetime', 'ASC')->where('is_game_over', 0)->get();
        $match1 = FootballMatch::with('score')->orderby('match_datetime', 'DESC')->where('is_game_over', 1)->take(5)->get();
        $match2 = FootballMatch::with('score')->orderby('match_datetime', 'DESC')->where('is_game_over', 2)->get();
        $EN = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
        $BN = ["০", "১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯"];
        return view('footballhome.index', compact( 'match', 'match1', 'match2','EN','BN'));
    }

    public function FootballShedule()
    {
        $match = FootballMatch::orderby('match_datetime', 'ASC')->where('is_game_over', 0)->get();
        $match1 = FootballMatch::orderby('match_datetime', 'DESC')->where('is_game_over', 1)->get();
        $match2 = FootballMatch::orderby('match_datetime', 'DESC')->where('is_game_over', 2)->get();

        // Broadcast data to channel 'my-channel'
        broadcast(new MyEvent([
            'match' => $match,
            'match1' => $match1,
            'match2' => $match2,
        ]))->toOthers();

        return view('shedule.football_index', compact('match', 'match1', 'match2'));
    }
    public function FootballArcive()
    {
        $match = FootballMatch::orderby('match_datetime', 'ASC')->where('is_game_over', 0)->get();
        $match1 = FootballMatch::orderby('match_datetime', 'DESC')->where('is_game_over', 1)->get();
        $match2 = FootballMatch::orderby('match_datetime', 'DESC')->where('is_game_over', 2)->get();

        // Broadcast data to channel 'my-channel'
        broadcast(new MyEvent([
            'match' => $match,
            'match1' => $match1,
            'match2' => $match2,
        ]))->toOthers();

        return view('arcive.football_arcive_index', compact('match', 'match1', 'match2'));
    }

    public function footballMatchScoreStatus($id)
    {
        $data = FootballMatch::with('score')->where('id', $id)->first();
        return view('footballhome.match_score_status', compact('data'));
    }

    public function getLeaguesList()
    {
        $leagues = FootballMatch::with('leagues')->distinct('leagues_id')->get(['leagues_id']);
        return view('leagues.leagues', compact('leagues'));
    }


    public function getLeagueMatchList($leagues_id)
    {
        $matches = FootballMatch::where('leagues_id', $leagues_id)->get();
        return view('leagues.match_list', compact('matches'));
    }

    public function getleaguesTeamList()
    {
        $leagues = FootballMatch::with('leagues')->distinct('leagues_id')->get(['leagues_id']);
        return view('leagues.leagues_team_list', compact('leagues'));
    }

    public function getLeagueTeamList($leagues_id)
    {
        $teams = FootballMatch::where('leagues_id', $leagues_id)->get();
        return view('leagues.team_list', compact('teams'));
    }
}
