@extends('layouts.publichome')

@section('admin_content')
    <div class="page-content">
        {{-- bradecrumb Area S t a r t --}}
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <title>{{ ___('cricket.woman_ranking_status') }}</title>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">{{ ___('cricket.woman_ranking_status') }}</li>
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
                                    <th class="serial"> {{ ___('cricket.ranking') }} </th>
                                    <th class="purchase">{{ ___('cricket.team_name') }} </th>
                                    <th class="purchase">{{ ___('cricket.player_name') }} </th>
                                    <th class="purchase">{{ ___('cricket.points') }} </th>
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @php
                                    $counter = 1;
                                @endphp
                                @foreach ($data['rankings']->sortByDesc(function ($row) {
            return $row->WomanPoints->points;
        }) as $row)
                                    @if ($row->man_women->man_women == 'w')
                                        @php
                                            $teamName = $row->team->team_name;
                                            $playerName = $row->player->player_name;
                                            $points = $row->WomanPoints->points;
                                        @endphp
                                        <tr>
                                            <td>{{ ___('cricket.' . $counter) }}</td>
                                            <td>{{ ___('football.' . $teamName) }}</td>
                                            <td>{{ ___('cricket.' . $playerName) }}</td>
                                            <td>{{ ___('cricket.' . $points) }}</td>
                                            @php
                                                $counter++;
                                            @endphp
                                        </tr>
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
