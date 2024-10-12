<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="refresh" content="10" > <!-- Atuo refresh code -->
</head>

<body>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                aria-controls="nav-home" aria-selected="true">Commentry</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                aria-controls="nav-profile" aria-selected="false">Full Score</a>
            <a onclick="GraphScore({{ count($curves) != 0 ? $curves[0]->match_id : '' }})" class="nav-item nav-link"
                id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact"
                aria-selected="false">Match Graph</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <br>
            @foreach ($commentries as $commentry)
                <p><strong>{{ $commentry->player->player_name }} </strong>({{ $commentry->player2->player_name }}):
                    {{ $commentry->CommentryCreateDetails->details }}</p>
            @endforeach
        </div>
        <div class="tab-pane fade card-body" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            {{-- Batter First Table --}}
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr class="noBorder">
                            <th>বেটার</th>
                            <th></th>
                            <th></th>
                            <th>রান</th>
                            <th>১</th>
                            <th>২</th>
                            <th>৩</th>
                            <th>৪</th>
                            <th>৬</th>
                            <th>বল</th>
                            <th>স্ট্রাইক রেট</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalRun = 0;
                            $EN = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
                            $BN = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
                        @endphp
                        @foreach ($data as $key => $row)
                            <tr class="noBorder">
                                @php
                                    $BatterRuns = $row->scoreupdateone->one + $row->scoreupdatetwo->two * 2 + $row->scoreupdatethree->three * 3 + $row->scoreupdatefour->four * 4 + $row->scoreupdatesix->six * 6;
                                    $totalRun = $totalRun + $BatterRuns;
                                @endphp
                                <td hidden>{{ $team = $row->team->team_name }}</td>
                                <td>{{ $row->player->player_name }}</td>
                                <td>{{ $row->scoreupdate->out_type }}</td>
                                <td>{{ $row->scoreupdateoutbytype->out_by_type }}</td>
                                <td> {{ str_replace($EN, $BN, "$BatterRuns") }}</td>
                                <td hidden>{{ $one = $row->scoreupdateone->one }}</td>
                                <td> {{ str_replace($EN, $BN, "$one") }}</td>
                                <td hidden>{{ $two = $row->scoreupdatetwo->two }}</td>
                                <td> {{ str_replace($EN, $BN, "$two") }}</td>
                                {{-- <td>{{ $row->scoreupdatethree->three }}</td> --}}
                                <td hidden>{{ $three = $row->scoreupdatethree->three }}</td>
                                <td> {{ str_replace($EN, $BN, "$three") }}</td>
                                {{-- <td>{{ $row->scoreupdatefour->four }}</td> --}}
                                <td hidden>{{ $four = $row->scoreupdatefour->four }}</td>
                                <td> {{ str_replace($EN, $BN, "$four") }}</td>
                                {{-- <td>{{ $row->scoreupdatesix->six }}</td> --}}
                                <td hidden>{{ $six = $row->scoreupdatesix->six }}</td>
                                <td> {{ str_replace($EN, $BN, "$six") }}</td>
                                {{-- <td>{{ $row->scoreupdateballsplayed->balls_played }}</td> --}}
                                <td hidden>{{ $balls_played = $row->scoreupdateballsplayed->balls_played }}</td>
                                <td> {{ str_replace($EN, $BN, "$balls_played") }}</td>
                                @php
                                    $Balls = $row->scoreupdateballsplayed->balls_played;
                                @endphp
                                <td>
                                    @if ($BatterRuns > 0 and $BatterRuns == 0)
                                        {{-- {{ $BatterRuns*100 }} --}}
                                        {{ str_replace($EN, $BN, "$BatterRuns" * 100) }}
                                    @elseif ($Balls > 0 and $BatterRuns == 0)
                                        {{-- {{ $Balls * $BatterRuns }} --}}
                                        {{ str_replace($EN, $BN, "$Balls" * "$BatterRuns") }}
                                    @elseif ($Balls == 0 and $BatterRuns == 0)
                                        {{-- {{ $Balls * $BatterRuns }} --}}
                                        {{ str_replace($EN, $BN, "$Balls" * "$BatterRuns") }}
                                    @elseif ($Balls == 0 and $BatterRuns > 0)
                                        {{-- {{ $BatterRuns *100 }} --}}
                                        {{ str_replace($EN, $BN, "$BatterRuns" * 100) }}
                                    @elseif ($BatterRuns > 0 and $Balls >= 0)
                                        {{-- {{ ($BatterRuns / $Balls) * 100 }} --}}
                                        {{ str_replace($EN, $BN, ("$BatterRuns" / "$Balls") * 100) }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                    <thead>
                        <tr class="noBorder">
                            <th>বলার</th>
                            <th>রান</th>
                            <th>ওভার</th>
                            <th>মেডেইন</th>
                            <th>উইকেট</th>
                            <th>নো-বল</th>
                            <th>ওয়াইড</th>
                            <th>ইকোনমি</th>
                            <th>পেনাল্টি রান</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalOvers = 0;
                        @endphp
                        @foreach ($databowlerfirst as $key => $row)
                            <tr class="noBorder">
                                {{-- <td>{{ $key + 1 }}</td>
                            <td>{{ $row->matchh->match_name }}</td>
                            <td>{{ $row->team->team_name }}</td> --}}
                                <td>{{ $row->player->player_name }}</td>
                                {{-- <td>{{ $row->updatebowlerruns->runs }}</td> --}}
                                <td hidden>{{ $run = $row->updatebowlerruns->runs }}</td>
                                <td> {{ str_replace($EN, $BN, "$run") }}</td>
                                {{-- <td>{{ $row->updatebowlerovers->overs }}</td> --}}
                                <td hidden>{{ $overs = $row->updatebowlerovers->overs }}</td>
                                <td>{{ str_replace($EN, $BN, "$overs") }}</td>
                                <td hidden>{{ $maidens = $row->updatebowlermaidens->maidens }}</td>
                                <td>{{ str_replace($EN, $BN, "$maidens") }}</td>
                                <td hidden>{{ $wickets = $row->updatebowlerwickets->wickets }}</td>
                                <td>{{ str_replace($EN, $BN, "$wickets") }}</td>
                                <td hidden>{{ $no_balls = $row->updatebowlernoballs->no_balls }}</td>
                                <td>{{ str_replace($EN, $BN, "$no_balls") }}</td>
                                <td hidden>{{ $wides = $row->updatebowlerwides->wides }}</td>
                                <td>{{ str_replace($EN, $BN, "$wides") }}</td>
                                @php
                                    $Runs = $row->updatebowlerruns->runs;
                                    $Overs = $row->updatebowlerovers->overs;
                                    $totalOvers = $totalOvers + $Overs;
                                @endphp
                                <td>
                                    @if ($Runs == 0 and $Overs == 0)
                                        {{-- {{$Runs}} --}}
                                        {{ str_replace($EN, $BN, "$Runs") }}
                                    @elseif ($Runs > 0 and $Overs == 0)
                                        {{ str_replace($EN, $BN, "$Runs") }}
                                    @else
                                        {{-- {{ $Runs / $Overs }} --}}
                                        {{ str_replace($EN, $BN, "$Runs" / "$Overs") }}
                                    @endif
                                </td>
                                <td hidden>{{ $panalty_runs = $row->updatebowlerpanaltyruns->panalty_runs }}</td>
                                <td>{{ str_replace($EN, $BN, "$panalty_runs") }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <br>
                    <p><strong><i>{{ $team }}:-{{ str_replace($EN, $BN, "$totalRun") }}-{{ @$wickets }}
                                ({{ str_replace($EN, $BN, "$totalOvers") }} ওভার)</i></strong></p>
                    <style>
                        tr.noBorder td {
                            border: 0;
                        }

                        tr.noBorder th {
                            border: 0;
                        }
                    </style>
                </table>
            </div>

            <table id="example1" class="table table-bordered table-striped table-sm">
                <thead>
                    <tr class="noBorder">
                        <th>বেটার</th>
                        <th>রান</th>
                        <th>.</th>
                        <th>.</th>
                        <th>১</th>
                        <th>২</th>
                        <th>৩</th>
                        <th>৪</th>
                        <th>৬</th>
                        <th>বল</th>
                        <th>স্ট্রাইক রেট</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalRun = 0;
                    @endphp
                    @foreach ($databattersecond as $key => $row)
                        <tr class="noBorder">
                            @php
                                $BatterRuns = $row->scoreupdateone->one + $row->scoreupdatetwo->two * 2 + $row->scoreupdatethree->three * 3 + $row->scoreupdatefour->four * 4 + $row->scoreupdatesix->six * 6;
                                $totalRun = $totalRun + $BatterRuns;
                            @endphp
                            <td hidden>{{ $team = $row->team->team_name }}</td>
                            <td>{{ $row->player->player_name }}</td>
                            <td> {{ str_replace($EN, $BN, "$BatterRuns") }}</td>
                            <td>{{ $row->scoreupdate->out_type }}</td>
                            <td>{{ $row->scoreupdateoutbytype->out_by_type }}</td>
                            <td hidden>{{ $one = $row->scoreupdateone->one }}</td>
                            <td> {{ str_replace($EN, $BN, "$one") }}</td>
                            <td hidden>{{ $two = $row->scoreupdatetwo->two }}</td>
                            <td> {{ str_replace($EN, $BN, "$two") }}</td>
                            <td hidden>{{ $three = $row->scoreupdatethree->three }}</td>
                            <td> {{ str_replace($EN, $BN, "$three") }}</td>
                            <td hidden>{{ $four = $row->scoreupdatefour->four }}</td>
                            <td> {{ str_replace($EN, $BN, "$four") }}</td>
                            <td hidden>{{ $six = $row->scoreupdatesix->six }}</td>
                            <td> {{ str_replace($EN, $BN, "$six") }}</td>
                            <td hidden>{{ $balls_played = $row->scoreupdateballsplayed->balls_played }}</td>
                            <td> {{ str_replace($EN, $BN, "$balls_played") }}</td>
                            @php
                                $Balls = $row->scoreupdateballsplayed->balls_played;
                            @endphp
                            <td>
                                @if ($BatterRuns > 0 and $BatterRuns == 0)
                                    {{ str_replace($EN, $BN, "$BatterRuns" * 100) }}
                                @elseif ($Balls > 0 and $BatterRuns == 0)
                                    {{ str_replace($EN, $BN, "$Balls" * "$BatterRuns") }}
                                @elseif ($Balls == 0 and $BatterRuns == 0)
                                    {{ str_replace($EN, $BN, "$Balls" * "$BatterRuns") }}
                                @elseif ($Balls == 0 and $BatterRuns > 0)
                                    {{ str_replace($EN, $BN, "$BatterRuns" * 100) }}
                                @elseif ($BatterRuns > 0 and $Balls >= 0)
                                    {{ str_replace($EN, $BN, ("$BatterRuns" / "$Balls") * 100) }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>



                <thead>
                    <tr class="noBorder">
                        <th>বলার</th>
                        <th>রান</th>
                        <th>ওভার</th>
                        <th>মেডেইন</th>
                        <th>উইকেট</th>
                        <th>নো-বল</th>
                        <th>ওয়াইড</th>
                        <th>ইকোনমি</th>
                        <th>পেনাল্টি রান</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalOvers = 0;
                    @endphp
                    @foreach ($databowlersecond as $key => $row)
                        <tr class="noBorder">
                            {{-- <td>{{ $key + 1 }}</td>
                            <td>{{ $row->matchh->match_name }}</td>
                            <td>{{ $row->team->team_name }}</td> --}}
                            <td>{{ $row->player->player_name }}</td>
                            <td hidden>{{ $run = $row->updatebowlerruns->runs }}</td>
                            <td> {{ str_replace($EN, $BN, "$run") }}</td>
                            <td hidden>{{ $overs = $row->updatebowlerovers->overs }}</td>
                            <td>{{ str_replace($EN, $BN, "$overs") }}</td>
                            <td hidden>{{ $maidens = $row->updatebowlermaidens->maidens }}</td>
                            <td>{{ str_replace($EN, $BN, "$maidens") }}</td>
                            <td hidden>{{ $wickets = $row->updatebowlerwickets->wickets }}</td>
                            <td>{{ str_replace($EN, $BN, "$wickets") }}</td>
                            <td hidden>{{ $no_balls = $row->updatebowlernoballs->no_balls }}</td>
                            <td>{{ str_replace($EN, $BN, "$no_balls") }}</td>
                            <td hidden>{{ $wides = $row->updatebowlerwides->wides }}</td>
                            <td>{{ str_replace($EN, $BN, "$wides") }}</td>
                            @php
                                $Runs = $row->updatebowlerruns->runs;
                                $Overs = $row->updatebowlerovers->overs;
                                $totalOvers = $totalOvers + $Overs;
                            @endphp
                            <td>
                                @if ($Runs == 0 and $Overs == 0)
                                    {{ str_replace($EN, $BN, "$Runs") }}
                                @elseif ($Runs > 0 and $Overs == 0)
                                    {{ str_replace($EN, $BN, "$Runs") }}
                                @else
                                    {{ str_replace($EN, $BN, "$Runs" / "$Overs") }}
                                @endif
                            </td>
                            <td hidden>{{ $panalty_runs = $row->updatebowlerpanaltyruns->panalty_runs }}</td>
                            <td>{{ str_replace($EN, $BN, "$panalty_runs") }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <br>
                <p><strong><i>{{ $team }}:-{{ str_replace($EN, $BN, "$totalRun") }}-{{ @$wickets }}
                            ({{ str_replace($EN, $BN, "$totalOvers") }} ওভার)</i></strong></p>
                <style>
                    tr.noBorder td {
                        border: 0;
                    }

                    tr.noBorder th {
                        border: 0;
                    }
                </style>
            </table>
        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div id="GraphScore"></div>
        </div>
    </div>
</body>

</html>
