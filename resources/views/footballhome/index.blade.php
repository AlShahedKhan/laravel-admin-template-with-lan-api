@extends('layouts.publichome')

@section('admin_content')
    <div class="page-content">

        <!-- Live start -->

        <div class="card" onload="startTime()">
            <h3 class="card-header">{{ ___('cricket.live') }}</h3>
            <input type="hidden" id="match_count" value="{{ @$match2->count() }}">
            <div class="card-body">
                <div class="slick-carousel">
                    @foreach ($match2->sortByDesc('match_datetime') as $row)
                        <div class="card">
                            <a href="{{ route('footballMatchScoreStatus', @$row->id) }}" class="text-decoration-none">
                                @php
                                    $teamOne = @$row->team->team_name;
                                    $goalOne = @$row->score->goal->goal;
                                    $teamTwo = @$row->team2->team_name;
                                    $goalTwo = @$row->score->goal2->goal;
                                    $date = Carbon\Carbon::parse($row->match_datetime)->format('d M Y h:i:s A');
                                @endphp
                                <div class="card-body">
                                    <h6 class="card-title">
                                        <strong>{{ ___('football.' . $teamOne) }}</strong> {{ ___('cricket.' . $goalOne) }}
                                        - <strong>{{ ___('football.' . $teamTwo) }}</strong> {{ ___('cricket.' . $goalTwo) }}
                                    </h6>
                                    <p class="card-text">
                                        {{ ___('football.' . $date) }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>


            <!-- Live end -->

            <!-- Upcomming match start -->

            <h3 class="card-header">{{ ___('cricket.upcomming_match') }}</h3>
            <div class="card-body">
                <div class="slick-carousel">
                    @foreach ($match->sortByDesc('match_datetime') as $row)
                        <div class="card">
                            <a href="{{ route('footballMatchScoreStatus', @$row->id) }}" class="text-decoration-none">
                                @php
                                    $teamOne = @$row->team->team_name;
                                    $goalOne = @$row->score->goal->goal;
                                    $teamTwo = @$row->team2->team_name;
                                    $goalTwo = @$row->score->goal2->goal;
                                    $date = Carbon\Carbon::parse($row->match_datetime)->format('d M Y h:i:s A');
                                @endphp
                                <div class="card-body">
                                    <h6 class="card-title">
                                        <strong>{{ ___('football.' . $teamOne) }}</strong> {{ ___('cricket.' . $goalOne) }}
                                        - <strong>{{ ___('football.' . $teamTwo) }}</strong>
                                        {{ ___('cricket.' . $goalTwo) }}
                                    </h6>
                                    <p class="card-text">
                                        {{ ___('football.' . $date) }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>


            <!-- Upcomming match end -->


            <!-- Game over start -->

            <h3 class="card-header">{{ ___('cricket.game_over') }}</h3>
            <div class="card-body">
                <div class="slick-carousel">
                    @foreach ($match1->sortByDesc('match_datetime') as $row)
                        <div class="card">
                            <a href="{{ route('footballMatchScoreStatus', @$row->id) }}" class="text-decoration-none">
                                @php
                                    $teamOne = @$row->team->team_name;
                                    $goalOne = @$row->score->goal->goal;
                                    $teamTwo = @$row->team2->team_name;
                                    $goalTwo = @$row->score->goal2->goal;
                                    $date = Carbon\Carbon::parse($row->match_datetime)->format('d M Y h:i:s A');
                                @endphp
                                <div class="card-body">
                                    <h6 class="card-title">
                                        <strong>{{ ___('football.' . $teamOne) }}</strong> {{ ___('cricket.' . $goalOne) }}
                                        - <strong>{{ ___('football.' . $teamTwo) }}</strong>
                                        {{ ___('cricket.' . $goalTwo) }}
                                    </h6>
                                    <p class="card-text">
                                        {{ ___('football.' . $date) }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>


            <!-- Game over end -->
        </div>

        <!-- Slick js start -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script>
            $(document).ready(function() {
                $('.slick-carousel').slick({
                    dots: true,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    responsive: [{
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                infinite: true,
                                dots: true
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });
            });
        </script>
        <!-- Slick js end -->
    @endsection

    @section('script')
        <script type="text/javascript">
            let match_count = $("#match_count").val();
            console.log(match_count);

            function showTime() {
                var date = new Date();
                var m = date.getMinutes(); // 0 - 59
                var s = date.getSeconds(); // 0 - 59
                m = (m < 10) ? "0" + m : m;
                s = (s < 10) ? "0" + s : s;

                var time = m + ":" + s;

                for (let index = 1; index <= match_count; index++) {

                    document.getElementById('MyClockDisplay_' + index).innerText = time;
                    document.getElementById('MyClockDisplay_' + index).textContent = time;
                }

                setTimeout(showTime, 1000);

            }

            showTime();
        </script>
    @endsection
