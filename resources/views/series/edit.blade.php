@extends('layouts.admin')

@section('admin_content')
    <div class="container">
        <h1>Edit Series</h1>
        <hr>
        <form method="POST" action="{{ route('series.update', $series->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="series_name">Series Name</label>
                <input type="text" class="form-control" id="series_name" name="series_name" value="{{ $series->series_name }}">
            </div>
            <div class="form-group">
                <label for="team_name">{{ ___('cricket.team_name') }}</label>
                <select class="form-control" name="team_id" required="">
                    @foreach ($team as $row)
                        <option value="{{ $row->id }}" @if ($row->id == $series->team_id) selected="" @endif>{{ $row->team_name }}</option>
                    @endforeach
                </select>
                <input type="hidden" name="id" value="{{ $series->id }}">
            </div>
            
            <div class="form-group">
                <label for="venue">Venue</label>
                <input type="text" class="form-control" id="venue" name="venue" value="{{ $series->venue }}">
            </div>
            <div class="form-group">
                <label for="series_start_time">Series Start Time</label>
                <input type="datetime-local" class="form-control" id="series_start_time" name="series_start_time" value="{{ $startTime->format('Y-m-d\TH:i') }}">

            </div>
            <div class="form-group">
                <label for="series_end_time">Series End Time</label>
                <input type="datetime-local" class="form-control" id="series_end_time" name="series_end_time" value="{{ $endTime->format('Y-m-d\TH:i') }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
