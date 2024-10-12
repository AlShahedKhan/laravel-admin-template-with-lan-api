<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;

class PointController extends Controller
{
    public function index()
    {
        $points = Point::orderBy('id', 'asc')->paginate(10);

        return view('points.index', compact('points'));
    }

    public function create()
    {
        return view('points.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'points' => 'required',
            't20_bowler_points' => 'required',
            'odi_batter_points' => 'required',
            'odi_bowler_points' => 'required',
            'test_batter_points' => 'required',
            'test_bowler_points' => 'required',
        ]);

        Point::create([
            'points' => $request->input('points'),
            't20_bowler_points' => $request->input('t20_bowler_points'),
            'odi_batter_points' => $request->input('odi_batter_points'),
            'odi_bowler_points' => $request->input('odi_bowler_points'),
            'test_batter_points' => $request->input('test_batter_points'),
            'test_bowler_points' => $request->input('test_bowler_points'),
        ]);

        return redirect()->route('points.index')->with('success', 'Points added successfully.');
    }

    public function edit($id)
    {
        $point = Point::findOrFail($id);

        return view('points.edit', compact('point'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'points' => 'required',
            't20_bowler_points' => 'required',
            'odi_batter_points' => 'required',
            'odi_bowler_points' => 'required',
            'test_batter_points' => 'required',
            'test_bowler_points' => 'required',
        ]);

        $point = Point::findOrFail($id);
        $point->points = $request->input('points');
        $point->t20_bowler_points = $request->input('t20_bowler_points');
        $point->odi_batter_points = $request->input('odi_batter_points');
        $point->odi_bowler_points = $request->input('odi_bowler_points');
        $point->test_batter_points = $request->input('test_batter_points');
        $point->test_bowler_points = $request->input('test_bowler_points');
        $point->save();

        return redirect()->route('points.index')->with('success', 'Points updated successfully.');
    }

    public function delete($id)
    {
        $point = Point::findOrFail($id);
        $point->delete();

        return redirect()->route('points.index')->with('success', 'Points deleted successfully.');
    }
}
