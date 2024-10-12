@extends('layouts.admin')

@section('admin_content')
    <div class="page-content">
        {{-- bradecrumb Area S t a r t --}}
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <title>{{ ___('cricket.rankings') }}</title>
                    <ol class="breadcrumb">
                        @if (hasPermission('ranking_read'))
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ ___('cricket.home') }}</a></li>
                        @endif
                        <li class="breadcrumb-item">{{ ___('cricket.rankings') }}</li>
                    </ol>
                </div>
            </div>
        </div>
        {{-- bradecrumb Area E n d --}}

        <!--  table content start -->
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ ___('cricket.rankings') }}</h4>
                    @if (hasPermission('ranking_store'))
                        <a href="" class="btn btn-lg ot-btn-primary btn-right" data-toggle="modal"
                            data-target="#teamModal">
                            <span><i class="fa-solid fa-plus"></i> </span>
                            <span class="">{{ ___('cricket.add_rankings') }}</span>
                        </a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered role-table" id="example1">
                            <thead class="thead">
                                <tr>
                                    <th class="serial"> {{ ___('cricket.sl') }} </th>
                                    <th class="purchase">{{ ___('cricket.team_name') }} </th>
                                    <th class="purchase">{{ ___('cricket.player_name') }}</th>
                                    <th class="purchase">{{ ___('cricket.year') }} </th>
                                    <th class="purchase">{{ ___('cricket.month') }} </th>
                                    <th class="purchase">{{ ___('cricket.man_women') }}</th>
                                    <th class="purchase">{{ ___('cricket.t20_batter_points') }} </th>
                                    <th class="purchase">{{ ___('cricket.w_t20_batter_points') }} </th>
                                    <th class="purchase">{{ ___('cricket.t20_bowler_points') }} </th>
                                    <th class="purchase">{{ ___('cricket.w_t20_bowler_points') }} </th>
                                    <th class="purchase">{{ ___('cricket.odi_batter_points') }} </th>
                                    <th class="purchase">{{ ___('cricket.w_odi_batter_points') }} </th>
                                    <th class="purchase">{{ ___('cricket.odi_bowler_points') }} </th>
                                    <th class="purchase">{{ ___('cricket.w_odi_bowler_points') }} </th>
                                    <th class="purchase">{{ ___('cricket.test_batter_points') }} </th>
                                    <th class="purchase">{{ ___('cricket.w_test_batter_points') }} </th>
                                    <th class="purchase">{{ ___('cricket.test_bowler_points') }} </th>
                                    <th class="purchase">{{ ___('cricket.w_test_bowler_points') }} </th>
                                    @if (hasPermission('ranking_update') || hasPermission('ranking_delete'))
                                        <th class="action"> {{ ___('cricket.action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @php
                                    $totalRun = 0;

                                    $mkData = [];
                                @endphp
                                @foreach ($data['rankings']->sortByDesc(function ($row) {
            return $row->year * 12 + $row->month;
        }) as $key => $row)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $row->team->team_name }}</td>
                                        <td>{{ $row->player->player_name }}</td>
                                        <td>{{ $row->year }}</td>
                                        <td>{{ date('F', mktime(0, 0, 0, $row->month, 1)) }}</td>
                                        <td>{{ $row->man_women->man_women }}</td>
                                        <td>{{ $row->point->points }}</td>
                                        <td>{{ $row->w_t20_batter_points->points }}</td>
                                        <td>{{ $row->t20_bowler_points->points }}</td>
                                        <td>{{ $row->w_t20_bowler_points->points }}</td>
                                        <td>{{ $row->odi_batter_points->points }}</td>
                                        <td>{{ $row->w_odi_batter_points->points }}</td>
                                        <td>{{ $row->odi_bowler_points->points }}</td>
                                        <td>{{ $row->w_odi_bowler_points->points }}</td>
                                        <td>{{ $row->test_batter_points->points }}</td>
                                        <td>{{ $row->w_test_batter_points->points }}</td>
                                        <td>{{ $row->test_bowler_points->points }}</td>
                                        <td>{{ $row->w_test_bowler_points->points }}</td>

                                        @if (hasPermission('ranking_update') || hasPermission('ranking_delete'))
                                        <td>
                                            @if (hasPermission('ranking_update'))
                                            <a class="btn btn-info btn-sm" href="javascript:void(0)" title="Edit"
                                                onclick="editPost({{ $row->id }})" data-toggle="modal"
                                                data-target="#editModal"><i class="fas fa-edit"></i></a>
                                            @endif
                                            @if (hasPermission('ranking_delete'))
                                            <a href="{{ route('rankings.delete', $row->id) }}"
                                                class="btn btn-danger btn-sm" id="delete"><i
                                                    class="fas fa-trash"></i></a>
                                            @endif
                                        </td>
                                        @endif
                                    </tr>
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

    {{-- team insert modal --}}
    <!-- Modal -->
    <div class="modal fade" id="teamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ ___('cricket.add_rankings') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="close_button">&times;</span>
                    </button>
                </div>
                <form action="{{ route('rankings.store') }}" method="Post" class="score_add_form">
                    @csrf
                    <div class="col-md-12">
                        <div class="row mb-3">
                            <div class="col-sm-6 mb-3">
                                <label for="team_name">{{ ___('cricket.team_name') }}</label>
                                <select class="form-control" name="team_id" id="team_id" required="">
                                    <option value="">--{{ ___('cricket.select_option') }}--</option>
                                    @foreach ($data['teams'] as $row)
                                        <option value="{{ $row->id }}">{{ @$row->team_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="player_name">{{ ___('cricket.player_name') }}</label>
                                <select class="form-control" name="player_id" id="player_id" required="">
                                </select>
                            </div>

                            <div class="col-sm-6 mb-3">
                                <label for="man_women">{{ ___('cricket.man_women') }}</label>
                                <select class="form-control" name="man_women_id" required="">
                                    @php
                                        $manWomen = [];
                                    @endphp
                                    @foreach ($data['players'] as $row)
                                        @if (!in_array($row->man_women, $manWomen))
                                            <option value="{{ $row->id }}">{{ $row->man_women }}</option>
                                            @php
                                                $manWomen[] = $row->man_women;
                                            @endphp
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-6 mb-3">
                                <label for="t20_batter_points">{{ ___('cricket.t20_batter_points') }}</label>
                                <select class="form-control" name="point_id" required="">
                                    @foreach ($data['points'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->points }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="w_t20_batter_points">{{ ___('cricket.w_t20_batter_points') }}</label>
                                <select class="form-control" name="w_t20_batter_points_id" required="">
                                    @foreach ($data['points'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->points }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="t20_bowler_points">{{ ___('cricket.t20_bowler_points') }}</label>
                                <select class="form-control" name="t20_bowler_points_id" required="">
                                    @foreach ($data['points'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->points }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="w_t20_bowler_points">{{ ___('cricket.w_t20_bowler_points') }}</label>
                                <select class="form-control" name="w_t20_bowler_points_id" required="">
                                    @foreach ($data['points'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->points }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="odi_batter_points">{{ ___('cricket.odi_batter_points') }}</label>
                                <select class="form-control" name="odi_batter_points_id" required="">
                                    @foreach ($data['points'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->points }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="w_odi_batter_points">{{ ___('cricket.w_odi_batter_points') }}</label>
                                <select class="form-control" name="w_odi_batter_points_id" required="">
                                    @foreach ($data['points'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->points }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="odi_bowler_points">{{ ___('cricket.odi_bowler_points') }}</label>
                                <select class="form-control" name="odi_bowler_points_id" required="">
                                    @foreach ($data['points'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->points }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="w_odi_bowler_points">{{ ___('cricket.w_odi_bowler_points') }}</label>
                                <select class="form-control" name="w_odi_bowler_points_id" required="">
                                    @foreach ($data['points'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->points }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="test_batter_points">{{ ___('cricket.test_batter_points') }}</label>
                                <select class="form-control" name="test_batter_points_id" required="">
                                    @foreach ($data['points'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->points }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="w_test_batter_points">{{ ___('cricket.w_test_batter_points') }}</label>
                                <select class="form-control" name="w_test_batter_points_id" required="">
                                    @foreach ($data['points'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->points }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="test_bowler_points">{{ ___('cricket.test_bowler_points') }}</label>
                                <select class="form-control" name="test_bowler_points_id" required="">
                                    @foreach ($data['points'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->points }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="w_test_bowler_points">{{ ___('cricket.w_test_bowler_points') }}</label>
                                <select class="form-control" name="w_test_bowler_points_id" required="">
                                    @foreach ($data['points'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->points }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="year">{{ ___('cricket.year') }}</label>
                                <input type="number" class="form-control" name="year" min="1900" max="2099"
                                    required>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="month">{{ ___('cricket.month') }}</label>
                                <select class="form-control" name="month" required>
                                    <option value="">-- Select Month --</option>
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger"
                                data-dismiss="modal">{{ ___('common.close') }}</button>
                            <button type="Submit" class="btn btn-primary">{{ ___('common.submit') }}</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">{{ ___('cricket.update_ranking') }}</h5>
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
            let _url = `rankings/edit/${id}`;

            $.ajax({
                url: _url,
                type: "GET",
                success: function(data) {

                    $("#modal_body").html(data);
                }
            });
        }


        $(document).ready(function() {
            $('form.score_add_form #team_id').on('change', function(e) {
                e.preventDefault();

                var formData = {
                    id: $(this).val()
                }

                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '{{ url('rankings/get-player-list') }}/' + formData.id,
                    success: function(data) {
                        $('form.score_add_form #player_id').empty();
                        $.each(data, function(index, player) {
                            $('form.score_add_form #player_id').append($('<option>', {
                                value: player.id,
                                text: player.player_name
                            }));
                        });
                    },
                    error: function(data) {}
                });

            });
        });
    </script>
@endsection
