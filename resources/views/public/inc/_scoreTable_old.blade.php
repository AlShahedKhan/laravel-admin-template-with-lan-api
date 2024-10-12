<div class="card">
    <div class="card-header border-0">
        <div class="d-flex justify-content-between">
            <h3 class="card-title">Match Summary</h3>
            {{-- <a href="javascript:void(0);">see more</a> --}}
        </div>
    </div>
    <div class="card-body">
        <div class="d-flex">
            <p class="d-flex flex-column">
                <span class="text-bold text-lg">One Day </span>
                <span>Bangladesh vs Srilanka</span>
            </p>
            <p class="ml-auto d-flex flex-column text-right">
                <span class="text-success">
                    <i class="fas fa-arrow-up"></i> Bangabandu Cricaket Stedium
                </span>
                <span class="text-muted">Time & date: @php
                    echo now();
                @endphp  </span>
            </p>
        </div>
        <!-- /.d-flex -->

        <div class="position-relative mb-4">
            <canvas id="visitors-chart-mk" height="350"></canvas>
        </div>

        <div class="d-flex flex-row justify-content-end">
            <span class="mr-2">
                <i class="fas fa-square text-primary"></i> Bangladesh
            </span>

            <span>
                <i class="fas fa-square text-gray"></i> Srilanka
            </span>
        </div>
    </div>
</div>

<table id="matchData" class="table table-bordered table-striped table-sm">
    <thead>
        <tr>
            <th>SL</th>
            <th>Match Name</th>
            <th>Team Name</th>
            <th>Player Name</th>
            <th>One</th>
            <th>Two</th>
            <th>Three</th>
        </tr>
    </thead>
    <tbody>
        @php
            $team_name = ';'
        @endphp
        @foreach ($matchData as $item)
            <tr>
                <td>{{ $item->id}}</td>
                <td>{{ $item->match_name}}</td>
                <td>{{ $team_name = $item->team_name}}</td>
                <td>{{ $item->player_name}}</td>
                <td>{{ $item->one}}</td>
                <td>{{ $item->two}}</td>
                <td>{{ $item->three}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<table id="example1" class="table table-bordered table-striped table-sm">
    <thead>
        <tr>
            <th>SL</th>
            <th>Match Name</th>
            <th>Team Name</th>
            <th>Player Name</th>
            <th>Runs</th>
            <th>Out type</th>
            <th>Out by type</th>
            <th>One</th>
            <th>Two</th>
            <th>Three</th>
            <th>Four</th>
            <th>Six</th>
            <th>Balls</th>
            <th>Strike Rate</th>
        </tr>
    </thead>
    <tbody>
        @php
            $totalRun = 0;
        @endphp
        @foreach ($data as $key => $row)
            <tr>
                @php
                    $BatterRuns = $row->scoreupdateone->one + $row->scoreupdatetwo->two * 2 +
                                  $row->scoreupdatethree->three * 3 + $row->scoreupdatefour->four * 4 +
                                  $row->scoreupdatesix->six * 6;
                    $totalRun = $totalRun + $BatterRuns;
                @endphp
                <td>{{ $key + 1 }}</td>
                <td>{{ $row->matchh->match_name }}</td>
                <td>{{ $row->team->team_name }}</td>
                <td>{{ $row->player->player_name }}</td>
                <td>{{ $BatterRuns }}</td>
                <td>{{ $row->scoreupdate->out_type }}</td>
                <td>{{ $row->scoreupdateoutbytype->out_by_type }}</td>
                <td>{{ $row->scoreupdateone->one }}</td>
                <td>{{ $row->scoreupdatetwo->two }}</td>
                <td>{{ $row->scoreupdatethree->three }}</td>
                <td>{{ $row->scoreupdatefour->four }}</td>
                <td>{{ $row->scoreupdatesix->six }}</td>
                <td>{{ $row->scoreupdateballsplayed->balls_played }}</td>
                @php
                    $Balls = $row->scoreupdateballsplayed->balls_played;
                @endphp
                <td>
                    @if ($BatterRuns > 0 and $BatterRuns == 0)
                        {{ $BatterRuns*100 }}
                        @elseif ($Balls > 0 and $BatterRuns == 0)
                        {{ $Balls * $BatterRuns }}
                        @elseif ($Balls == 0 and $BatterRuns == 0)
                        {{ $Balls * $BatterRuns }}
                        @elseif ($Balls == 0 and $BatterRuns > 0 )
                        {{ $BatterRuns *100 }}
                        @elseif ($BatterRuns > 0 and $Balls >= 0)
                        {{ ($BatterRuns / $Balls) * 100 }}
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
    <h1>Total Runs:- {{ $totalRun }}</h1>
</table>

<table id="example1" class="table table-bordered table-striped table-sm">
    <thead>
        <tr>
            <th>SL</th>
            <th>Match Name</th>
            <th>Team Name</th>
            <th>Player Name</th>
            <th>Runs</th>
            <th>Overs</th>
            <th>Maidens</th>
            <th>Wickets</th>
            <th>No balls</th>
            <th>Wides</th>
            <th>Economy Rate</th>
            <th>Panalty runs</th>
        </tr>
    </thead>
    <tbody>
        @php
            $totalOvers = 0;
        @endphp
        @foreach ($databowlerfirst as $key => $row)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $row->matchh->match_name }}</td>
                <td>{{ $row->team->team_name }}</td>
                <td>{{ $row->player->player_name }}</td>
                <td>{{ $row->updatebowlerruns->runs }}</td>
                <td>{{ $row->updatebowlerovers->overs }}</td>
                <td>{{ $row->updatebowlermaidens->maidens }}</td>
                <td>{{ $row->updatebowlerwickets->wickets }}</td>
                <td>{{ $row->updatebowlernoballs->no_balls }}</td>
                <td>{{ $row->updatebowlerwides->wides }}</td>
                @php
                    $Runs = $row->updatebowlerruns->runs;
                    $Overs = $row->updatebowlerovers->overs;
                    $totalOvers = $totalOvers + $Overs;
                @endphp
                <td>
                    @if ($Runs == 0 and $Overs ==0)
                    {{$Runs}}
                    @elseif ($Runs > 0 and $Overs ==0)
                    {{ $Runs }}
                    @else
                    {{ $Runs / $Overs }}
                    @endif
                </td>
                <td>{{ $row->updatebowlerpanaltyruns->panalty_runs }}</td>
            </tr>
        @endforeach
    </tbody>
    <h1>Total Overs:- {{ $totalOvers }}</h1>
</table>

<table id="example1" class="table table-bordered table-striped table-sm">
    <thead>
        <tr>
            <th>SL</th>
            <th>Match Name</th>
            <th>Team Name</th>
            <th>Player Name</th>
            <th>Runs</th>
            <th>Out type</th>
            <th>Out by type</th>
            <th>One</th>
            <th>Two</th>
            <th>Three</th>
            <th>Four</th>
            <th>Six</th>
            <th>Balls</th>
            <th>Strike Rate</th>
        </tr>
    </thead>
    <tbody>
        @php
            $totalRun = 0;
        @endphp
        @foreach ($databattersecond as $key => $row)
            <tr>
                @php
                    $BatterRuns = $row->scoreupdateone->one + $row->scoreupdatetwo->two * 2 +
                                  $row->scoreupdatethree->three * 3 + $row->scoreupdatefour->four * 4 +
                                  $row->scoreupdatesix->six * 6;
                    $totalRun = $totalRun + $BatterRuns;
                @endphp
                <td>{{ $key + 1 }}</td>
                <td>{{ $row->matchh->match_name }}</td>
                <td>{{ $row->team->team_name }}</td>
                <td>{{ $row->player->player_name }}</td>
                <td>{{ $BatterRuns }}</td>
                <td>{{ $row->scoreupdate->out_type }}</td>
                <td>{{ $row->scoreupdateoutbytype->out_by_type }}</td>
                <td>{{ $row->scoreupdateone->one }}</td>
                <td>{{ $row->scoreupdatetwo->two }}</td>
                <td>{{ $row->scoreupdatethree->three }}</td>
                <td>{{ $row->scoreupdatefour->four }}</td>
                <td>{{ $row->scoreupdatesix->six }}</td>
                <td>{{ $row->scoreupdateballsplayed->balls_played }}</td>
                @php
                    $Balls = $row->scoreupdateballsplayed->balls_played;
                @endphp
                <td>
                    @if ($BatterRuns > 0 and $BatterRuns == 0)
                        {{ $BatterRuns*100 }}
                        @elseif ($Balls > 0 and $BatterRuns == 0)
                        {{ $Balls * $BatterRuns }}
                        @elseif ($Balls == 0 and $BatterRuns == 0)
                        {{ $Balls * $BatterRuns }}
                        @elseif ($Balls == 0 and $BatterRuns > 0 )
                        {{ $BatterRuns *100 }}
                        @elseif ($BatterRuns > 0 and $Balls >= 0)
                        {{ ($BatterRuns / $Balls) * 100 }}
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
    <h1>Total Runs:- {{ $totalRun }}</h1>
</table>

<table id="example1" class="table table-bordered table-striped table-sm">
    <thead>
        <tr>
            <th>SL</th>
            <th>Match Name</th>
            <th>Team Name</th>
            <th>Player Name</th>
            <th>Overs</th>
            <th>Maidens</th>
            <th>Runs</th>
            <th>Wickets</th>
            <th>No balls</th>
            <th>Wides</th>
            <th>Economy Rate</th>
            <th>Panalty runs</th>
        </tr>
    </thead>
    <tbody>
        @php
            $totalOvers = 0;
        @endphp
        @foreach ($databowlersecond as $key => $row)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $row->matchh->match_name }}</td>
                <td>{{ $row->team->team_name }}</td>
                <td>{{ $row->player->player_name }}</td>
                <td>{{ $row->updatebowlerovers->overs }}</td>
                <td>{{ $row->updatebowlermaidens->maidens }}</td>
                <td>{{ $row->updatebowlerruns->runs }}</td>
                <td>{{ $row->updatebowlerwickets->wickets }}</td>
                <td>{{ $row->updatebowlernoballs->no_balls }}</td>
                <td>{{ $row->updatebowlerwides->wides }}</td>
                @php
                    $Runs = $row->updatebowlerruns->runs;
                    $Overs = $row->updatebowlerovers->overs;
                    $totalOvers = $totalOvers + $Overs;
                @endphp
                <td>
                    @if ($Runs == 0 and $Overs ==0)
                    {{$Runs}}
                    @elseif ($Runs > 0 and $Overs ==0)
                    {{ $Runs }}
                    @else
                    {{ $Runs / $Overs }}
                    @endif
                </td>
                <td>{{ $row->updatebowlerpanaltyruns->panalty_runs }}</td>
            </tr>
        @endforeach
    </tbody>
    <h1>Total Overs:- {{ $totalOvers }}</h1>
</table>

<br>
new ----------------- demo item
<br>
<br>
<br>
<div class="card bg-light mb-3">
    <div class="card-header">
        {{ $team_name }} Innings
    </div>
    <div class="">
        <table class="table table-bordered">
            <thead class="">
                <tr>
                    <th scope="col">Batter</th>
                    <th scope="col">Description</th>
                    <th scope="col">R</th>
                    <th scope="col">B</th>
                    <th scope="col">4s</th>
                    <th scope="col">6s</th>
                    <th scope="col">SG</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead class="">
                <tr>
                    <th scope="col">Fall of Wickets</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">0-1 (Chakabva, 0.2), 47-2 (Craig Ervine, 12.1), 84-3 (Madhevere, 19.4), 151-4
                        (Innocent Kaia, 31.5), 153-5 (Milton Shumba, 33.2), 168-6 (Raza, 35.5), 176-7 (Tiripano, 36.6),
                        177-8 (Chatara, 37.6), 223-9 (Muzarabani, 48.3), 228-10 (Tanaka Chivanga, 50)</th>

                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead class="">
                <tr>
                    <th scope="col">Bowler</th>
                    <th scope="col">O</th>
                    <th scope="col">M</th>
                    <th scope="col">R</th>
                    <th scope="col">W</th>
                    <th scope="col">N</th>
                    <th scope="col">B</th>
                    <th scope="col">W</th>
                    <th scope="col">D</th>
                    <th scope="col">E</th>
                    <th scope="col">C</th>
                    <th scope="col">O</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="col">Nayeem</th>
                    <td scope="col">1</td>
                    <td scope="col">5</td>
                    <td scope="col">8</td>
                    <td scope="col">8</td>
                    <td scope="col">2</td>
                    <td scope="col">8</td>
                    <td scope="col">1</td>
                    <td scope="col">6</td>
                    <td scope="col">9</td>
                    <td scope="col">8</td>
                    <td scope="col">8</td>
                </tr>
                <tr>
                    <th scope="col">Nayeem</th>
                    <td scope="col">1</td>
                    <td scope="col">5</td>
                    <td scope="col">6</td>
                    <td scope="col">8</td>
                    <td scope="col">8</td>
                    <td scope="col">2</td>
                    <td scope="col">8</td>
                    <td scope="col">1</td>
                    <td scope="col">9</td>
                    <td scope="col">8</td>
                    <td scope="col">8</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="card bg-light mb-3">
    <div class="card-header">
        {{ $team_name }} Innings
    </div>
    <div class="">
        <table class="table table-bordered">
            <thead class="">
                <tr>
                    <th scope="col">Batter</th>
                    <th scope="col">Description</th>
                    <th scope="col">R</th>
                    <th scope="col">B</th>
                    <th scope="col">4s</th>
                    <th scope="col">6s</th>
                    <th scope="col">SG</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead class="">
                <tr>
                    <th scope="col">Fall of Wickets</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">0-1 (Chakabva, 0.2), 47-2 (Craig Ervine, 12.1), 84-3 (Madhevere, 19.4), 151-4
                        (Innocent Kaia, 31.5), 153-5 (Milton Shumba, 33.2), 168-6 (Raza, 35.5), 176-7 (Tiripano, 36.6),
                        177-8 (Chatara, 37.6), 223-9 (Muzarabani, 48.3), 228-10 (Tanaka Chivanga, 50)</th>

                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead class="">
                <tr>
                    <th scope="col">Bowler</th>
                    <th scope="col">O</th>
                    <th scope="col">M</th>
                    <th scope="col">R</th>
                    <th scope="col">W</th>
                    <th scope="col">N</th>
                    <th scope="col">B</th>
                    <th scope="col">W</th>
                    <th scope="col">D</th>
                    <th scope="col">E</th>
                    <th scope="col">C</th>
                    <th scope="col">O</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="col">Nayeem</th>
                    <td scope="col">1</td>
                    <td scope="col">5</td>
                    <td scope="col">8</td>
                    <td scope="col">8</td>
                    <td scope="col">2</td>
                    <td scope="col">8</td>
                    <td scope="col">1</td>
                    <td scope="col">6</td>
                    <td scope="col">9</td>
                    <td scope="col">8</td>
                    <td scope="col">8</td>
                </tr>
                <tr>
                    <th scope="col">Nayeem</th>
                    <td scope="col">1</td>
                    <td scope="col">5</td>
                    <td scope="col">6</td>
                    <td scope="col">8</td>
                    <td scope="col">8</td>
                    <td scope="col">2</td>
                    <td scope="col">8</td>
                    <td scope="col">1</td>
                    <td scope="col">9</td>
                    <td scope="col">8</td>
                    <td scope="col">8</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="card bg-light mb-3">
    <div class="card-header">
        Match Info
    </div>
    <div class="">
        <table class="table table-bordered">
            <tr>
                <th scope="col">Match</th>
                <td scope="col">ZIM vs AFG, 2nd ODI, Afghanistan tour of Zimbabwe, 2022</td>
            </tr>
            <tr>
                <th scope="col">Match</th>
                <td scope="col">ZIM vs AFG, 2nd ODI, Afghanistan tour of Zimbabwe, 2022</td>
            </tr>
            <tr>
                <th scope="col">Match</th>
                <td scope="col">ZIM vs AFG, 2nd ODI, Afghanistan tour of Zimbabwe, 2022</td>
            </tr>
            <tr>
                <th scope="col">Match</th>
                <td scope="col">ZIM vs AFG, 2nd ODI, Afghanistan tour of Zimbabwe, 2022</td>
            </tr>
        </table>
    </div>
</div>
<script>
    var overs = [];
    // var runs1 = [];
    // var runs2 = [];
    var overLen = 0;
    var runs11 = @json($team1 ?? '');
    var runs22 = @json($team2 ?? '');
    if(runs11.length > runs22.length){
        overLen = runs11.length+2
    }else{
        overLen = runs22.length+2
    }
    for(let i = 1; i < overLen; i++ ){
        overs.push(i);
        // runs1.push( Math.floor(Math.random() * 300) + 1);
        // runs2.push( Math.floor(Math.random() * 300) + 1);
    }
    function sortF(arr){
        var result = arr.sort(function(a, b){
            return a - b;
        });
        return result;
    }
    overs = sortF(overs);
    // runs1 = sortF(runs1);
    // runs2 = sortF(runs2);
    console.log(runs11);
        $(function () {
        'use strict'
        var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold'
        }
        var mode = 'index'
        var intersect = true
        var $visitorsChart = $('#visitors-chart-mk')
        // eslint-disable-next-line no-unused-vars
        var visitorsChart = new Chart($visitorsChart, {
            data: {
            // labels: ['18th', '20th', '22nd', '24th', '26th', '28th', '30th', '32th'],
            labels: overs,
            datasets: [{
                type: 'line',
                data: runs11,
                // data: [100, 120, 170, 167, 180, 177, 500],
                backgroundColor: 'transparent',
                borderColor: '#007bff',
                pointBorderColor: '#007bff',
                pointBackgroundColor: '#007bff',
                fill: false
                // pointHoverBackgroundColor: '#007bff',
                // pointHoverBorderColor    : '#007bff'
            },
            {
                type: 'line',
                data: runs22,
                // data: [60, 80, 70, 67, 80, 77, 450],
                backgroundColor: 'tansparent',
                borderColor: '#ced4da',
                pointBorderColor: '#ced4da',
                pointBackgroundColor: '#ced4da',
                fill: false
                // pointHoverBackgroundColor: '#ced4da',
                // pointHoverBorderColor    : '#ced4da'
            }]
            },
            options: {
            maintainAspectRatio: false,
            tooltips: {
                mode: mode,
                intersect: intersect
            },
            hover: {
                mode: mode,
                intersect: intersect
            },
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                // display: false,
                gridLines: {
                    display: true,
                    lineWidth: '4px',
                    color: 'rgba(0, 0, 0, .2)',
                    zeroLineColor: 'transparent'
                },
                ticks: $.extend({
                    beginAtZero: true,
                    suggestedMax: 200
                }, ticksStyle)
                }],
                xAxes: [{
                display: true,
                gridLines: {
                    display: false
                },
                ticks: ticksStyle
                }]
            }
            }
        })
        })
</script>
