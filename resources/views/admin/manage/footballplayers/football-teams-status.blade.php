@extends('layouts.publichome')

@section('admin_content')
    @foreach ($data->groupBy('team_id') as $rows)
        <div class="card">
            <div class="card-header">
                <a href="">
                    @php
                        $teamName =@$rows[0]->team->team_name;
                    @endphp
                    <h6 class="cart-title"> <strong>{{ ___('football.'.$teamName) }}</strong></h6>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>{{ ___('cricket.ranking') }}</th>
                                <th>{{ ___('cricket.player_name') }}</th>
                                <th>{{ ___('football.goals') }}</th>
                                <th>{{ ___('football.assists') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($rows as $player)
                                <tr>
                                    @php
                                        $players = $player->player_name;
                                        $goals = $player->goals;
                                        $assists = $player->assists;
                                    @endphp
                                    @if ($player->man_women == 'm')
                                        <td>{{ ___('cricket.' . $counter) }}</td>
                                        <td>{{ ___('cricket.' . $players) }}</td>
                                        <td>{{ ___('cricket.' . $goals) }}</td>
                                        <td>{{ ___('cricket.' . $assists) }}</td>
                                        @php
                                            $counter ++
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
