@extends('layouts.publichome')

@section('admin_content')
    <div class="page-content">

        {{-- bradecrumb Area S t a r t --}}
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    {{-- <h4 class="bradecrumb-title mb-1">{{ $data['title'] }}</h1> --}}

                    <title>{{ ___('football.football_teams_women_rankings') }}</title>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">{{ ___('football.football_teams_women_rankings') }}</li>
                    </ol>
                </div>
            </div>
        </div>
        {{-- bradecrumb Area E n d --}}

        <!--  table content start -->
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ ___('football.football_teams_women_rankings') }}</h4>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered role-table" id="example1">
                            <thead class="thead">
                                <tr>
                                    <th class="serial"> {{ ___('cricket.ranking') }} </th>
                                    <th class="purchase">{{ ___('cricket.team_name') }} </th>
                                    <th class="purchase">{{ ___('cricket.points') }} </th>

                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @php
                                    $counter = 1;
                                @endphp
                                @foreach ($data as $key => $row)
                                    @php
                                        $teamName = $row->team_name;
                                        $points = $row->women_team_points;
                                    @endphp
                                    <tr>
                                        <td class="serial">{{ ___('cricket.' . $counter) }}</td>
                                        <td>{{ ___('football.' . $teamName) }}</td>
                                        <td>{{ ___('cricket.' . $points) }}</td>
                                    </tr>
                                    @php
                                        $counter++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!--  table end -->
                    <!--  pagination start -->

                    <div class="ot-pagination pagination-content d-flex justify-content-end align-content-center py-3">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-between">
                                {{-- {!!$data['roles']->links() !!} --}}
                            </ul>
                        </nav>
                    </div>

                    <!--  pagination end -->
                </div>
            </div>
        </div>
        <!--  table content end -->

    </div>
@endsection
