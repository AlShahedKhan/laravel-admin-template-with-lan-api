@extends('layouts.admin')

@section('admin_content')
    <div class="page-content">
        {{-- bradecrumb Area S t a r t --}}
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <title>{{ ___('cricket.bowler_first') }}</title>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ ___('cricket.home') }}</a></li>
                        <li class="breadcrumb-item">{{ ___('cricket.bowler_first') }}</li>
                    </ol>
                </div>
            </div>
        </div>
        {{-- bradecrumb Area E n d --}}

        <!--  table content start -->
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ ___('cricket.bowler_first') }}</h4>
                    @if (hasPermission('scorebowlerfirst_create'))
                        <a href="" class="btn btn-lg ot-btn-primary btn-right" data-toggle="modal"
                            data-target="#teamModal">
                            <span><i class="fa-solid fa-plus"></i> </span>
                            <span class="">{{ ___('cricket.add_bowler') }}</span>
                        </a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered role-table" id="example1">
                            <thead class="thead">
                                <tr>
                                    <th class="serial"> {{ ___('cricket.sl') }} </th>
                                    <th class="purchase">{{ ___('cricket.series_name') }} </th>
                                    <th class="purchase">{{ ___('cricket.match_name') }} </th>
                                    <th class="purchase">{{ ___('cricket.team_name') }} </th>
                                    <th class="purchase">{{ ___('cricket.player_name') }}</th>
                                    <th class="purchase">{{ ___('cricket.runs') }} </th>
                                    <th class="purchase">{{ ___('cricket.overs') }}</th>
                                    <th class="purchase">{{ ___('cricket.Striker') }}</th>
                                    <th class="purchase">{{ ___('cricket.maidens') }}</th>
                                    <th class="purchase">{{ ___('cricket.wickets') }}</th>
                                    <th class="purchase">{{ ___('cricket.no_balls') }}</th>
                                    <th class="purchase">{{ ___('cricket.wides') }}</th>
                                    <th class="purchase">{{ ___('cricket.economy_rate') }}</th>
                                    <th class="purchase">{{ ___('cricket.panalty_runs') }}</th>
                                    @if (hasPermission('scorebowlerfirst_update') || hasPermission('scorebowlerfirst_delete'))
                                        <th class="action">{{ ___('cricket.action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @php
                                    $totalOvers = 0;
                                    $mkData = [];
                                @endphp
                                
                                @foreach ($data['scorebowlerfirst'] as $key => $row)
                                    <tr>
                                        @php
                                            $Runs = $row->updatebowlerruns->runs;
                                            $Overs = $row->updatebowlerovers->overs;
                                            $totalOvers = $totalOvers + $Overs;
                                            if ($mkData) {
                                                if (isset($mkData[$row->matchh->match_name])) {
                                                    if (isset($mkData[$row->matchh->match_name][$row->team->team_name])) {
                                                        // $mkData[$row->matchh->match_name][$row->team->team_name] = $mkData[$row->matchh->match_name][$row->team->team_name] + $BatterRuns;
                                                        $mkData[$row->matchh->match_name][$row->team->team_name] = [
                                                            'runs' => $mkData[$row->matchh->match_name][$row->team->team_name]['runs'] + $Runs,
                                                            'overs' => $mkData[$row->matchh->match_name][$row->team->team_name]['overs'] + $Overs,
                                                            'wickets' => $mkData[$row->matchh->match_name][$row->team->team_name]['wickets'] + $row->updatebowlerwickets->wickets,
                                                        ];
                                                    } else {
                                                        $mkData[$row->matchh->match_name][$row->team->team_name] = [
                                                            'runs' => $Runs,
                                                            'overs' => $Overs,
                                                            'wickets' => $row->updatebowlerwickets->wickets,
                                                        ];
                                                    }
                                                } else {
                                                    $mkData[$row->matchh->match_name] = [
                                                        $row->team->team_name => [
                                                            'runs' => $Runs,
                                                            'overs' => $Overs,
                                                            'wickets' => $row->updatebowlerwickets->wickets,
                                                        ],
                                                    ];
                                                }
                                            } else {
                                                $mkData[$row->matchh->match_name] = [
                                                    $row->team->team_name => [
                                                        'runs' => $Runs,
                                                        'overs' => $Overs,
                                                        'wickets' => $row->updatebowlerwickets->wickets,
                                                    ],
                                                ];
                                            }
                                        @endphp
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ @$row->series->series_name }}</td>
                                        <td>{{ @$row->matchh->team->team_name }} - {{ @$row->matchh->team2->team_name }}
                                        </td>
                                        <td>{{ $row->team->team_name }}</td>
                                        <td>{{ $row->player->player_name }}</td>
                                        <td>{{ $row->updatebowlerruns->runs }}</td>
                                        <td>{{ $row->updatebowlerovers->overs }}</td>
                                        <td>{{ $row->updatebowlerstrick->strick }}</td>
                                        <td>{{ $row->updatebowlermaidens->maidens }}</td>
                                        <td>{{ $row->updatebowlerwickets->wickets }}</td>
                                        <td>{{ $row->updatebowlernoballs->no_balls }}</td>
                                        <td>{{ $row->updatebowlerwides->wides }}</td>
                                        <td>
                                            @if ($Runs == 0 and $Overs == 0)
                                                {{ $Runs }}
                                            @elseif ($Runs > 0 and $Overs == 0)
                                                {{ $Runs }}
                                            @else
                                                {{ $Runs / $Overs }}
                                            @endif
                                        </td>
                                        <td>{{ $row->updatebowlerpanaltyruns->panalty_runs }}</td>
                                        @if (hasPermission('scorebowlerfirst_update') || hasPermission('scorebowlerfirst_delete'))
                                            <td>
                                                @if (hasPermission('scorebowlerfirst_update'))
                                                    <a class="btn btn-info btn-sm" href="javascript:void(0)" title="Edit"
                                                        onclick="editPost({{ $row->id }})" data-toggle="modal"
                                                        data-target="#editModal"><i class="fas fa-edit"></i></a>
                                                @endif
                                                @if (hasPermission('scorebowlerfirst_delete'))
                                                    <a href="{{ route('scorebowlerfirst.delete', $row->id) }}"
                                                        class="btn btn-danger btn-sm" id="delete">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                            @foreach ($mkData as $key => $item)
                                <h3>{{ $key }}</h3>
                                @foreach ($item as $keys => $items)
                                    {{ $keys . ': ' . $items['runs'] . '/' . $items['wickets'] . ' by ' . $items['overs'] . ' Overs' }}
                                    <br>
                                @endforeach
                            @endforeach
                            <br>
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

    {{-- team insert modal --}}
    <!-- Modal -->
    <div class="modal fade" id="teamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Bowler First Score</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="close_button">&times;</span>
                    </button>
                </div>
                <form action="{{ route('scorebowlerfirst.store') }}" method="Post" class="score_add_form">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="row mb-3">
                                <div class="col-sm-6 mb-3">
                                    <label for="series name">{{ ___('cricket.series_name') }}</label>
                                    <select class="form-control" name="series_id" id="series_id" required="">
                                        <option value="">--{{ ___('cricket.select_option') }}--</option>
                                        @foreach ($data['series'] as $row)
                                            <option value="{{ $row->id }}">{{ $row->series_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="player_name">{{ ___('cricket.match_name') }}</label>
                                    <select class="form-control" name="match_id" id="match_id" required="">
                                        <option value="">--{{ ___('cricket.select_option') }}--</option>
                                        @foreach ($data['match'] as $row)
                                            <option value="{{ $row->id }}">{{ @$row->team->team_name }} -
                                                {{ @$row->team2->team_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="player_name">{{ ___('cricket.team_name') }}</label>
                                    <select class="form-control" name="team_id" id="team_id" required="">
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="player_name">{{ ___('cricket.player_name') }}</label>
                                    <select class="form-control" name="player_id" id="player_id" required="">
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="overs">{{ ___('cricket.overs') }}</label>
                                    <select class="form-control" name="overs_id" required="">
                                        @foreach ($data['updatebowler'] as $row)
                                            <option value="{{ $row->id }}">{{ $row->overs }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="strick">{{ ___('cricket.strick') }}</label>
                                    <select class="form-control" name="strick_id" required="">
                                        @foreach ($data['updatebowler'] as $row)
                                            <option value="{{ $row->id }}">{{ $row->strick }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="maidens">{{ ___('cricket.maidens') }}</label>
                                    <select class="form-control" name="maidens_id" required="">
                                        @foreach ($data['updatebowler'] as $row)
                                            <option value="{{ $row->id }}">{{ $row->maidens }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="runs">{{ ___('cricket.runs') }}</label>
                                    <select class="form-control" name="runs_id" required="">
                                        @foreach ($data['updatebowler'] as $row)
                                            <option value="{{ $row->id }}">{{ $row->runs }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="wickets">{{ ___('cricket.wickets') }}</label>
                                    <select class="form-control" name="wickets_id" required="">
                                        @foreach ($data['updatebowler'] as $row)
                                            <option value="{{ $row->id }}">{{ $row->wickets }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="no balls">{{ ___('cricket.no_balls') }}</label>
                                    <select class="form-control" name="no_balls_id" required="">
                                        @foreach ($data['updatebowler'] as $row)
                                            <option value="{{ $row->id }}">{{ $row->no_balls }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="wides">{{ ___('cricket.wides') }}</label>
                                    <select class="form-control" name="wides_id" required="">
                                        @foreach ($data['updatebowler'] as $row)
                                            <option value="{{ $row->id }}">{{ $row->wides }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="panalty_runs">{{ ___('cricket.panalty_runs') }}</label>
                                    <select class="form-control" name="panalty_runs_id" required="">
                                        @foreach ($data['updatebowler'] as $row)
                                            <option value="{{ $row->id }}">{{ $row->panalty_runs }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger"
                                    data-dismiss="modal">{{ ___('common.close') }}</button>
                                <button type="Submit" class="btn btn-primary">{{ ___('common.submit') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ ___('cricket.update_score_bowler_first') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="close_button">&times;</span>
                    </button>
                </div>
                <div id="modal_body">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript">
        function editPost(id) {
            let _url = `scorebowlerfirst/edit/${id}`;

            $.ajax({
                url: _url,
                type: "GET",
                success: function(data) {
                    $("#modal_body").html(data);

                }
            });
        }



        $('form.score_add_form #match_id').on('change', function(e) {
            console.log('yes');
            e.preventDefault();

            var formData = {
                id: $(this).val()
            }

            $.ajax({
                type: "GET",
                dataType: 'html',
                data: formData,
                async: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route('getTeamListScorebowlerfirst') }}',
                success: function(data) {
                    $('form.score_add_form #team_id').html(data);

                    $('form.score_add_form #player_id').html(
                        '<option  value="">Select Player</option>');
                },
                error: function(data) {}
            });
        });

        $('form.score_add_form #team_id').on('change', function(e) {
            console.log('yes');
            e.preventDefault();

            var formData = {
                id: $(this).val()
            }

            $.ajax({
                type: "GET",
                dataType: 'html',
                data: formData,
                async: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route('getPlayerListScorebowlerfirst') }}',
                success: function(data) {
                    $('form.score_add_form #player_id').html(data);
                },
                error: function(data) {}
            });
        });
    </script>
@endsection
