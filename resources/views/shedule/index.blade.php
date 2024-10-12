@extends('layouts.publichome')
<?php
// $page = $_SERVER['PHP_SELF'];
// $sec = '5';
?>

<head>
    {{-- <meta http-equiv="refresh" content="<?php echo $sec; ?>;URL='<?php echo $page; ?>'"> --}}
</head>
@section('admin_content')
    <title>{{ ___('cricket.cricket') }}</title>
    <div class="page-content">
        <div class="card">
            <h3 class="card-header">{{ ___('cricket.live') }}</h3>
            <div class="card-body">
                <div class="slick-carousel">
                    @foreach ($match2->sortByDesc('match_datetime') as $row)
                        <div class="card">
                            <a href="{{ route('cricketMatchScoreStatus', @$row->id) }}">
                                @php
                                    $teamOne = @$row->team->team_name;
                                    $goalOne = @$row->score->goal->goal;
                                    $teamTwo = @$row->team2->team_name;
                                    $goalTwo = @$row->score->goal2->goal;
                                @endphp
                                <div class="card-body">
                                    <h6 class="card-title">
                                        <strong>{{ ___('cricket.' . $teamOne) }}</strong> {{ ___('cricket.' . $goalOne) }}
                                        - <strong>{{ ___('cricket.' . $teamTwo) }}</strong>
                                        {{ ___('cricket.' . $goalTwo) }}
                                    </h6>
                                    <p class="card-text">
                                        @php
                                            $date = $row->match_datetime;
                                        @endphp
                                        {{ ___('cricket.' . $date) }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>



            <h3 class="card-header">{{ ___('cricket.upcomming_match') }}</h3>
            <div class="card-body">
                <div class="slick-carousel">
                    @foreach ($match->sortByDesc('match_datetime') as $row)
                        <div class="card">
                            <a href="{{ route('cricketMatchScoreStatus', @$row->id) }}">
                                @php
                                    $teamOne = @$row->team->team_name;
                                    $goalOne = @$row->score->goal->goal;
                                    $teamTwo = @$row->team2->team_name;
                                    $goalTwo = @$row->score->goal2->goal;
                                @endphp
                                <div class="card-body">
                                    <h6 class="card-title">
                                        <strong>{{ ___('cricket.' . $teamOne) }}</strong> {{ ___('cricket.' . $goalOne) }}
                                        - <strong>{{ ___('cricket.' . $teamTwo) }}</strong>
                                        {{ ___('cricket.' . $goalTwo) }}
                                    </h6>
                                    <p class="card-text">
                                        @php
                                            $date = $row->match_datetime;
                                        @endphp
                                        {{ ___('cricket.' . $date) }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <h3 class="card-header">{{ ___('cricket.game_over') }}</h3>
            <div class="card-body">
                <div class="slick-carousel">
                    @foreach ($match1->sortByDesc('match_datetime') as $row)
                        <div class="card">
                            <a href="{{ route('cricketMatchScoreStatus', @$row->id) }}">
                                @php
                                    $teamOne = @$row->team->team_name;
                                    $goalOne = @$row->score->goal->goal;
                                    $teamTwo = @$row->team2->team_name;
                                    $goalTwo = @$row->score->goal2->goal;
                                @endphp
                                <div class="card-body">
                                    <h6 class="card-title">
                                        <strong>{{ ___('cricket.' . $teamOne) }}</strong> {{ ___('cricket.' . $goalOne) }}
                                        - <strong>{{ ___('cricket.' . $teamTwo) }}</strong>
                                        {{ ___('cricket.' . $goalTwo) }}
                                    </h6>
                                    <p class="card-text">
                                        @php
                                            $date = $row->match_datetime;
                                        @endphp
                                        {{ ___('cricket.' . $date) }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>


            <div id="matchData">

            </div>
        </div>
    </div>

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
@endsection
