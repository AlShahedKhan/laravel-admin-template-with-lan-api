<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Point;
use App\Models\Player;
use App\Models\Ranking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;


class RankingController extends Controller
{
    public function index()
    {
        $data['rankings'] = Ranking::all();
        $data['points'] = Point::all();
        $data['players'] = Player::all();
        $data['teams'] = Team::all();
        return view('rankings.index', compact('data'));
    }

    public function T20BatterRanking(Request $request)
    {
        $selectedYear = $request->input('year');
        $selectedMonth = $request->input('month');

        $query = Ranking::query();

        if ($selectedYear && $selectedMonth) {
            $query->whereYear('created_at', $selectedYear)
                ->whereMonth('created_at', $selectedMonth);
        }

        $data['rankings'] = $query->get();
        $data['points'] = Point::all();
        $data['teams'] = Team::all();
        $data['uniqueYears'] = Ranking::distinct()->pluck('year');
        $data['uniqueMonths'] = Ranking::distinct()->pluck('month');

        // Render the view and return as a response
        return view('rankings.t-20-batter-ranking-status', compact('data', 'selectedYear', 'selectedMonth'));
    }


    public function getMonths(Request $request)
    {
        $selectedYear = $request->input('year');

        // Query to fetch the distinct months based on the selected year
        $months = Ranking::whereYear('created_at', $selectedYear)->distinct()->pluck('month');

        // Generate the HTML for the options
        $options = '';
        foreach ($months as $month) {
            $options .= '<option value="' . $month . '">' . date('F', mktime(0, 0, 0, $month, 1)) . '</option>';
        }

        return $options;
    }




    public function WT20BatterRanking()
    {
        $data['rankings'] = Ranking::all();
        $data['points'] = Point::all();
        $data['teams'] = Team::all();
        return view('rankings.w-t-20-batter-ranking-status', compact('data'));
    }
    public function T20BowlerRanking()
    {
        $data['rankings'] = Ranking::all();
        $data['points'] = Point::all();
        $data['teams'] = Team::all();
        return view('rankings.t-20-bowler-ranking-status', compact('data'));
    }
    public function WT20BowlerRanking()
    {
        $data['rankings'] = Ranking::all();
        $data['points'] = Point::all();
        $data['teams'] = Team::all();
        return view('rankings.w-t-20-bowler-ranking-status', compact('data'));
    }
    public function OdiBatterRanking()
    {
        $data['rankings'] = Ranking::all();
        $data['points'] = Point::all();
        $data['teams'] = Team::all();
        return view('rankings.odi-batter-ranking-status', compact('data'));
    }
    public function WOdiBatterRanking()
    {
        $data['rankings'] = Ranking::all();
        $data['points'] = Point::all();
        $data['teams'] = Team::all();
        return view('rankings.w-odi-batter-ranking-status', compact('data'));
    }
    public function OdiBowlerRanking()
    {
        $data['rankings'] = Ranking::all();
        $data['points'] = Point::all();
        $data['teams'] = Team::all();
        return view('rankings.odi-bowler-ranking-status', compact('data'));
    }
    public function WOdiBowlerRanking()
    {
        $data['rankings'] = Ranking::all();
        $data['points'] = Point::all();
        $data['teams'] = Team::all();
        return view('rankings.w-odi-bowler-ranking-status', compact('data'));
    }
    public function TestBatterRanking()
    {
        $data['rankings'] = Ranking::all();
        $data['points'] = Point::all();
        $data['teams'] = Team::all();
        return view('rankings.test-batter-ranking-status', compact('data'));
    }
    public function WTestBatterRanking()
    {
        $data['rankings'] = Ranking::all();
        $data['points'] = Point::all();
        $data['teams'] = Team::all();
        return view('rankings.w-test-batter-ranking-status', compact('data'));
    }
    public function TestBowlerRanking()
    {
        $data['rankings'] = Ranking::all();
        $data['points'] = Point::all();
        $data['teams'] = Team::all();
        return view('rankings.test-bowler-ranking-status', compact('data'));
    }
    public function WTestBowlerRanking()
    {
        $data['rankings'] = Ranking::all();
        $data['points'] = Point::all();
        $data['teams'] = Team::all();
        return view('rankings.w-test-bowler-ranking-status', compact('data'));
    }


    public function store(Request $request)
    {
        Ranking::insert([
            'team_id' => $request->team_id,
            'player_id' => $request->player_id,
            'man_women_id' => $request->man_women_id,
            'point_id' => $request->point_id,
            'w_t20_batter_points_id' => $request->w_t20_batter_points_id,
            't20_bowler_points_id' => $request->t20_bowler_points_id,
            'w_t20_bowler_points_id' => $request->w_t20_bowler_points_id,
            'odi_batter_points_id' => $request->odi_batter_points_id,
            'w_odi_batter_points_id' => $request->w_odi_batter_points_id,
            'odi_bowler_points_id' => $request->odi_bowler_points_id,
            'w_odi_bowler_points_id' => $request->w_odi_bowler_points_id,
            'test_batter_points_id' => $request->test_batter_points_id,
            'w_test_batter_points_id' => $request->w_test_batter_points_id,
            'test_bowler_points_id' => $request->test_bowler_points_id,
            'w_test_bowler_points_id' => $request->w_test_bowler_points_id,
            'year' => $request->year,
            'month' => $request->month
        ]);
        $notification = array('message' => 'ranking Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }



    public function destroy($id)
    {
        $rankings = Ranking::find($id);
        $rankings->delete();
        $notification = array('message' => 'Score Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    public function edit($id)
    {
        $data = Ranking::find($id);
        $players = Player::where('team_id', $data->team_id)->get();
        $teams = Team::all();
        $points = Point::all(); // fetch all points from the database

        return view('rankings.edit', compact('data', 'players', 'teams', 'points'));
    }




    public function update(Request $request)
    {
        $data = array();
        $data['point_id'] = $request->point_id;
        $data['man_women_id'] = $request->man_women_id;
        $data['w_t20_batter_points_id'] = $request->w_t20_batter_points_id;
        $data['t20_bowler_points_id'] = $request->t20_bowler_points_id;
        $data['w_t20_bowler_points_id'] = $request->w_t20_bowler_points_id;
        $data['odi_batter_points_id'] = $request->odi_batter_points_id;
        $data['w_odi_batter_points_id'] = $request->w_odi_batter_points_id;
        $data['odi_bowler_points_id'] = $request->odi_bowler_points_id;
        $data['w_odi_bowler_points_id'] = $request->w_odi_bowler_points_id;
        $data['test_batter_points_id'] = $request->test_batter_points_id;
        $data['w_test_batter_points_id'] = $request->w_test_batter_points_id;
        $data['test_bowler_points_id'] = $request->test_bowler_points_id;
        $data['w_test_bowler_points_id'] = $request->w_test_bowler_points_id;
        $data['year'] = $request->year;
        $data['month'] = $request->month;

        DB::table('rankings')->where('id', $request->id)->update($data);

        $notification = array('message' => 'ranking Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function getPlayerList($id)
    {
        $players = Player::where('team_id', $id)->get();
        return response()->json($players);
    }

    public function getManWomenList($id)
    {
        $man_women = Player::where('team_id', $id)->distinct()->pluck('man_women');
        return response()->json($man_women);
    }
}
