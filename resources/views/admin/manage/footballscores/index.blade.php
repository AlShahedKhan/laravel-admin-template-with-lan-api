@extends('layouts.admin')

@section('admin_content')
    <div class="page-content">
        {{-- bradecrumb Area S t a r t --}}
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <title>{{ ___('football.football_score') }}</title>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ ___('cricket.home') }}</a></li>
                        <li class="breadcrumb-item">{{ ___('football.football_score') }}</li>
                    </ol>
                </div>
            </div>
        </div>
        {{-- bradecrumb Area E n d --}}

        <!--  table content start -->
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ ___('football.football_score') }}</h4>
                    @if (hasPermission('football_scores_create'))
                        <a href="" class="btn btn-lg ot-btn-primary btn-right" data-toggle="modal" data-target="#teamModal">
                            <span><i class="fa-solid fa-plus"></i> </span>
                            <span class="">{{ ___('cricket.add_score') }}</span>
                        </a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered role-table" id="example1">
                            <thead class="thead">
                                <tr>
                                    <th class="serial"> {{ ___('cricket.sl') }} </th>
                                    <th class="purchase">{{ ___('cricket.match_name') }} </th>
                                    <th class="purchase">{{ ___('cricket.team_name') }} </th>
                                    <th class="purchase">{{ ___('football.goal') }}</th>
                                    <th class="purchase">{{ ___('football.shots') }}</th>
                                    <th class="purchase">{{ ___('football.shots_on_target') }}</th>
                                    <th class="purchase">{{ ___('football.prossession') }}</th>
                                    <th class="purchase">{{ ___('football.passes') }}</th>
                                    <th class="purchase">{{ ___('football.passes_accuracy') }}</th>
                                    <th class="purchase">{{ ___('football.fouls') }}</th>
                                    <th class="purchase">{{ ___('football.yellow_cards') }}</th>
                                    <th class="purchase">{{ ___('football.red_cards') }}</th>
                                    <th class="purchase">{{ ___('football.off_sides') }}</th>
                                    <th class="purchase">{{ ___('football.corners') }}</th>

                                    <th class="purchase">{{ ___('football.team2_name') }} </th>
                                    <th class="purchase">{{ ___('football.goal') }}</th>
                                    <th class="purchase">{{ ___('football.shots') }}</th>
                                    <th class="purchase">{{ ___('football.shots_on_target') }}</th>
                                    <th class="purchase">{{ ___('football.prossession') }}</th>
                                    <th class="purchase">{{ ___('football.passes') }}</th>
                                    <th class="purchase">{{ ___('football.passes_accuracy') }}</th>
                                    <th class="purchase">{{ ___('football.fouls') }}</th>
                                    <th class="purchase">{{ ___('football.yellow_cards') }}</th>
                                    <th class="purchase">{{ ___('football.red_cards') }}</th>
                                    <th class="purchase">{{ ___('football.off_sides') }}</th>
                                    <th class="purchase">{{ ___('football.corners') }}</th>
                                    @if (hasPermission('football_scores_update') || hasPermission('football_scores_delete'))
                                        <th class="action"> {{ ___('cricket.action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @foreach ($data['commentry'] as $key => $row)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ @$row->matchh->team->team_name }} - {{ @$row->matchh->team2->team_name }}
                                        </td>
                                        <td>{{ $row->team->team_name }}</td>
                                        <td>{{ @$row->goal->goal }}</td>
                                        <td>{{ @$row->shots->shots }}</td>
                                        <td>{{ @$row->shots_on_target->shots_on_target }}</td>
                                        <td>{{ @$row->prossession->prossession }}</td>
                                        <td>{{ @$row->passes->passes }}</td>
                                        <td>{{ @$row->passes_accuracy->passes_accuracy }}</td>
                                        <td>{{ @$row->fouls->fouls }}</td>
                                        <td>{{ @$row->yellow_cards->yellow_cards }}</td>
                                        <td>{{ @$row->red_cards->red_cards }}</td>
                                        <td>{{ @$row->off_sides->off_sides }}</td>
                                        <td>{{ @$row->corners->corners }}</td>

                                        <td>{{ $row->team2->team_name }}</td>
                                        <td>{{ @$row->goal2->goal }}</td>
                                        <td>{{ @$row->shots2->shots }}</td>
                                        <td>{{ @$row->shots2->shots_on_target }}</td>
                                        <td>{{ @$row->prossession2->prossession }}</td>
                                        <td>{{ @$row->passes2->passes }}</td>
                                        <td>{{ @$row->passes_accuracy2->passes_accuracy }}</td>
                                        <td>{{ @$row->fouls2->fouls }}</td>
                                        <td>{{ @$row->yellow_cards2->yellow_cards }}</td>
                                        <td>{{ @$row->red_cards2->red_cards }}</td>
                                        <td>{{ @$row->off_sides2->off_sides }}</td>
                                        <td>{{ @$row->corners2->corners }}</td>
                                        {{-- @if (hasPermission('football_scores_update') || hasPermission('football_scores_delete')) --}}
                                            <td>
                                                {{-- @if (hasPermission('football_scores_update')) --}}
                                                    <a class="btn btn-info btn-sm" href="javascript:void(0)" title="Edit"
                                                        onclick="editPost({{ @$row->id }})" data-toggle="modal"
                                                        data-target="#editModal"><i class="fas fa-edit"></i></a>
                                                {{-- @endif --}}
                                                @if (hasPermission('football_scores_delete'))
                                                    <a href="{{ route('footballscores.delete', @$row->id) }}"
                                                        class="btn btn-danger btn-sm" id="delete"><i
                                                            class="fas fa-trash"></i></a>
                                                @endif
                                            </td>
                                        {{-- @endif --}}
                                    </tr>
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

    {{-- team insert modal --}}
    <!-- Modal -->
    <div class="modal fade" id="teamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ ___('cricket.add_football_score') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="close_button">&times;</span>
                    </button>
                </div>
                <form action="{{ route('footballscores.store') }}" method="Post" class="score_add_form">
                    @csrf
                    <div class="col-md-12">
                        <div class="row mb-3">
                            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                <label for="player_name">{{ ___('cricket.match_name') }}</label>
                                <select class="form-control" name="match_id" id="match_id" required="">
                                    <option value="">--{{ ___('cricket.select_option') }}--</option>
                                    @foreach ($data['match'] as $row)
                                        <option value="{{ $row->id }}">{{ @$row->team->team_name }} -
                                            {{ @$row->team2->team_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                <label for="team_name">{{ ___('cricket.team_name') }}</label>
                                <select class="form-control" name="team_id" id="team_id" required="">
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                <label for="goal">{{ ___('cricket.goal') }}</label>
                                <select class="form-control" name="goal_id" required="">
                                    @foreach ($data['goolscore'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->goal }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                <label for="shots">{{ ___('cricket.shots') }}</label>
                                <select class="form-control" name="shots_id" required="">
                                    @foreach ($data['goolscore'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->shots }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                <label for="shots_on_target">{{ ___('cricket.shots_on_target') }}</label>
                                <select class="form-control" name="shots_on_target_id" required="">
                                    @foreach ($data['goolscore'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->shots_on_target }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                <label for="prossession">{{ ___('cricket.prossession') }}</label>
                                <select class="form-control" name="prossession_id" required="">
                                    @foreach ($data['goolscore'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->prossession }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                <label for="passes">{{ ___('cricket.passes') }}</label>
                                <select class="form-control" name="passes_id" required="">
                                    @foreach ($data['goolscore'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->passes }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                <label for="passes_accuracy">{{ ___('cricket.passes_accuracy') }}</label>
                                <select class="form-control" name="passes_accuracy_id" required="">
                                    @foreach ($data['goolscore'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->passes_accuracy }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                <label for="fouls">{{ ___('cricket.fouls') }}</label>
                                <select class="form-control" name="fouls_id" required="">
                                    @foreach ($data['goolscore'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->fouls }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                <label for="yellow_cards">{{ ___('cricket.yellow_cards') }}</label>
                                <select class="form-control" name="yellow_cards_id" required="">
                                    @foreach ($data['goolscore'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->yellow_cards }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                <label for="red_cards">{{ ___('cricket.red_cards') }}</label>
                                <select class="form-control" name="red_cards_id" required="">
                                    @foreach ($data['goolscore'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->red_cards }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                <label for="off_sides">{{ ___('cricket.off_sides') }}</label>
                                <select class="form-control" name="off_sides_id" required="">
                                    @foreach ($data['goolscore'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->off_sides }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                <label for="corners">{{ ___('cricket.corners') }}</label>
                                <select class="form-control" name="corners_id" required="">
                                    @foreach ($data['goolscore'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->corners }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                <label for="team_name">{{ ___('cricket.team2_name') }}</label>
                                <select class="form-control" name="team2_id" id="team2_id" required="">
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                <label for="goal">{{ ___('cricket.goal') }}</label>
                                <select class="form-control" name="goal2_id" required="">
                                    @foreach ($data['goolscore'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->goal }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                <label for="shots">{{ ___('cricket.shots') }}</label>
                                <select class="form-control" name="shots2_id" required="">
                                    @foreach ($data['goolscore'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->shots }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                <label for="shots_on_target">{{ ___('cricket.shots_on_target') }}</label>
                                <select class="form-control" name="shots_on_target2_id" required="">
                                    @foreach ($data['goolscore'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->shots_on_target }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                <label for="prossession">{{ ___('cricket.prossession') }}</label>
                                <select class="form-control" name="prossession2_id" required="">
                                    @foreach ($data['goolscore'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->prossession }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                <label for="passes">{{ ___('cricket.passes') }}</label>
                                <select class="form-control" name="passes2_id" required="">
                                    @foreach ($data['goolscore'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->passes }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                <label for="passes_accuracy">{{ ___('cricket.passes_accuracy') }}</label>
                                <select class="form-control" name="passes_accuracy2_id" required="">
                                    @foreach ($data['goolscore'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->passes_accuracy }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                <label for="fouls">{{ ___('cricket.fouls') }}</label>
                                <select class="form-control" name="fouls2_id" required="">
                                    @foreach ($data['goolscore'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->fouls }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                <label for="yellow_cards">{{ ___('cricket.yellow_cards') }}</label>
                                <select class="form-control" name="yellow_cards2_id" required="">
                                    @foreach ($data['goolscore'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->yellow_cards }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                <label for="red_cards">{{ ___('cricket.red_cards') }}</label>
                                <select class="form-control" name="red_cards2_id" required="">
                                    @foreach ($data['goolscore'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->red_cards }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                <label for="off_sides">{{ ___('cricket.off_sides') }}</label>
                                <select class="form-control" name="off_sides2_id" required="">
                                    @foreach ($data['goolscore'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->off_sides }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                <label for="corners">{{ ___('cricket.corners') }}</label>
                                <select class="form-control" name="corners2_id" required="">
                                    @foreach ($data['goolscore'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->corners }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger"
                            data-dismiss="modal">{{ ___('common.close') }}</button>
                        <button type="Submit" class="btn btn-primary">{{ ___('common.submit') }}</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">{{ ___('cricket.update_football_scores') }}</h5>
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
            let _url = `footballscores/edit/${id}`;

            $.ajax({
                url: _url,
                type: "GET",
                success: function(data) {

                    $("#modal_body").html(data);
                }
            });
        }
        $('form.score_add_form #match_id').on('change', function(e) {
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
                url: '{{ route('getTeamListFootballscores') }}',
                success: function(data) {
                    $('form.score_add_form #team_id').html(data);
                    $('form.score_add_form #team2_id').html(data);

                    $('form.score_add_form #player_id').html(
                        '<option  value="">Select Player</option>');
                    $('form.score_add_form #player2_id').html(
                        '<option  value="">Select Player</option>');
                },
                error: function(data) {}
            });
        });

        $('form.score_add_form #team_id').on('change', function(e) {
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
                url: '{{ route('getPlayerListFootballscores') }}',
                success: function(data) {
                    $('form.score_add_form #player_id').html(data);
                },
                error: function(data) {}
            });
        });
        $('form.score_add_form #team2_id').on('change', function(e) {
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
                url: '{{ route('getPlayerListFootballscores') }}',
                success: function(data) {
                    $('form.score_add_form #player2_id').html(data);
                },
                error: function(data) {}
            });
        });
    </script>

    <script>
        let startBtn = document.getElementById('start');
        let stopBtn = document.getElementById('stop');
        let resetBtn = document.getElementById('reset');

        let hour = 00;
        let minute = 00;
        let second = 00;
        let count = 00;

        startBtn.addEventListener('click', function() {
            timer = true;
            stopWatch();
        });

        stopBtn.addEventListener('click', function() {
            timer = false;
        });

        resetBtn.addEventListener('click', function() {
            timer = false;
            hour = 0;
            minute = 0;
            second = 0;
            count = 0;
            document.getElementById('hr').innerHTML = "00";
            document.getElementById('min').innerHTML = "00";
            document.getElementById('sec').innerHTML = "00";
            document.getElementById('count').innerHTML = "00";
        });

        function stopWatch() {
            if (timer) {
                count++;

                if (count == 100) {
                    second++;
                    count = 0;
                }

                if (second == 60) {
                    minute++;
                    second = 0;
                }

                if (minute == 60) {
                    hour++;
                    minute = 0;
                    second = 0;
                }

                let hrString = hour;
                let minString = minute;
                let secString = second;
                let countString = count;

                if (hour < 10) {
                    hrString = "0" + hrString;
                }

                if (minute < 10) {
                    minString = "0" + minString;
                }

                if (second < 10) {
                    secString = "0" + secString;
                }

                if (count < 10) {
                    countString = "0" + countString;
                }

                document.getElementById('hr').innerHTML = hrString;
                document.getElementById('min').innerHTML = minString;
                document.getElementById('sec').innerHTML = secString;
                document.getElementById('count').innerHTML = countString;
                setTimeout(stopWatch, 10);
            }
        }
    </script>
@endsection
