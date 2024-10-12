<?php

namespace App\Http\Controllers;

use App\Models\Team;
use DateTime;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Series::orderBy('series_start_time', 'DESC')->paginate(10);
        return view('series.index', compact('series'));
    }


    public function create()
    {
        $team = Team::all();
        return view('series.create',compact('team'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'series_name' => 'required',
            'venue' => 'required',
            'series_start_time' => 'required|date',
            'series_end_time' => 'required|date|after:series_start_time',
        ]);

        Series::create($request->all());

        return redirect()->route('series.index')
            ->with('success', 'Series created successfully.');
    }

    public function edit($id)
    {
        $series = Series::find($id);
        $team = Team::all();

        $startTime = new DateTime($series->series_start_time);
        $endTime = new DateTime($series->series_end_time);
        
        return view('series.edit', compact('team','series','startTime','endTime'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'series_name' => 'required',
            'venue' => 'required',
            'series_start_time' => 'required|date',
            'series_end_time' => 'required|date|after:series_start_time',
        ]);


        $series = Series::find($id);
        $series->update($request->all());

        
        return redirect()->route('series.index')
            ->with('success', 'Series updated successfully.');
    }

    public function delete($id)
    {
        $series = Series::find($id);
        $series->delete();

        return redirect()->route('series.index')
            ->with('success', 'Series deleted successfully.');
    }
}