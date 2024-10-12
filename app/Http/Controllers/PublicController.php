<?php

namespace App\Http\Controllers;

use App\Models\FootballMatch;
use App\Models\News;
use App\Models\Score;
use App\Models\Matchh;
use App\Models\Series;
use App\Events\MyEvent;
use App\Models\Commentry;
use App\Models\Scorebowlerfirst;
use App\Models\ManagePublicTable;
use App\Models\Scorebattersecond;
use App\Models\Scorebowlersecond;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class PublicController extends Controller
{
    // public function view()
    // {
    //     $data = Score::all();
    //     $match = Matchh::orderby('match_datetime', 'ASC')->where('is_game_over', 0)->get();
    //     $match1 = Matchh::orderby('match_datetime', 'DESC')->where('is_game_over', 1)->get();
    //     $match2 = Matchh::orderby('match_datetime', 'DESC')->where('is_game_over', 2)->get();
    //     broadcast(new MyEvent($data))->toOthers();
    //     broadcast(new MyEvent($match))->toOthers();
    //     broadcast(new MyEvent($match1))->toOthers();
    //     broadcast(new MyEvent($match2))->toOthers();
    //     return view('public.index', compact('data', 'match', 'match1', 'match2'));
    // }

    public function view()
    {
        $data = Score::all();
        $match = Matchh::orderby('match_datetime', 'ASC')->where('is_game_over', 0)->get();
        $match1 = Matchh::orderby('match_datetime', 'DESC')->where('is_game_over', 1)->get();
        $match2 = Matchh::orderby('match_datetime', 'DESC')->where('is_game_over', 2)->get();

        // Broadcast data to channel 'my-channel'
        broadcast(new MyEvent([
            'data' => $data,
            'match' => $match,
            'match1' => $match1,
            'match2' => $match2,
        ]))->toOthers();

        return view('public.index', compact('data', 'match', 'match1', 'match2'));
    }
    public function shedule()
    {
        $data = Score::all();
        $match = Matchh::orderby('match_datetime', 'ASC')->where('is_game_over', 0)->get();
        $match1 = Matchh::orderby('match_datetime', 'DESC')->where('is_game_over', 1)->get();
        $match2 = Matchh::orderby('match_datetime', 'DESC')->where('is_game_over', 2)->get();

        // Broadcast data to channel 'my-channel'
        broadcast(new MyEvent([
            'data' => $data,
            'match' => $match,
            'match1' => $match1,
            'match2' => $match2,
        ]))->toOthers();

        return view('shedule.index', compact('data', 'match', 'match1', 'match2'));
    }
    public function arcive()
    {
        $data = Score::all();
        $match = Matchh::orderby('match_datetime', 'ASC')->where('is_game_over', 0)->get();
        $match1 = Matchh::orderby('match_datetime', 'DESC')->where('is_game_over', 1)->get();
        $match2 = Matchh::orderby('match_datetime', 'DESC')->where('is_game_over', 2)->get();

        // Broadcast data to channel 'my-channel'
        broadcast(new MyEvent([
            'data' => $data,
            'match' => $match,
            'match1' => $match1,
            'match2' => $match2,
        ]))->toOthers();

        return view('arcive.index', compact('data', 'match', 'match1', 'match2'));
    }

    public function cricketMatchScoreStatus($id = null)
    {
        $batterfirsts = Score::where('match_id', $id)->get();
        $commentries = Commentry::where('match_id', $id)->get();
        $bowlerfirsts = Scorebowlerfirst::where('match_id', $id)->get();
        $batterseconds = Scorebattersecond::where('match_id', $id)->get();
        $bowlerseconds = Scorebowlersecond::where('match_id', $id)->get();
        $managePublicTable = ManagePublicTable::where('match_id', $id)->get();

        $view1 = view(
            'public.match_score_status',
            compact(
                'batterfirsts',
                'bowlerfirsts',
                'batterseconds',
                'bowlerseconds',
                'managePublicTable'
            )
        )->render();

        // $view2 = view('public.match_commentry_status', ['data' => $commentries])->render();
        // return $view1 . $view2;
        return $view1;
    }

    // public function cricketMatchCommentryStatus($matchId = null)
    // {
    //     $commentries = Commentry::where('match_id', $matchId)->get();
    //     $managePublicTable = ManagePublicTable::where('match_id', $matchId)->get();
    //     return view('public.match_commentry_status', [
    //         'commentries' => $commentries,
    //         'managePublicTable' => $managePublicTable,
    //     ]);
    // }

    public function cricketMatchCommentryStatus($matchId = null)
    {
        $batterfirsts = Score::where('match_id', $matchId)->get();
        $commentries = Commentry::where('match_id', $matchId)->orderBy('id', 'desc')->get();
        $bowlerfirsts = Scorebowlerfirst::where('match_id', $matchId)->get();
        $batterseconds = Scorebattersecond::where('match_id', $matchId)->get();
        $bowlerseconds = Scorebowlersecond::where('match_id', $matchId)->get();
        $managePublicTable = ManagePublicTable::where('match_id', $matchId)->get();

        return view('public.match_commentry_status', [
            'batterfirsts' => $batterfirsts,
            'commentries' => $commentries,
            'bowlerfirsts' => $bowlerfirsts,
            'batterseconds' => $batterseconds,
            'bowlerseconds' => $bowlerseconds,
            'managePublicTable' => $managePublicTable,
        ]);
    }
    public function cricketMatchStatsStatus($matchId = null)
    {
        $batterfirsts = Score::where('match_id', $matchId)->get();
        $bowlerfirsts = Scorebowlerfirst::where('match_id', $matchId)->get();
        $batterseconds = Scorebattersecond::where('match_id', $matchId)->get();
        $bowlerseconds = Scorebowlersecond::where('match_id', $matchId)->get();
        $managePublicTable = ManagePublicTable::where('match_id', $matchId)->get();

        $batterfirsts = $batterfirsts->sortBy(function ($batterfirst) {
            $one = $batterfirst->scoreupdateone->one ?? 0;
            $two = $batterfirst->scoreupdatetwo->two ?? 0;
            $three = $batterfirst->scoreupdatethree->three ?? 0;
            $four = $batterfirst->scoreupdatefour->four ?? 0;
            $six = $batterfirst->scoreupdatesix->six ?? 0;
            return $one + $two * 2 + $three * 3 + $four * 4 + $six * 6;
        })->reverse()->take(3);

        $bowlerfirsts = $bowlerfirsts->sortBy(function ($bowlerfirst) {
            $wickets = $bowlerfirst->updatebowlerwickets->wickets ?? 0;
            return $wickets;
        })->reverse()->take(2);

        $batterseconds = $batterseconds->sortBy(function ($battersecond) {
            $one = $battersecond->scoreupdateone->one ?? 0;
            $two = $battersecond->scoreupdatetwo->two ?? 0;
            $three = $battersecond->scoreupdatethree->three ?? 0;
            $four = $battersecond->scoreupdatefour->four ?? 0;
            $six = $battersecond->scoreupdatesix->six ?? 0;
            return $one + $two * 2 + $three * 3 + $four * 4 + $six * 6;
        })->reverse()->take(3);

        $bowlerseconds = $bowlerseconds->sortBy(function ($bowlersecond) {
            $wickets = $bowlersecond->updatebowlerwickets->wickets ?? 0;
            return $wickets;
        })->reverse()->take(2);


        return view('public.match_stats_status', [
            'batterfirsts' => $batterfirsts,
            'bowlerfirsts' => $bowlerfirsts,
            'batterseconds' => $batterseconds,
            'bowlerseconds' => $bowlerseconds,
            'managePublicTable' => $managePublicTable,
        ]);
    }

    public function news()
    {
        $news = News::orderByDesc('id')->get();
        return view('news.public-index', compact('news'));
    }

    public function showNews($id)
    {
        $data = News::where('id', $id)->first();
        return view('news.show', compact('data'));
    }

    // public function series()
    // {
    //     $series = Series::orderByDesc('id')->get();
    //     return view('series.series', compact('series'));
    // }

    public function getSeriesList()
    {
        $series = Matchh::with('series')->distinct('series_id')->get(['series_id']);
        return view('series.series', compact('series'));
    }


    public function getMatchList($series_id)
    {
        $matches = Matchh::where('series_id', $series_id)->get();
        return view('series.match_list', compact('matches'));
    }

    public function getSeriesTeamList()
    {
        $series = Matchh::with('series')->distinct('series_id')->get(['series_id']);
        return view('series.series_team_list', compact('series'));
    }

    public function getTeamList($series_id)
    {
        $teams = Matchh::where('series_id', $series_id)->get();
        return view('series.team_list', compact('teams'));
       }

    

}