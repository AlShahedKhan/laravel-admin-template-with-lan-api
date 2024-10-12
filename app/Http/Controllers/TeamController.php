<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $data['title'] = 'Users';
        $data = Team::all();
        return view('admin.manage.teams.index', compact('data'));
    }
    public function T20Ranking()
    {
        $data['title'] = 'Users';
        $data = Team::all();
        return view('admin.manage.teams.t-20-ranking-status', compact('data'));
    }
    public function OdiRanking()
    {
        $data['title'] = 'Users';
        $data = Team::all();
        return view('admin\manage\teams\odi-ranking-status', compact('data'));
    }
    public function TestRanking()
    {
        $data['title'] = 'Users';
        $data = Team::all();
        return view('admin.manage.teams.test-ranking-status', compact('data'));
    }
    public function wT20Ranking()
    {
        $data['title'] = 'Users';
        $data = Team::all();
        return view('admin.manage.teams.w-t-20-ranking-status', compact('data'));
    }
    public function wOdiRanking()
    {
        $data['title'] = 'Users';
        $data = Team::all();
        return view('admin\manage\teams\w-odi-ranking-status', compact('data'));
    }
    public function wTestRanking()
    {
        $data['title'] = 'Users';
        $data = Team::all();
        return view('admin.manage.teams.w-test-ranking-status', compact('data'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'team_name' => 'required|unique:teams|max:55',
            't_20_ranking' => 'required|unique:teams|max:4',
            'odi_ranking' => 'required|unique:teams|max:4',
            'test_ranking' => 'required|unique:teams|max:4',
            'w_t_20_ranking' => 'required|unique:teams|max:4',
            'w_odi_ranking' => 'required|unique:teams|max:4',
            'w_test_ranking' => 'required|unique:teams|max:4',
        ]);

        Team::insert([
            'team_name' => $request->team_name,
            'team_slug' => Str::slug($request->team_name, '-'),
            't_20_ranking' => $request->t_20_ranking,
            'odi_ranking' => $request->odi_ranking,
            'test_ranking' => $request->test_ranking,
        ]);

        $notification = array('message' => 'Team Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $data = Team::findorfail($id);
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $team = Team::where('id', $request->id)->first();
        $team->update([
            'team_name' => $request->team_name,
            'category_slug' => Str::slug($request->team_name, '-'),
            't_20_ranking' => $request->t_20_ranking,
            'odi_ranking' => $request->odi_ranking,
            'test_ranking' => $request->test_ranking,
            'w_t_20_ranking' => $request->t_20_ranking,
            'w_odi_ranking' => $request->odi_ranking,
            'w_test_ranking' => $request->test_ranking,
        ]);

        $notification = array('message' => 'Team Update!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $team = Team::find($id);
        $team->delete();
        $notification = array('message' => 'Team Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
