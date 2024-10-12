@extends('layouts.publichome')

@section('admin_content')
    <div class="page-content">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                    aria-controls="nav-home" aria-selected="true">{{ ___('cricket.commentry') }}</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                    aria-controls="nav-profile" aria-selected="false">{{ ___('cricket.full_score') }}</a>
                {{-- <a onclick="GraphScore({{ count($curves) != 0 ? $curves[0]->match_id : '' }})" class="nav-item nav-link"
                    id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact"
                    aria-selected="false">Match Graph</a> --}}
            </div>
        </nav>
        <div class="card">
            {{-- Hidden started --}}
            <div hidden>
                <div class="table-responsive">
                    <table class="table table-bordered role-table" id="example1">
                        <thead class="thead">
                            <tr>
                                <th class="serial"> {{ ___('cricket.batter') }} </th>
                                <th class="purchase"></th>
                                <th class="purchase"></th>
                                <th class="purchase">{{ ___('cricket.runs') }}</th>
                                <th class="purchase">{{ ___('cricket.1') }}</th>
                                <th class="purchase">{{ ___('cricket.2') }}</th>
                                <th class="purchase">{{ ___('cricket.3') }}</th>
                                <th class="purchase">{{ ___('cricket.4') }}</th>
                                <th class="purchase">{{ ___('cricket.6') }}</th>
                                <th class="purchase">{{ ___('cricket.balls') }}</th>
                                <th class="purchase">{{ ___('cricket.strike_rate') }}</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            {{-- @dd($data1->details_id) --}}
                            @php
                                $totalRunFirst = 0;
                            @endphp
                            @foreach ($batterfirsts as $key => $row)
                                <tr>
                                    <td hidden>{{ $team_name_first = $row->team->team_name }}</td>
                                    <td hidden>{{ $player_name = $row->player->player_name }}</td>
                                    <td hidden>{{ $out_type = $row->scoreupdate->out_type }}</td>
                                    <td hidden>{{ $out_by_type = $row->scoreupdateoutbytype->out_by_type }}</td>
                                    <td hidden>{{ $one = $row->scoreupdateone->one }}</td>
                                    <td hidden>{{ $two = $row->scoreupdatetwo->two }}</td>
                                    <td hidden>{{ $three = $row->scoreupdatethree->three }}</td>
                                    <td hidden>{{ $four = $row->scoreupdatefour->four }}</td>
                                    <td hidden>{{ $six = $row->scoreupdatesix->six }}</td>
                                    <td hidden>{{ $Balls = $row->scoreupdateballsplayed->balls_played }}</td>
                                    @php
                                        $BatterRuns = $one * 1 + $two * 2 + $three * 3 + $four * 4 + $six * 6;
                                    @endphp
                                    <td>{{ ___('cricket.' . $player_name) }}</td>
                                    <td>{{ ___('cricket.' . $out_type) }}</td>
                                    <td>{{ ___('cricket.' . $out_by_type) }}</td>
                                    <td>{{ ___('cricket.' . $BatterRuns) }}</td>
                                    {{-- <td>{{ $one }}</td> --}}
                                    <td>{{ ___('cricket.' . $one) }}</td>
                                    <td>{{ ___('cricket.' . $two) }}</td>
                                    <td>{{ ___('cricket.' . $three) }}</td>
                                    <td>{{ ___('cricket.' . $four) }}</td>
                                    <td>{{ ___('cricket.' . $six) }}</td>
                                    <td>{{ ___('cricket.' . $Balls) }}</td>
                                    <td>
                                        @if ($BatterRuns > 0 and $BatterRuns == 0)
                                            @php
                                                $strick_rate_multi_100 = $BatterRuns * 100;
                                            @endphp
                                            {{ ___('cricket.' . $strick_rate_multi_100) }}
                                        @elseif ($Balls > 0 and $BatterRuns == 0)
                                            @php
                                                $strick_rate_ball_mul_run = $Balls * $BatterRuns;
                                            @endphp
                                            {{ ___('cricket.' . $strick_rate_ball_mul_run) }}
                                        @elseif ($Balls == 0 and $BatterRuns == 0)
                                            @php
                                                $strick_rate_ball_mul_run = $Balls * $BatterRuns;
                                            @endphp
                                            {{ ___('cricket.' . $strick_rate_ball_mul_run) }}
                                        @elseif ($Balls == 0 and $BatterRuns > 0)
                                            @php
                                                $strick_rate_multi_100 = $BatterRuns * 100;
                                            @endphp
                                            {{ ___('cricket.' . $strick_rate_multi_100) }}
                                        @elseif ($BatterRuns > 0 and $Balls >= 0)
                                            @php
                                                $strick_rate_run_div_ball = $BatterRuns / $Balls;
                                                $strick_rate_run_div_ball_mul_100 = $strick_rate_run_div_ball * 100;
                                            @endphp
                                            {{ ___('cricket.' . $strick_rate_run_div_ball_mul_100) }}
                                        @endif
                                    </td>
                                </tr>
                                @php
                                    $totalRunFirst = $totalRunFirst + $BatterRuns;
                                @endphp
                            @endforeach
                        </tbody>
                        <h3>{{ ___('cricket.' . $team_name_first) }}-{{ ___('cricket.' . $totalRunFirst) }}</h3>
                    </table>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered role-table" id="example1">
                        <thead class="thead">
                            <tr>
                                <th class="serial"> {{ ___('cricket.bowler') }} </th>
                                <th class="purchase">{{ ___('cricket.runs') }}</th>
                                <th class="purchase">{{ ___('cricket.overs') }}</th>
                                <th class="purchase">{{ ___('cricket.median') }}</th>
                                <th class="purchase">{{ ___('cricket.wickets') }}</th>
                                <th class="purchase">{{ ___('cricket.no_balls') }}</th>
                                <th class="purchase">{{ ___('cricket.wide') }}</th>
                                <th class="purchase">{{ ___('cricket.economy') }}</th>
                                <th class="purchase">{{ ___('cricket.penalty_runs') }}</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            @php
                                $totalOversFirst = 0;
                                $totalWicketsFirst = 0;
                            @endphp
                            @foreach ($bowlerfirsts as $key => $row)
                                <tr>
                                    <td hidden>{{ $player_name = $row->player->player_name }}</td>
                                    <td hidden>{{ $run = $row->updatebowlerruns->runs }}</td>
                                    <td hidden>{{ $overs = $row->updatebowlerovers->overs }}</td>
                                    <td hidden>{{ $maidens = $row->updatebowlermaidens->maidens }}</td>
                                    <td hidden>{{ $wickets = $row->updatebowlerwickets->wickets }}</td>
                                    <td hidden>{{ $no_balls = $row->updatebowlernoballs->no_balls }}</td>
                                    <td hidden>{{ $wides = $row->updatebowlerwides->wides }}</td>
                                    <td hidden>{{ $panalty_runs = $row->updatebowlerpanaltyruns->panalty_runs }}
                                    </td>
                                    <td>{{ ___('cricket.' . $player_name) }}</td>
                                    <td>{{ ___('cricket.' . $run) }}</td>
                                    {{-- <td>{{ ___('cricket.overs', ['overs' => number_format($overs, 1)]) }}</td> --}}
                                    {{-- @dd(['overs' => number_format($overs, 1)]) --}}
                                    {{-- <td>{{ $overs }}</td> --}}

                                    @php
                                        if (!function_exists('bn_number_format')) {
                                            function bn_number_format($number, $decimals = 0)
                                            {
                                                $bn_digits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
                                                $formatted = number_format($number, $decimals, '.', ''); // Use '.' as decimal separator
                                                $formatted_bn = str_replace(range(0, 9), $bn_digits, $formatted); // Replace digits with Bengali numerals
                                                $formatted_bn = str_replace('.', ',', $formatted_bn); // Replace '.' with ',' as decimal separator
                                                return $formatted_bn;
                                            }
                                        }
                                        
                                    @endphp

                                    <td>{{ str_replace('{overs_bengali}', bn_number_format($overs, 1), ___('cricket.overs')) }}
                                    </td>
                                    <td>{{ ___('cricket.' . $maidens) }}</td>
                                    <td>{{ ___('cricket.' . $wickets) }}</td>
                                    <td>{{ ___('cricket.' . $no_balls) }}</td>
                                    <td>{{ ___('cricket.' . $wides) }}</td>
                                    @php
                                        $totalOversFirst = $totalOversFirst + $overs;
                                        $totalWicketsFirst = $totalWicketsFirst + $wickets;
                                    @endphp
                                    <td>
                                        @if ($run == 0 and $overs == 0)
                                            {{ ___('cricket.' . $run) }}
                                        @elseif ($run > 0 and $overs == 0)
                                            {{ ___('cricket.' . $run) }}
                                        @else
                                            @php
                                                $ecomomy = $run / $overs;
                                            @endphp
                                            {{ ___('cricket.' . $ecomomy) }}
                                        @endif
                                    </td>
                                    <td>{{ ___('cricket.' . $panalty_runs) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        @php
                            $totalOversFirstInnings = $totalOversFirst;
                        @endphp
                    </table>

                </div>

                <!-- Batter second table end -->
                <div class="table-responsive">
                    <table class="table table-bordered role-table" id="example1">
                        <thead class="thead">
                            <tr>
                                <th class="serial"> {{ ___('cricket.batter') }} </th>
                                <th class="purchase"></th>
                                <th class="purchase"></th>
                                <th class="purchase">{{ ___('cricket.runs') }}</th>
                                <th class="purchase">{{ ___('cricket.1') }}</th>
                                <th class="purchase">{{ ___('cricket.2') }}</th>
                                <th class="purchase">{{ ___('cricket.3') }}</th>
                                <th class="purchase">{{ ___('cricket.4') }}</th>
                                <th class="purchase">{{ ___('cricket.6') }}</th>
                                <th class="purchase">{{ ___('cricket.balls') }}</th>
                                <th class="purchase">{{ ___('cricket.strike_rate') }}</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            {{-- @dd($data1->details_id) --}}
                            @php
                                $totalRunSecond = 0;
                            @endphp
                            @foreach ($batterseconds as $key => $row)
                                <tr>
                                    <td hidden>{{ $team_name_second = $row->team->team_name }}</td>
                                    <td hidden>{{ $player_name = $row->player->player_name }}</td>
                                    <td hidden>{{ $out_type = $row->scoreupdate->out_type }}</td>
                                    <td hidden>{{ $out_by_type = $row->scoreupdateoutbytype->out_by_type }}</td>
                                    <td hidden>{{ $one = $row->scoreupdateone->one }}</td>
                                    <td hidden>{{ $two = $row->scoreupdatetwo->two }}</td>
                                    <td hidden>{{ $three = $row->scoreupdatethree->three }}</td>
                                    <td hidden>{{ $four = $row->scoreupdatefour->four }}</td>
                                    <td hidden>{{ $six = $row->scoreupdatesix->six }}</td>
                                    <td hidden>{{ $Balls = $row->scoreupdateballsplayed->balls_played }}</td>
                                    @php
                                        $BatterRuns = $one * 1 + $two * 2 + $three * 3 + $four * 4 + $six * 6;
                                    @endphp
                                    <td>{{ ___('cricket.' . $player_name) }}</td>
                                    <td>{{ ___('cricket.' . $out_type) }}</td>
                                    <td>{{ ___('cricket.' . $out_by_type) }}</td>
                                    <td>{{ ___('cricket.' . $BatterRuns) }}</td>
                                    <td>{{ ___('cricket.' . $one) }}</td>
                                    <td>{{ ___('cricket.' . $two) }}</td>
                                    <td>{{ ___('cricket.' . $three) }}</td>
                                    <td>{{ ___('cricket.' . $four) }}</td>
                                    <td>{{ ___('cricket.' . $six) }}</td>
                                    <td>{{ ___('cricket.' . $Balls) }}</td>
                                    <td>
                                        @if ($BatterRuns > 0 and $BatterRuns == 0)
                                            @php
                                                $strick_rate_multi_100 = $BatterRuns * 100;
                                            @endphp
                                            {{ ___('cricket.' . $strick_rate_multi_100) }}
                                        @elseif ($Balls > 0 and $BatterRuns == 0)
                                            @php
                                                $strick_rate_ball_mul_run = $Balls * $BatterRuns;
                                            @endphp
                                            {{ ___('cricket.' . $strick_rate_ball_mul_run) }}
                                        @elseif ($Balls == 0 and $BatterRuns == 0)
                                            @php
                                                $strick_rate_ball_mul_run = $Balls * $BatterRuns;
                                            @endphp
                                            {{ ___('cricket.' . $strick_rate_ball_mul_run) }}
                                        @elseif ($Balls == 0 and $BatterRuns > 0)
                                            @php
                                                $strick_rate_multi_100 = $BatterRuns * 100;
                                            @endphp
                                            {{ ___('cricket.' . $strick_rate_multi_100) }}
                                        @elseif ($BatterRuns > 0 and $Balls >= 0)
                                            @php
                                                $strick_rate_run_div_ball = $BatterRuns / $Balls;
                                                $strick_rate_run_div_ball_mul_100 = $strick_rate_run_div_ball * 100;
                                            @endphp
                                            {{ ___('cricket.' . $strick_rate_run_div_ball_mul_100) }}
                                        @endif
                                    </td>
                                </tr>
                                @php
                                    $totalRunSecond = $totalRunSecond + $BatterRuns;
                                @endphp
                            @endforeach
                        </tbody>
                        <h3>{{ ___('cricket.' . $team_name_second) }}-{{ ___('cricket.' . $totalRunSecond) }}</h3>
                    </table>
                </div>
                <!--Batter second table end -->

                <!--  Bowler Second table start -->
                <div class="table-responsive">
                    <table class="table table-bordered role-table" id="example1">
                        <thead class="thead">
                            <tr>
                                <th class="serial"> {{ ___('cricket.bowler') }} </th>
                                <th class="purchase">{{ ___('cricket.runs') }}</th>
                                <th class="purchase">{{ ___('cricket.overs') }}</th>
                                <th class="purchase">{{ ___('cricket.median') }}</th>
                                <th class="purchase">{{ ___('cricket.wickets') }}</th>
                                <th class="purchase">{{ ___('cricket.no_balls') }}</th>
                                <th class="purchase">{{ ___('cricket.wide') }}</th>
                                <th class="purchase">{{ ___('cricket.economy') }}</th>
                                <th class="purchase">{{ ___('cricket.penalty_runs') }}</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            @php
                                $totalOversSecond = 0;
                                $totalWicketsSecond = 0;
                            @endphp
                            @foreach ($bowlerseconds as $key => $row)
                                <tr>
                                    <td hidden>{{ $player_name = $row->player->player_name }}</td>
                                    <td hidden>{{ $run = $row->updatebowlerruns->runs }}</td>
                                    <td hidden>{{ $overs = $row->updatebowlerovers->overs }}</td>
                                    <td hidden>{{ $maidens = $row->updatebowlermaidens->maidens }}</td>
                                    <td hidden>{{ $wickets = $row->updatebowlerwickets->wickets }}</td>
                                    <td hidden>{{ $no_balls = $row->updatebowlernoballs->no_balls }}</td>
                                    <td hidden>{{ $wides = $row->updatebowlerwides->wides }}</td>
                                    <td hidden>{{ $panalty_runs = $row->updatebowlerpanaltyruns->panalty_runs }}
                                    </td>

                                    <td>{{ ___('cricket.' . $player_name) }}</td>
                                    <td>{{ ___('cricket.' . $run) }}</td>
                                    <td>{{ ___('cricket.' . $overs) }}</td>
                                    <td>{{ ___('cricket.' . $maidens) }}</td>
                                    <td>{{ ___('cricket.' . $wickets) }}</td>
                                    <td>{{ ___('cricket.' . $no_balls) }}</td>
                                    <td>{{ ___('cricket.' . $wides) }}</td>
                                    @php
                                        $totalOversSecond = $totalOversSecond + $overs;
                                        $totalWicketsSecond = $totalWicketsSecond + $wickets;
                                    @endphp
                                    <td>
                                        @if ($run == 0 and $overs == 0)
                                            {{ ___('cricket.' . $run) }}
                                        @elseif ($run > 0 and $overs == 0)
                                            {{ ___('cricket.' . $run) }}
                                        @else
                                            @php
                                                $ecomomy = $run / $overs;
                                            @endphp
                                            {{ ___('cricket.' . $ecomomy) }}
                                        @endif
                                    </td>
                                    <td>{{ ___('cricket.' . $panalty_runs) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        @php
                            $totalOverSecondInnings = $totalOversSecond;
                            $totalWicketsSecond = $totalWicketsSecond;
                        @endphp
                    </table>
                </div>
                <!-- Bowler second table end -->


            </div>

            {{-- Hidden End --}}
            <div class="card-header">
                <h1>{{ ___('football.match_status') }}</h1>
            </div>
            <div class="tab-content" id="nav-tabContent">
                @foreach ($managePublicTable as $key => $row)
                    @php
                        $table_numbers = $row->table_number;
                        $targatedRuns = $row->targeted_runs;
                        $targatedRuns = $targatedRuns - $totalRunSecond;
                        $targetedOvers = $row->targeted_overs;
                        $targetedOvers = $targetedOvers - $totalOversSecond;
                    @endphp
                @endforeach
                @if ($table_numbers == 3 || $table_numbers == 4)
                    <h5>{{ ___('cricket.' . $targatedRuns) }} {{ ___('cricket.need_from') }}
                        {{ ___('cricket.' . $targetedOvers) }} {{ ___('cricket.balls') }} </h5>
                @endif
                @if ($table_numbers == 0 || $table_numbers == 1 || $table_numbers == 2 || $table_numbers == 3 || $table_numbers == 4)
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <br>
                        <h3>{{ ___('cricket.' . $team_name_first) }}-{{ ___('cricket.' . $totalRunFirst) }}/{{ ___('cricket.' . $totalWicketsFirst) }}
                            ({{ $totalOversFirstInnings }})</h3>
                        <h3>{{ ___('cricket.' . $team_name_second) }}-{{ ___('cricket.' . $totalRunSecond) }}/{{ ___('cricket.' . $totalWicketsSecond) }}
                            ({{ $totalOversSecond }})</h3>
                        @foreach ($commentries as $commentry)
                            <p><strong>{{ $commentry->player->player_name }}
                                </strong>({{ $commentry->player2->player_name }}):
                                {{ $commentry->CommentryCreateDetails->details }}</p>
                        @endforeach
                    </div>
                @endif

                <div class="tab-pane fade card-body" id="nav-profile" >
                    @if ($table_numbers == 1 || $table_numbers == 2 || $table_numbers == 3 || $table_numbers == 4)
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered role-table" id="example1">
                                <thead class="thead">
                                    <tr>
                                        <th class="serial"> {{ ___('cricket.batter') }} </th>
                                        <th class="purchase"></th>
                                        <th class="purchase"></th>
                                        <th class="purchase">{{ ___('cricket.runs') }}</th>
                                        <th class="purchase">{{ ___('cricket.1') }}</th>
                                        <th class="purchase">{{ ___('cricket.2') }}</th>
                                        <th class="purchase">{{ ___('cricket.3') }}</th>
                                        <th class="purchase">{{ ___('cricket.4') }}</th>
                                        <th class="purchase">{{ ___('cricket.6') }}</th>
                                        <th class="purchase">{{ ___('cricket.balls') }}</th>
                                        <th class="purchase">{{ ___('cricket.strike_rate') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    {{-- @dd($data1->details_id) --}}
                                    @php
                                        $totalRunFirst = 0;
                                    @endphp
                                    @foreach ($batterfirsts as $key => $row)
                                        <tr>
                                            <td hidden>{{ $team_name = $row->team->team_name }}</td>
                                            <td hidden>{{ $player_name = $row->player->player_name }}</td>
                                            <td hidden>{{ $out_type = $row->scoreupdate->out_type }}</td>
                                            <td hidden>{{ $out_by_type = $row->scoreupdateoutbytype->out_by_type }}</td>
                                            <td hidden>{{ $one = $row->scoreupdateone->one }}</td>
                                            <td hidden>{{ $two = $row->scoreupdatetwo->two }}</td>
                                            <td hidden>{{ $three = $row->scoreupdatethree->three }}</td>
                                            <td hidden>{{ $four = $row->scoreupdatefour->four }}</td>
                                            <td hidden>{{ $six = $row->scoreupdatesix->six }}</td>
                                            <td hidden>{{ $Balls = $row->scoreupdateballsplayed->balls_played }}</td>
                                            @php
                                                $BatterRuns = $one * 1 + $two * 2 + $three * 3 + $four * 4 + $six * 6;
                                            @endphp
                                            <td>{{ ___('cricket.' . $player_name) }}</td>
                                            <td>{{ ___('cricket.' . $out_type) }}</td>
                                            <td>{{ ___('cricket.' . $out_by_type) }}</td>
                                            <td>{{ ___('cricket.' . $BatterRuns) }}</td>
                                            {{-- <td>{{ $one }}</td> --}}
                                            <td>{{ ___('cricket.' . $one) }}</td>
                                            <td>{{ ___('cricket.' . $two) }}</td>
                                            <td>{{ ___('cricket.' . $three) }}</td>
                                            <td>{{ ___('cricket.' . $four) }}</td>
                                            <td>{{ ___('cricket.' . $six) }}</td>
                                            <td>{{ ___('cricket.' . $Balls) }}</td>
                                            <td>
                                                @if ($BatterRuns > 0 and $BatterRuns == 0)
                                                    @php
                                                        $strick_rate_multi_100 = $BatterRuns * 100;
                                                    @endphp
                                                    {{ ___('cricket.' . $strick_rate_multi_100) }}
                                                @elseif ($Balls > 0 and $BatterRuns == 0)
                                                    @php
                                                        $strick_rate_ball_mul_run = $Balls * $BatterRuns;
                                                    @endphp
                                                    {{ ___('cricket.' . $strick_rate_ball_mul_run) }}
                                                @elseif ($Balls == 0 and $BatterRuns == 0)
                                                    @php
                                                        $strick_rate_ball_mul_run = $Balls * $BatterRuns;
                                                    @endphp
                                                    {{ ___('cricket.' . $strick_rate_ball_mul_run) }}
                                                @elseif ($Balls == 0 and $BatterRuns > 0)
                                                    @php
                                                        $strick_rate_multi_100 = $BatterRuns * 100;
                                                    @endphp
                                                    {{ ___('cricket.' . $strick_rate_multi_100) }}
                                                @elseif ($BatterRuns > 0 and $Balls >= 0)
                                                    @php
                                                        $strick_rate_run_div_ball = $BatterRuns / $Balls;
                                                        $strick_rate_run_div_ball_mul_100 = $strick_rate_run_div_ball * 100;
                                                    @endphp
                                                    {{ ___('cricket.' . $strick_rate_run_div_ball_mul_100) }}
                                                @endif
                                            </td>
                                        </tr>
                                        @php
                                            $totalRunFirst = $totalRunFirst + $BatterRuns;
                                        @endphp
                                    @endforeach
                                </tbody>
                                <h3>{{ ___('cricket.' . $team_name_first) }}-{{ ___('cricket.' . $totalRunFirst) }}/{{ ___('cricket.' . $totalWicketsFirst) }}
                                    ({{ $totalOversFirstInnings }})</h3>
                            </table>
                        </div>
                        </div>
                    @endif
                    <!--Batter First table end -->

                    <!--  Bowler First table start -->
                    @if ($table_numbers == 2 || $table_numbers == 3 || $table_numbers == 4)
                        <div class="table-responsive">
                            <table class="table table-bordered role-table" id="example1">
                                <thead class="thead">
                                    <tr>
                                        <th class="serial"> {{ ___('cricket.bowler') }} </th>
                                        <th class="purchase">{{ ___('cricket.runs') }}</th>
                                        <th class="purchase">{{ ___('cricket.overs') }}</th>
                                        <th class="purchase">{{ ___('cricket.median') }}</th>
                                        <th class="purchase">{{ ___('cricket.wickets') }}</th>
                                        <th class="purchase">{{ ___('cricket.no_balls') }}</th>
                                        <th class="purchase">{{ ___('cricket.wide') }}</th>
                                        <th class="purchase">{{ ___('cricket.economy') }}</th>
                                        <th class="purchase">{{ ___('cricket.penalty_runs') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    @php
                                        $totalOversFirst = 0;
                                    @endphp
                                    @foreach ($bowlerfirsts as $key => $row)
                                        <tr>
                                            <td hidden>{{ $player_name = $row->player->player_name }}</td>
                                            <td hidden>{{ $run = $row->updatebowlerruns->runs }}</td>
                                            <td hidden>{{ $overs = $row->updatebowlerovers->overs }}</td>
                                            <td hidden>{{ $maidens = $row->updatebowlermaidens->maidens }}</td>
                                            <td hidden>{{ $wickets = $row->updatebowlerwickets->wickets }}</td>
                                            <td hidden>{{ $no_balls = $row->updatebowlernoballs->no_balls }}</td>
                                            <td hidden>{{ $wides = $row->updatebowlerwides->wides }}</td>
                                            <td hidden>{{ $panalty_runs = $row->updatebowlerpanaltyruns->panalty_runs }}
                                            </td>
                                            <td>{{ ___('cricket.' . $player_name) }}</td>
                                            <td>{{ ___('cricket.' . $run) }}</td>
                                            {{-- <td>{{ ___('cricket.overs', ['overs' => number_format($overs, 1)]) }}</td> --}}
                                            {{-- @dd(['overs' => number_format($overs, 1)]) --}}
                                            <td>{{ $overs }}</td>
                                            <td>{{ ___('cricket.' . $maidens) }}</td>
                                            <td>{{ ___('cricket.' . $wickets) }}</td>
                                            <td>{{ ___('cricket.' . $no_balls) }}</td>
                                            <td>{{ ___('cricket.' . $wides) }}</td>
                                            @php
                                                $totalOversFirst = $totalOversFirst + $overs;
                                            @endphp
                                            <td>
                                                @if ($run == 0 and $overs == 0)
                                                    {{ ___('cricket.' . $run) }}
                                                @elseif ($run > 0 and $overs == 0)
                                                    {{ ___('cricket.' . $run) }}
                                                @else
                                                    @php
                                                        $ecomomy = $run / $overs;
                                                    @endphp
                                                    {{ ___('cricket.' . $ecomomy) }}
                                                @endif
                                            </td>
                                            <td>{{ ___('cricket.' . $panalty_runs) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    @endif

                    <!-- Bowler First table end -->


                    @if ($table_numbers == 3 || $table_numbers == 4)
                        <!-- Batter second table end -->
                        <div class="table-responsive">
                            <table class="table table-bordered role-table" id="example1">
                                <thead class="thead">
                                    <tr>
                                        <th class="serial"> {{ ___('cricket.batter') }} </th>
                                        <th class="purchase"></th>
                                        <th class="purchase"></th>
                                        <th class="purchase">{{ ___('cricket.runs') }}</th>
                                        <th class="purchase">{{ ___('cricket.1') }}</th>
                                        <th class="purchase">{{ ___('cricket.2') }}</th>
                                        <th class="purchase">{{ ___('cricket.3') }}</th>
                                        <th class="purchase">{{ ___('cricket.4') }}</th>
                                        <th class="purchase">{{ ___('cricket.6') }}</th>
                                        <th class="purchase">{{ ___('cricket.balls') }}</th>
                                        <th class="purchase">{{ ___('cricket.strike_rate') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    {{-- @dd($data1->details_id) --}}
                                    @php
                                        $totalRunSecond = 0;
                                    @endphp
                                    @foreach ($batterseconds as $key => $row)
                                        <tr>
                                            <td hidden>{{ $team_name_second = $row->team->team_name }}</td>
                                            <td hidden>{{ $player_name = $row->player->player_name }}</td>
                                            <td hidden>{{ $out_type = $row->scoreupdate->out_type }}</td>
                                            <td hidden>{{ $out_by_type = $row->scoreupdateoutbytype->out_by_type }}</td>
                                            <td hidden>{{ $one = $row->scoreupdateone->one }}</td>
                                            <td hidden>{{ $two = $row->scoreupdatetwo->two }}</td>
                                            <td hidden>{{ $three = $row->scoreupdatethree->three }}</td>
                                            <td hidden>{{ $four = $row->scoreupdatefour->four }}</td>
                                            <td hidden>{{ $six = $row->scoreupdatesix->six }}</td>
                                            <td hidden>{{ $Balls = $row->scoreupdateballsplayed->balls_played }}</td>
                                            @php
                                                $BatterRuns = $one * 1 + $two * 2 + $three * 3 + $four * 4 + $six * 6;
                                            @endphp
                                            <td>{{ ___('cricket.' . $player_name) }}</td>
                                            <td>{{ ___('cricket.' . $out_type) }}</td>
                                            <td>{{ ___('cricket.' . $out_by_type) }}</td>
                                            <td>{{ ___('cricket.' . $BatterRuns) }}</td>
                                            <td>{{ ___('cricket.' . $one) }}</td>
                                            <td>{{ ___('cricket.' . $two) }}</td>
                                            <td>{{ ___('cricket.' . $three) }}</td>
                                            <td>{{ ___('cricket.' . $four) }}</td>
                                            <td>{{ ___('cricket.' . $six) }}</td>
                                            <td>{{ ___('cricket.' . $Balls) }}</td>
                                            <td>
                                                @if ($BatterRuns > 0 and $BatterRuns == 0)
                                                    @php
                                                        $strick_rate_multi_100 = $BatterRuns * 100;
                                                    @endphp
                                                    {{ ___('cricket.' . $strick_rate_multi_100) }}
                                                @elseif ($Balls > 0 and $BatterRuns == 0)
                                                    @php
                                                        $strick_rate_ball_mul_run = $Balls * $BatterRuns;
                                                    @endphp
                                                    {{ ___('cricket.' . $strick_rate_ball_mul_run) }}
                                                @elseif ($Balls == 0 and $BatterRuns == 0)
                                                    @php
                                                        $strick_rate_ball_mul_run = $Balls * $BatterRuns;
                                                    @endphp
                                                    {{ ___('cricket.' . $strick_rate_ball_mul_run) }}
                                                @elseif ($Balls == 0 and $BatterRuns > 0)
                                                    @php
                                                        $strick_rate_multi_100 = $BatterRuns * 100;
                                                    @endphp
                                                    {{ ___('cricket.' . $strick_rate_multi_100) }}
                                                @elseif ($BatterRuns > 0 and $Balls >= 0)
                                                    @php
                                                        $strick_rate_run_div_ball = $BatterRuns / $Balls;
                                                        $strick_rate_run_div_ball_mul_100 = $strick_rate_run_div_ball * 100;
                                                    @endphp
                                                    {{ ___('cricket.' . $strick_rate_run_div_ball_mul_100) }}
                                                @endif
                                            </td>
                                        </tr>
                                        @php
                                            $totalRunSecond = $totalRunSecond + $BatterRuns;
                                        @endphp
                                    @endforeach
                                </tbody>
                                <h3>{{ ___('cricket.' . $team_name_second) }}-{{ ___('cricket.' . $totalRunSecond) }}/{{ ___('cricket.' . $totalWicketsSecond) }}
                                    ({{ $totalOversSecond }})</h3>
                            </table>
                        </div>
                        <!--Batter second table end -->
                    @endif

                    @if ($table_numbers == 4)
                        <!--  Bowler Second table start -->
                        <div class="table-responsive">
                            <table class="table table-bordered role-table" id="example1">
                                <thead class="thead">
                                    <tr>
                                        <th class="serial"> {{ ___('cricket.bowler') }} </th>
                                        <th class="purchase">{{ ___('cricket.runs') }}</th>
                                        <th class="purchase">{{ ___('cricket.overs') }}</th>
                                        <th class="purchase">{{ ___('cricket.median') }}</th>
                                        <th class="purchase">{{ ___('cricket.wickets') }}</th>
                                        <th class="purchase">{{ ___('cricket.no_balls') }}</th>
                                        <th class="purchase">{{ ___('cricket.wide') }}</th>
                                        <th class="purchase">{{ ___('cricket.economy') }}</th>
                                        <th class="purchase">{{ ___('cricket.penalty_runs') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    @php
                                        $totalOversSecond = 0;
                                    @endphp
                                    @foreach ($bowlerseconds as $key => $row)
                                        <tr>
                                            <td hidden>{{ $player_name = $row->player->player_name }}</td>
                                            <td hidden>{{ $run = $row->updatebowlerruns->runs }}</td>
                                            <td hidden>{{ $overs = $row->updatebowlerovers->overs }}</td>
                                            <td hidden>{{ $maidens = $row->updatebowlermaidens->maidens }}</td>
                                            <td hidden>{{ $wickets = $row->updatebowlerwickets->wickets }}</td>
                                            <td hidden>{{ $no_balls = $row->updatebowlernoballs->no_balls }}</td>
                                            <td hidden>{{ $wides = $row->updatebowlerwides->wides }}</td>
                                            <td hidden>{{ $panalty_runs = $row->updatebowlerpanaltyruns->panalty_runs }}
                                            </td>

                                            <td>{{ ___('cricket.' . $player_name) }}</td>
                                            <td>{{ ___('cricket.' . $run) }}</td>
                                            <td>{{ ___('cricket.' . $overs) }}</td>
                                            <td>{{ ___('cricket.' . $maidens) }}</td>
                                            <td>{{ ___('cricket.' . $wickets) }}</td>
                                            <td>{{ ___('cricket.' . $no_balls) }}</td>
                                            <td>{{ ___('cricket.' . $wides) }}</td>
                                            @php
                                                $totalOversSecond = $totalOversSecond + $overs;
                                            @endphp
                                            <td>
                                                @if ($run == 0 and $overs == 0)
                                                    {{ ___('cricket.' . $run) }}
                                                @elseif ($run > 0 and $overs == 0)
                                                    {{ ___('cricket.' . $run) }}
                                                @else
                                                    @php
                                                        $ecomomy = $run / $overs;
                                                    @endphp
                                                    {{ ___('cricket.' . $ecomomy) }}
                                                @endif
                                            </td>
                                            <td>{{ ___('cricket.' . $panalty_runs) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Bowler second table end -->
                    @endif

                    <!--  pagination start -->

                    <div class="ot-pagination pagination-content d-flex justify-content-end align-content-center py-3">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-between">
                                {{-- {!!$data['roles']->links() !!} --}}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
