@extends('layouts.admin')

@section('admin_content')
    <div class="container">
        <h1>{{ ___('football.edit_league') }}</h1>
        <hr>
        <form method="POST" action="{{ route('leagues.update', $leagues->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="league_name">{{ ___('football.league_name') }}</label>
                <input type="text" class="form-control" id="league_name" name="league_name" value="{{ $leagues->league_name }}">
            </div>            
            
            <div class="form-group">
                <label for="venue">{{ ___('football.venue') }}</label>
                <input type="text" class="form-control" id="venue" name="venue" value="{{ $leagues->venue }}">
            </div>
            <div class="form-group">
                <label for="league_start_time">{{ ___('football.league_start_time') }}</label>
                <input type="datetime-local" class="form-control" id="league_start_time" name="league_start_time" value="{{ $startTime->format('Y-m-d\TH:i') }}">

            </div>
            <div class="form-group">
                <label for="league_end_time">{{ ___('football.league_end_time') }}</label>
                <input type="datetime-local" class="form-control" id="league_end_time" name="league_end_time" value="{{ $endTime->format('Y-m-d\TH:i') }}">
            </div>
            <button type="submit" class="btn btn-primary">{{ ___('football.update') }}</button>
        </form>
    </div>
@endsection
