@extends('layouts.publichome')
@section('admin_content')
    <div class="card">
        <div class="card-title"></div>
        <div class="card-body">
            <table class="table table-bordered user-table">
                <thead class="thead">
                    <tr>
                        <th class="serial">{{ ___('common.sr_no.') }}</th>
                        <th>{{ ___('cricket.team_name') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $serialNumber = 1;
                        $fetchedTeams = []; // Array to store already fetched team_id and team2_id combinations
                    @endphp

                    @foreach ($teams->unique('team_id') as $team)
                        <tr>
                            @php
                                $teamName = $team->team->team_name;
                            @endphp
                            <td>{{ ___('cricket.' . $serialNumber++) }}</td>
                            <td>{{ ___('cricket.' . $teamName) }}</td>
                        </tr>
                        @php
                            $fetchedTeams[] = $team->team_id;
                        @endphp
                    @endforeach

                    @foreach ($teams->unique('team2_id') as $team)
                        @if ($team->team_id !== $team->team2_id && !in_array($team->team2_id, $fetchedTeams))
                            @php
                                $teamName2 = $team->team2->team_name;
                            @endphp
                            <tr>
                                <td>{{ ___('cricket.' . $serialNumber++) }}</td>
                                <td>{{ ___('cricket.' . $teamName2) }}</td>
                            </tr>
                            @php
                                $fetchedTeams[] = $team->team_id;
                            @endphp
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
