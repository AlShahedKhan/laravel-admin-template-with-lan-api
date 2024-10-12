@extends('layouts.publichome')

@section('admin_content')
    @foreach ($data->groupBy('team_id') as $rows)
        <div class="card">
            <div class="card-header">
                <a href="">
                    <h6 class="cart-title">{{ ___('cricket.all_time_leading_run_scorers_ranking_of') }}
                        @php
                            $teams = @$rows[0]->team->team_name;
                        @endphp
                        <strong>{{ ___('cricket.'.$teams) }} </strong>{{ ___('cricket.mans_team') }}
                    </h6>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>{{ ___('cricket.ranking') }}</th>
                                <th>{{ ___('cricket.player_name') }}</th>
                                <th>{{ ___('cricket.runs') }}</th>
                                <th>{{ ___('cricket.wickets') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($rows->sortByDesc('player_runs') as $player)
                                <tr>
                                    @php
                                        $players = $player->player_name;
                                        $runs = $player->player_runs;
                                        $wickets = $player->player_wickets;
                                        $man_women = $player->man_women;
                                    @endphp
                                    @if ($man_women == 'm')
                                        <td class="serial">{{ ___('cricket.' . $counter) }}</td>
                                        <td>{{ ___('cricket.' . $players) }}</td>
                                        <td>{{ ___('cricket.' . $runs) }}</td>
                                        <td>{{ ___('cricket.' . $wickets) }}</td>
                                        @php
                                            $counter++;
                                        @endphp
                                    @endif
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach
@endsection
