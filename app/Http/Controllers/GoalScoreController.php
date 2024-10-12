<?php

namespace App\Http\Controllers;

use App\Models\GoalScore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GoalScoreController extends Controller
{
    public function index()
    {
        $data = GoalScore::all();
        $scoreupdate = GoalScore::all();
        return view('admin.manage.goalscores.index', compact('data', 'scoreupdate'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'goal' => 'required|max:2',
            'shots' => 'required|max:4',
            'shots_on_target' => 'required|max:4',
            'prossession' => 'required|max:4',
            'passes' => 'required|max:4',
            'passes_accuracy' => 'required|max:4',
            'fouls' => 'required|max:4',
            'yellow_cards' => 'required|max:4',
            'red_cards' => 'required|max:4',
            'off_sides' => 'required|max:4',
            'corners' => 'required|max:4'
        ]);

        GoalScore::insert([
            'goal' => $request->goal,
            'shots' => $request->shots,
            'shots_on_target' => $request->shots_on_target,
            'prossession' => $request->prossession,
            'passes' => $request->passes,
            'passes_accuracy' => $request->passes_accuracy,
            'fouls' => $request->passes_accuracy,
            'yellow_cards' => $request->yellow_cards,
            'red_cards' => $request->red_cards,
            'off_sides' => $request->off_sides,
            'corners' => $request->corners,
        ]);
        $notification = array('message' => 'Goal Stored!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $data = GoalScore::find($id);
        return view('admin.manage.goalscores.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $data = array();
        $data['goal'] = $request->goal;
        $data['shots'] = $request->shots;
        $data['shots_on_target'] = $request->shots_on_target;
        $data['prossession'] = $request->prossession;
        $data['passes'] = $request->passes;
        $data['passes_accuracy'] = $request->passes_accuracy;
        $data['fouls'] = $request->passes_accuracy;
        $data['yellow_cards'] = $request->yellow_cards;
        $data['red_cards'] = $request->red_cards;
        $data['off_sides'] = $request->off_sides;
        $data['corners'] = $request->corners;
        DB::table('goal_scores')->where('id', $request->id)->update($data);

        $notification = array('message' => 'Goal Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $scoreupdate = GoalScore::find($id);
        $scoreupdate->delete();
        $notification = array('message' => 'Goal Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
