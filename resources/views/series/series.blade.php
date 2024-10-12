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

                    $translatedStart = ___('cricket.'.$start);
                    $translatedEnd = ___('cricket.'.$end);
                @endphp
                <a href="{{ route('getMatchList', ['series_id' => $s->series_id]) }}">
                    <strong>{{ ___('cricket.series_name') }}:</strong> {{ ___('cricket.'.$series) }} <br>
                    <strong>{{ ___('cricket.location') }}:</strong> {{ ___('cricket.'.$location) }} <br>
                    <strong>{{ ___('cricket.start_at') }}:</strong> {{ $translatedStart }} <br>
                    <strong>{{ ___('cricket.end_at') }}:</strong> {{ $translatedEnd }}
                </a><br>
            </div>

        </div>
    @endforeach
@endsection
