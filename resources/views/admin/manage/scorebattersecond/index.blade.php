@extends('layouts.admin')

@section('admin_content')
    <div class="page-content">
        {{-- bradecrumb Area S t a r t --}}
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <title>{{ ___('cricket.batter_second') }}</title>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ ___('cricket.home') }}</a></li>
                        <li class="breadcrumb-item">{{ ___('cricket.batter_second') }}</li>
                    </ol>
                </div>
            </div>
        </div>
        {{-- bradecrumb Area E n d --}}

        <!--  table content start -->
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ ___('cricket.batter_second') }}</h4>
                    @if (hasPermission('scorebattersecond_create'))
                        <a href="" class="btn btn-lg ot-btn-primary btn-right" data-toggle="modal"
                            data-target="#teamModal">
                            <span><i class="fa-solid fa-plus"></i> </span>
                            <span class="">{{ ___('cricket.add_batter') }}</span>
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
                                    <th class="purchase">{{ ___('cricket.out_type') }} </th>
                                    <th class="purchase">{{ ___('cricket.out_by_type') }} </th>
                                    <th class="purchase">{{ ___('cricket.one') }} </th>
                                    <th class="purchase">{{ ___('cricket.two') }}</th>
                                    <th class="purchase">{{ ___('cricket.three') }}</th>
                                    <th class="purchase">{{ ___('cricket.four') }}</th>
                                    <th class="purchase">{{ ___('cricket.six') }}</th>
                                    <th class="purchase">{{ ___('cricket.balls') }}</th>
                                    <th class="purchase">{{ ___('cricket.strick_rate') }}</th>
                                    @if (hasPermission('scorebattersecond_update') || hasPermission('scorebattersecond_delete'))
                                        <th class="action"> {{ ___('cricket.action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @php
                                    $totalRun = 0;
                                    $mkData = [];
                                @endphp
                                @foreach ($data['scorebattersecond'] as $key => $row)
                                    <tr>
                                        @php
                                            $BatterRuns = $row->scoreupdateone->one + $row->scoreupdatetwo->two * 2 + $row->scoreupdatethree->three * 3 + $row->scoreupdatefour->four * 4 + $row->scoreupdatesix->six * 6;
                                            $totalRun = $totalRun + $BatterRuns;
                                            if ($mkData) {
                                                if (isset($mkData[$row->matchh->match_name])) {
                                                    if (isset($mkData[$row->matchh->match_name][$row->team->team_name])) {
                                                        $mkData[$row->matchh->match_name][$row->team->team_name] = $mkData[$row->matchh->match_name][$row->team->team_name] + $BatterRuns;
                                                    } else {
                                                        $mkData[$row->matchh->match_name][$row->team->team_name] = $BatterRuns;
                                                    }
                                                } else {
                                                    $mkData[$row->matchh->match_name] = [$row->team->team_name => $BatterRuns];
                                                }
                                            } else {
                                                $mkData[$row->matchh->match_name] = [$row->team->team_name => $BatterRuns];
                                            }
                                        @endphp
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ @$row->series->series_name }}</td>
                                        <td>{{ @$row->matchh->team->team_name }} - {{ @$row->matchh->team2->team_name }} {{ @$row->matchh->match_datetime }}
                                        </td>
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
                                                {{ $BatterRuns * 100 }}
                                            @elseif ($Balls > 0 and $BatterRuns == 0)
                                                {{ $Balls * $BatterRuns }}
                                            @elseif ($Balls == 0 and $BatterRuns == 0)
                                                {{ $Balls * $BatterRuns }}
                                            @elseif ($Balls == 0 and $BatterRuns > 0)
                                                {{ $BatterRuns * 100 }}
                                            @elseif ($BatterRuns > 0 and $Balls >= 0)
                                                {{ ($BatterRuns / $Balls) * 100 }}
                                            @endif
                                        </td>
                                        @if (hasPermission('scorebattersecond_update') || hasPermission('scorebattersecond_delete'))
                                            <td>
                                                @if (hasPermission('scorebattersecond_update'))
                                                    <a class="btn btn-info btn-sm" href="javascript:void(0)" title="Edit"
                                                        onclick="editPost({{ $row->id }})" data-toggle="modal"
                                                        data-target="#editModal"><i class="fas fa-edit"></i></a>
                                                @endif
                                                @if (hasPermission('scorebattersecond_delete'))
                                                    <a href="{{ route('scorebattersecond.delete', $row->id) }}"
                                                        class="btn btn-danger btn-sm" id="delete"><i
                                                            class="fas fa-trash"></i></a>
                                                @endif
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                            {{-- <h1>Total Runs:- {{ $totalRun }}</h1> --}}
                            @foreach ($mkData as $key => $item)
                                <h3>{{ $key }}</h3>
                                @foreach ($item as $keys => $items)
                                    {{ $keys . ': ' . $items }} <br>
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
                    <h5 class="modal-title" id="exampleModalLabel">{{ ___('cricket.add_score_batter_second') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="close_button">&times;</span>
                    </button>
                </div>
                <form action="{{ route('scorebattersecond.store') }}" method="Post" class="score_add_form">
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
                                                {{ @$row->team2->team_name }} {{ @$row->match_datetime }}</option>
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
                                    <label for="out type">{{ ___('cricket.out_type') }}</label>
                                    <select class="form-control" name="scoreupdate_id" required="">
                                        @foreach ($data['scoreupdate'] as $row)
                                            <option value="{{ $row->id }}">{{ $row->out_type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="out by type">{{ ___('cricket.out_by_type') }}</label>
                                    <select class="form-control" name="outby_id" required="">
                                        @foreach ($data['scoreupdate'] as $row)
                                            <option value="{{ $row->id }}">{{ $row->out_by_type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="one">{{ ___('cricket.one') }}</label>
                                    <select class="form-control" name="one_id" required="">
                                        @foreach ($data['scoreupdate'] as $row)
                                            <option value="{{ $row->id }}">{{ $row->one }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="Two">{{ ___('cricket.two') }}</label>
                                    <select class="form-control" name="two_id" required="">
                                        @foreach ($data['scoreupdate'] as $row)
                                            <option value="{{ $row->id }}">{{ $row->two }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="three">{{ ___('cricket.three') }}</label>
                                    <select class="form-control" name="three_id" required="">
                                        @foreach ($data['scoreupdate'] as $row)
                                            <option value="{{ $row->id }}">{{ $row->three }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="four">{{ ___('cricket.four') }}</label>
                                    <select class="form-control" name="four_id" required="">
                                        @foreach ($data['scoreupdate'] as $row)
                                            <option value="{{ $row->id }}">{{ $row->four }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="six">{{ ___('cricket.six') }}</label>
                                    <select class="form-control" name="six_id" required="">
                                        @foreach ($data['scoreupdate'] as $row)
                                            <option value="{{ $row->id }}">{{ $row->six }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="balls_played">{{ ___('cricket.balls') }}</label>
                                    <select class="form-control" name="balls_played_id" required="">
                                        @foreach ($data['scoreupdate'] as $row)
                                            <option value="{{ $row->id }}">{{ $row->balls_played }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger"
                                    data-dismiss="modal">{{ ___('cricket.close') }}</button>
                                <button type="Submit" class="btn btn-primary">{{ ___('cricket.submit') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- edit modal --}}
    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ ___('cricket.update_batter_second_score') }}</h5>
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
            let _url = `scorebattersecond/edit/${id}`;

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
                url: '{{ route('getTeamListScorebattersecond') }}',
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
                url: '{{ route('getPlayerListScorebattersecond') }}',
                success: function(data) {
                    $('form.score_add_form #player_id').html(data);
                },
                error: function(data) {}
            });
        });
    </script>
@endsection
