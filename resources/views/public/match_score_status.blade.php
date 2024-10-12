@extends('layouts.publichome')

@section('title', 'Cricket Score - Score')

@section('admin_content')

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

    <div hidden>
        @foreach ($managePublicTable as $key => $row)
            @php
                $table_numbers = $row->table_number;
                $targatedRuns = $row->targeted_runs;
                $targatedRuns = $targatedRuns - $totalRunSecond;
                $targetedOvers = $row->targeted_overs;
                $targetedOvers = $targetedOvers - $totalOversSecond;
            @endphp
        @endforeach
    </div>

    {{-- Hidden End --}}
    <h4 class="fw-bold py-3 mb-4">
        <span><a href="{{ route('cricket') }}">{{ ___('cricket.cricket') }}</a> /
        </span>{{ ___('cricket.scoreboard') }}
    </h4>

    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i>
                        {{ ___('cricket.scoreboard') }}</a></li>
                <li class="nav-item"><a class="nav-link"
                        href="{{ route('cricketMatchCommentryStatus', ['matchId' => $managePublicTable[0]->match_id]) }}"><i
                            class="bx bx-bell me-1"></i> {{ ___('cricket.commentary') }}</a></li>
                <li class="nav-item"><a class="nav-link"
                        href="{{ route('cricketMatchStatsStatus', ['matchId' => $managePublicTable[0]->match_id]) }}"><i
                            class="bx bx-bell me-1"></i> {{ ___('cricket.stats') }}</a></li>
            </ul>
            <div class="card">
                <!-- Account -->
                <div class="card-header">
                    @if ($table_numbers == 0 || $table_numbers == 1 || $table_numbers == 2 || $table_numbers == 3 || $table_numbers == 4)
                        <h3>{{ ___('cricket.' . $team_name_first) }}-{{ ___('cricket.' . $totalRunFirst) }}/{{ ___('cricket.' . $totalWicketsFirst) }}
                            ({{ $totalOversFirstInnings }})</h3>
                        <h3 style="margin-top: 0.5em">
                            {{ ___('cricket.' . $team_name_second) }}-{{ ___('cricket.' . $totalRunSecond) }}/{{ ___('cricket.' . $totalWicketsSecond) }}
                            ({{ $totalOversSecond }})</h3>
                    @endif
                    @if ($table_numbers == 3 || $table_numbers == 4)
                        <h3 style="margin-top: 0.5em">{{ ___('cricket.' . $targatedRuns) }}
                            {{ ___('cricket.need_from') }}
                            {{ ___('cricket.' . $targetedOvers) }} {{ ___('cricket.overs') }} </h3>
                    @endif
                </div>

                <hr class="my-0">

                {{-- Batter First table start  --}}
                @if ($table_numbers == 1 || $table_numbers == 2 || $table_numbers == 3 || $table_numbers == 4)

                    <div class="card-body">
                        <h3 class="card-header">
                            {{ ___('cricket.' . $team_name_first) }}-{{ ___('cricket.' . $totalRunFirst) }}/{{ ___('cricket.' . $totalWicketsFirst) }}
                            ({{ $totalOversFirstInnings }})</h3>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless border-bottom">
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
                                    @php
                                        $totalRunFirst = 0;
                                    @endphp
                                    @foreach ($batterfirsts as $key => $row)
                                        <tr>
                                            <td hidden>{{ $team_name = $row->team->team_name }}</td>
                                            <td hidden>{{ $player_name = $row->player->player_name }}</td>
                                            <td hidden>{{ $out_type = $row->scoreupdate->out_type }}</td>
                                            <td hidden>{{ $out_by_type = $row->scoreupdateoutbytype->out_by_type }}
                                            </td>
                                            <td hidden>{{ $one = $row->scoreupdateone->one }}</td>
                                            <td hidden>{{ $two = $row->scoreupdatetwo->two }}</td>
                                            <td hidden>{{ $three = $row->scoreupdatethree->three }}</td>
                                            <td hidden>{{ $four = $row->scoreupdatefour->four }}</td>
                                            <td hidden>{{ $six = $row->scoreupdatesix->six }}</td>
                                            <td hidden>{{ $Balls = $row->scoreupdateballsplayed->balls_played }}</td>
                                            @php
                                                $BatterRuns = $one * 1 + $two * 2 + $three * 3 + $four * 4 + $six * 6;
                                            @endphp

                                            @if (!in_array($out_type, [null]))
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
                                            @endif

                                        </tr>
                                        @php
                                            $totalRunFirst = $totalRunFirst + $BatterRuns;
                                        @endphp
                                    @endforeach
                                </tbody>
                                {{-- <h3>{{ ___('cricket.' . $team_name_first) }}-{{ ___('cricket.' . $totalRunFirst) }}/{{ ___('cricket.' . $totalWicketsFirst) }}
                                        ({{ $totalOversFirstInnings }})</h3> --}}
                            </table>
                        </div>
                @endif
                <!--Batter First table end -->

                <!--  Bowler First table start -->
                @if ($table_numbers == 2 || $table_numbers == 3 || $table_numbers == 4)
                    {{-- <div class="card-body"> --}}
                    <div class="table-responsive">

                        <table class="table table-striped table-borderless border-bottom">
                            <thead class="thead">
                                <tr>
                                    <th class="serial"> {{ ___('cricket.bowler') }} </th>
                                    <th class="purchase">{{ ___('cricket.runs') }}</th>
                                    <th class="purchase">{{ ___('cricket.overs') }}</th>
                                    <th class="purchase">{{ ___('cricket.strick') }}</th>
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
                                        <td hidden>{{ $strick = $row->updatebowlerstrick->strick }}</td>
                                        <td hidden>{{ $maidens = $row->updatebowlermaidens->maidens }}</td>
                                        <td hidden>{{ $wickets = $row->updatebowlerwickets->wickets }}</td>
                                        <td hidden>{{ $no_balls = $row->updatebowlernoballs->no_balls }}</td>
                                        <td hidden>{{ $wides = $row->updatebowlerwides->wides }}</td>
                                        <td hidden>
                                            {{ $panalty_runs = $row->updatebowlerpanaltyruns->panalty_runs }}
                                        </td>
                                        <td>{{ ___('cricket.' . $player_name) }}</td>
                                        <td>{{ ___('cricket.' . $run) }}</td>
                                        {{-- <td>{{ ___('cricket.overs', ['overs' => number_format($overs, 1)]) }}</td> --}}
                                        {{-- @dd(['overs' => number_format($overs, 1)]) --}}
                                        <td>{{ ___('cricket.' . $overs) }}</td>
                                        <td>{{ ___('cricket.' . $strick) }}</td>
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

                <!-- Remaining batter first innings start -->

                <h3 class="card-header">{{ ___('cricket.remaining_batter') }}</h3>
                <div class="card-body">
                    <p>
                        @foreach ($batterfirsts as $key => $row)
                            @php
                                $player_name_r = $row->player->player_name;
                                $out_type_r = $row->scoreupdate->out_type;
                            @endphp

                            @if (!in_array($out_type_r, ['*', 'b', 'c', 'lbw', 'ro', 'not out', 'hw', 'h', 'o', 't', 'rh']))
                                {{ ___('cricket.' . $player_name_r) }}
                            @endif
                        @endforeach
                    </p>
                </div>

                <!-- Remaining batter first innings end -->

                <!-- Batter second table start -->

                @if ($table_numbers == 3 || $table_numbers == 4)
                    <div class="card-header">
                        <h3>{{ ___('cricket.' . $team_name_second) }}-{{ ___('cricket.' . $totalRunSecond) }}/{{ ___('cricket.' . $totalWicketsSecond) }}
                            ({{ $totalOversSecond }})</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless border-bottom">
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
                                        <td hidden>{{ $out_by_type = $row->scoreupdateoutbytype->out_by_type }}
                                        </td>
                                        <td hidden>{{ $one = $row->scoreupdateone->one }}</td>
                                        <td hidden>{{ $two = $row->scoreupdatetwo->two }}</td>
                                        <td hidden>{{ $three = $row->scoreupdatethree->three }}</td>
                                        <td hidden>{{ $four = $row->scoreupdatefour->four }}</td>
                                        <td hidden>{{ $six = $row->scoreupdatesix->six }}</td>
                                        <td hidden>{{ $Balls = $row->scoreupdateballsplayed->balls_played }}</td>
                                        @php
                                            $BatterRuns = $one * 1 + $two * 2 + $three * 3 + $four * 4 + $six * 6;
                                        @endphp

                                        @if (!in_array($out_type, [null]))
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
                                        @endif
                                    </tr>
                                    @php
                                        $totalRunSecond = $totalRunSecond + $BatterRuns;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                <!--Batter second table end -->

                <!--  Bowler Second table start -->

                @if ($table_numbers == 4)
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless border-bottom">
                            <thead class="thead">
                                <tr>
                                    <th class="serial"> {{ ___('cricket.bowler') }} </th>
                                    <th class="purchase">{{ ___('cricket.runs') }}</th>
                                    <th class="purchase">{{ ___('cricket.overs') }}</th>
                                    <th class="purchase">{{ ___('cricket.strick') }}</th>
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
                                        <td hidden>{{ $strick = $row->updatebowlerstrick->strick }}</td>
                                        <td hidden>{{ $maidens = $row->updatebowlermaidens->maidens }}</td>
                                        <td hidden>{{ $wickets = $row->updatebowlerwickets->wickets }}</td>
                                        <td hidden>{{ $no_balls = $row->updatebowlernoballs->no_balls }}</td>
                                        <td hidden>{{ $wides = $row->updatebowlerwides->wides }}</td>
                                        <td hidden>
                                            {{ $panalty_runs = $row->updatebowlerpanaltyruns->panalty_runs }}
                                        </td>

                                        <td>{{ ___('cricket.' . $player_name) }}</td>
                                        <td>{{ ___('cricket.' . $run) }}</td>
                                        <td>{{ ___('cricket.' . $overs) }}</td>
                                        <td>{{ ___('cricket.' . $strick) }}</td>
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
                @endif
                <!-- Bowler second table end -->

                <!-- Remaining batter second innings start -->

                <h3 class="card-header">{{ ___('cricket.remaining_batter') }}</h3>
                <div class="card-body">
                    <p>
                        @foreach ($batterseconds as $key => $row)
                            @php
                                $player_name_r = $row->player->player_name;
                                $out_type_r = $row->scoreupdate->out_type;
                            @endphp

                            @if (!in_array($out_type_r, ['*', 'b', 'c', 'lbw', 'ro', 'not out', 'hw', 'h', 'o', 't', 'rh']))
                                {{ ___('cricket.' . $player_name_r) }},
                            @endif
                        @endforeach
                    </p>
                </div>

                <!-- Remaining batter second innings end -->
            </div>
        </div>
    </div>


    <!-- include the Laravel Echo and Pusher JS libraries -->
    <script src="https://cdn.jsdelivr.net/npm/laravel-echo@^1.10.0/dist/echo.min.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

    <!-- initialize the Echo instance -->
    <script>
        window.Echo = new Echo({
            broadcaster: 'pusher',
            key: '{{ env('PUSHER_APP_KEY') }}',
            cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
            forceTLS: true
        });
    </script>

    <!-- subscribe to the channel and listen to events -->
    <script>
        Echo.channel('my-channel')
            .listen('MyEvent', (e) => {
                console.log(e.data); // log the event data to the console
            });
    </script>
@endsection
