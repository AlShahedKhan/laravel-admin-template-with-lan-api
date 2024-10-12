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
                <span>{{ $curves[0]->matchh->match_name }}</span>
            </p>
            <p class="ml-auto d-flex flex-column text-right">
                <span class="text-success">
                    <i class="fas fa-arrow-up"></i> Bangabandu Cricaket Stedium
                </span>
                <span class="text-muted">Time & date: @php
                    echo now();
                @endphp </span>
            </p>
        </div>
        <!-- /.d-flex -->

        <div class="position-relative mb-4">
            <canvas id="visitors-chart-mk" height="350"></canvas>
        </div>

        <div class="d-flex flex-row justify-content-end">
            <span class="mr-2">
                <i class="fas fa-square text-primary"></i> {{ $curves[0]->team->team_name }}
            </span>

            <span>
                <i class="fas fa-square text-gray"></i> {{ $curves[1]->team->team_name }}
            </span>
        </div>
    </div>
</div>
<script>
    var overs = [];
    // var runs1 = [];
    // var runs2 = [];
    var overLen = 0;
    var runs11 = @json($team1 ?? '');
    var runs22 = @json($team2 ?? '');
    if (runs11.length > runs22.length) {
        overLen = runs11.length + 2
    } else {
        overLen = runs22.length + 2
    }
    for (let i = 1; i < overLen; i++) {
        overs.push(i);
        // runs1.push( Math.floor(Math.random() * 300) + 1);
        // runs2.push( Math.floor(Math.random() * 300) + 1);
    }

    function sortF(arr) {
        var result = arr.sort(function(a, b) {
            return a - b;
        });
        return result;
    }
    overs = sortF(overs);
    // runs1 = sortF(runs1);
    // runs2 = sortF(runs2);
    console.log(runs11);
    $(function() {
        'use strict'
        var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold'
        }
        var mode = 'index'
        var intersect = true
        var $visitorsChart = $('#visitors-chart-mk')
        var visitorsChart = new Chart($visitorsChart, {
            data: {
                labels: ['18th', '20th', '22nd', '24th', '26th', '28th', '30th', '32th'],
                labels: overs,
                datasets: [{
                        type: 'line',
                        data: runs11,
                        data: [100, 120, 170, 167, 180, 177, 500],
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
                        data: [60, 80, 70, 67, 80, 77, 450],
                        backgroundColor: 'tansparent',
                        borderColor: '#ced4da',
                        pointBorderColor: '#ced4da',
                        pointBackgroundColor: '#ced4da',
                        fill: false
                        // pointHoverBackgroundColor: '#ced4da',
                        // pointHoverBorderColor    : '#ced4da'
                    }
                ]
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
