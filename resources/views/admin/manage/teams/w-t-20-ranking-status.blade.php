@extends('layouts.publichome')

@section('admin_content')
    <div class="page-content">

        {{-- bradecrumb Area S t a r t --}}
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <title>{{ ___('cricket.women_t_20_teams_ranking') }}</title>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">{{ ___('cricket.women_t_20_teams_ranking') }}</li>
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
                                    <th class="purchase">{{ ___('cricket.points') }} </th>
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @php $counter = 1; @endphp
                                @foreach ($data->sortByDesc('w_t_20_ranking') as $row)
                                    @php
                                        $teamName = $row->team_name;
                                        $ranking = $row->w_t_20_ranking;
                                    @endphp
                                    <tr>
                                        <td class="serial">{{ ___('cricket.' . $counter) }}</td>
                                        <td>{{ ___('cricket.' . $teamName) }}</td>
                                        <td>{{ ___('cricket.' . $ranking) }}</td>
                                    </tr>
                                    @php $counter++; @endphp
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <!--  table end -->
                </div>
            </div>
        </div>
        <!--  table content end -->
    </div>
@endsection
