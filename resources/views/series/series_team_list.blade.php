@extends('layouts.publichome')

@section('admin_content')
    @foreach ($series as $s)
        <div class="card">
            <div class="card-title"></div>
            <div class="card-body">
                @php
                    $series = $s->series->series_name;
                    $location = $s->series->venue;
                    $start = $s->series->series_start_time;
                    $end = $s->series->series_end_time;
                @endphp
                <a href="{{ route('getTeamList', ['series_id' => $s->series_id]) }}">
                    <strong>{{ ___('cricket.series_name') }}:</strong> {{ ___('cricket.'.$series) }} <br>
                    <strong>{{ ___('cricket.location') }}:</strong> {{ ___('cricket.'.$location) }} <br>
                    <strong>{{ ___('cricket.start_at') }}:</strong> {{ ___('cricket.'.$start) }} <br>
                    <strong>{{ ___('cricket.end_at') }}:</strong> {{ ___('cricket.'.$end) }}
                </a><br>
            </div>
        </div>
    @endforeach
@endsection
