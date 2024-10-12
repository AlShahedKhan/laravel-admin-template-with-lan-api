@extends('layouts.publichome')
@section('admin_content')
    @foreach ($matches as $match)
        <div class="card">
            <div class="card-title"></div>
            <div class="card-body">
                @php
                    $team = $match->team->team_name;
                    $team2 = $match->team2->team_name;
                    $date = $match->match_datetime;
                @endphp
                <h6>{{ ___('cricket.' . $team) }}-{{ ___('cricket.' . $team2) }} <br> {{ ___('cricket.' . $date) }} </h6>
            </div>
        </div>
    @endforeach
@endsection
