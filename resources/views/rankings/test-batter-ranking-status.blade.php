@extends('layouts.publichome')

@section('admin_content')
    <div class="page-content">
        {{-- bradecrumb Area S t a r t --}}
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <title>{{ ___('cricket.man_test_batter_ranking') }}</title>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">{{ ___('cricket.man_test_batter_ranking') }}</li>
                    </ol>
                </div>
            </div>
        </div>
        {{-- bradecrumb Area E n d --}}

        <!--  table content start -->
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered role-table" id="example1">
                            <thead class="thead">
                                <tr>
                                    <th class="serial"> {{ ___('cricket.sl') }} </th>
                                    <th class="purchase">{{ ___('cricket.team_name') }} </th>
                                    <th class="purchase">{{ ___('cricket.player_name') }}</th>
                                    <th class="purchase">{{ ___('cricket.points') }} </th>
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @php
                                    $counter = 1;
                                @endphp

                                @foreach ($data['rankings']->sortByDesc(function ($row) {
            return $row->test_batter_points->points;
        }) as $row)
                                    @if ($row->man_women->man_women == 'm')
                                        @php
                                            $teamName = $row->team->team_name;
                                            $playerName = $row->player->player_name;
                                            $points = $row->test_batter_points->points;
                                        @endphp

                                        <tr>
                                            <td>{{ ___('cricket.' . $counter) }}</td>
                                            <td>{{ ___('cricket.' . $teamName) }}</td>
                                            <td>{{ ___('cricket.' . $playerName) }}</td>
                                            <td>{{ ___('cricket.' . $points) }}</td>
                                        </tr>
                                        @php
                                            $counter++;
                                        @endphp
                                    @endif
                                @endforeach
                            </tbody>
                            <br>
                        </table>
                    </div>
                    <!--  table end -->
                </div>
            </div>
        </div>
        <!--  table content end -->

    </div>
@endsection
