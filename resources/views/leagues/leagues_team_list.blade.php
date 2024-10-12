@extends('layouts.publichome')

@section('admin_content')
    @foreach ($leagues as $s)
        <div class="card">
            <div class="card-title"></div>
            <div class="card-body">
                @php
                    $leagues = $s->leagues->league_name;
                    $locaion = $s->leagues->venue;
                    $start = $s->leagues->league_start_time;
                    $end = $s->leagues->league_end_time;
                @endphp
                <a href="{{ route('getLeagueTeamList', ['leagues_id' => $s->leagues_id]) }}">
                    <strong>{{ ___('football.league_name') }}:</strong> {{ ___('football.' .$leagues) }} <br>
                    <strong>{{ ___('cricket.location') }}:</strong> {{ ___('football.' . $locaion) }} <br>
                    <strong>{{ ___('cricket.start_at') }}:</strong> {{ ___('football.' . $start) }} <br>
                    <strong>{{ ___('cricket.end_at') }}:</strong> {{ ___('football.' . $end) }}
                </a><br>
            </div>
        </div>
    @endforeach
@endsection
