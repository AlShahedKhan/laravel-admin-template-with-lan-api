@extends('layouts.publichome')

@section('admin_content')
    <div class="page-content">
        <div class="card">
            <div class="card-header">
                <h3>{{ ___('football.match_status') }}</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-borderless border-bottom" id="example1">
                        <thead class="thead">
                            <tr>
                            @php
                                $teamOneName = @$data->team->team_name;
                                $teamTwoName = @$data->team2->team_name;
                            @endphp
                                <th width="40%" class="text-center">{{ ___('cricket.' .$teamOneName) }}</th>
                                <th width="10%" class="text-center">{{ ___('football.team_status') }}</th>
                                <th width="40%" class="text-center">{{ ___('cricket.' .$teamTwoName) }}</th>
                            </tr>
                        </thead>
                        <tbody class="tbody text-center">
                        @php
                            $goalTeamOne = @$data->score->goal->goal;
                            $goalTeamTwo = @$data->score->goal2->goal;
                            $shotsTeamOne = @$data->score->shots->shots;
                            $shotsTeamTwo = @$data->score->shots2->shots;
                            $shotsOnTargetTeamOne = @$data->score->shots_on_target->shots_on_target;
                            $shotsOnTargetTeamTwo = @$data->score->shots_on_target2->shots_on_target;
                            $prossessionTeamOne = @$data->score->prossession->prossession;
                            $prossessionTeamTwo = @$data->score->prossession2->prossession;
                            $passesTeamOne = @$data->score->passes->passes;
                            $passesTeamTwo = @$data->score->passes2->passes;
                            $passesAccuracyTeamOne =  @$data->score->passes_accuracy->passes_accuracy;
                            $passesAccuracyTeamTwo =  @$data->score->passes_accuracy2->passes_accuracy;
                            $foulsTeamOne =  @$data->score->fouls->fouls;
                            $foulsTeamTwo =  @$data->score->fouls2->fouls;
                            $yellowCardsTeamOne =  @$data->score->yellow_cards->yellow_cards;
                            $yellowCardsTeamTwo =  @$data->score->yellow_cards2->yellow_cards;
                            $redCardsTeamOne =  @$data->score->red_cards->red_cards;
                            $redCardsTeamTwo =  @$data->score->red_cards2->red_cards;
                            $offSidesTeamOne =  @$data->score->off_sides->off_sides;
                            $offSidesTeamTwo =  @$data->score->off_sides2->off_sides;

                            $cornersTeamOne =  @$data->score->corners->corners;
                            $cornersTeamTwo =  @$data->score->corners2->corners;
                        @endphp
                            <tr>
                                <td>{{ ___('cricket.' .$goalTeamOne) }}</td>
                                <td>{{ ___('football.goals') }}</td>
                                <td>{{ ___('cricket.' .$goalTeamTwo) }}</td>
                            </tr>
                            <tr>
                                <td>{{ ___('cricket.' .$shotsTeamOne) }}</td>
                                <td>{{ ___('football.shorts') }}</td>
                                <td>{{ ___('cricket.' .$shotsTeamTwo) }}</td>
                            </tr>
                            <tr>
                                <td>{{ ___('cricket.' .$shotsOnTargetTeamOne) }}</td>
                                <td>{{ ___('football.shots_on_target') }}</td>
                                <td>{{ ___('cricket.' .$shotsOnTargetTeamTwo) }}</td>
                            </tr>
                            <tr>
                                <td>{{ ___('cricket.' .$prossessionTeamOne) }}</td>
                                <td>{{ ___('football.prossession') }}</td>
                                <td>{{ ___('cricket.' .$prossessionTeamTwo) }}</td>
                            </tr>
                            <tr>
                                <td>{{ ___('cricket.' .$passesTeamOne) }}</td>
                                <td>{{ ___('football.passes') }}</td>
                                <td>{{ ___('cricket.' .$passesTeamTwo) }}</td>
                            </tr>
                            <tr>
                                <td>{{ ___('cricket.' .$passesAccuracyTeamOne) }}</td>
                                <td>{{ ___('football.passes_accuracy') }}</td>
                                <td>{{ ___('cricket.' .$passesAccuracyTeamTwo) }}</td>
                            </tr>
                            <tr>
                                <td>{{ ___('cricket.' .$foulsTeamOne) }}</td>
                                <td>{{ ___('football.fouls') }}</td>
                                <td>{{ ___('cricket.' .$foulsTeamTwo) }}</td>
                            </tr>
                            <tr>
                                <td>{{ ___('cricket.' .$yellowCardsTeamOne) }}</td>
                                <td>{{ ___('football.yellow_cards') }}</td>
                                <td>{{ ___('cricket.' .$yellowCardsTeamTwo) }}</td>
                            </tr>
                            <tr>
                                <td>{{ ___('cricket.' .$redCardsTeamOne) }}</td>
                                <td>{{ ___('football.red_cards') }}</td>
                                <td>{{ ___('cricket.' .$redCardsTeamTwo) }}</td>
                            </tr>
                            <tr>
                                <td>{{ ___('cricket.' .$offSidesTeamOne) }}</td>
                                <td>{{ ___('football.off_sides') }}</td>
                                <td>{{ ___('cricket.' .$offSidesTeamTwo) }}</td>
                            </tr>
                            <tr>
                                <td>{{ ___('cricket.' .$cornersTeamOne) }}</td>
                                <td>{{ ___('football.corners') }}</td>
                                <td>{{ ___('cricket.' .$cornersTeamTwo) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
