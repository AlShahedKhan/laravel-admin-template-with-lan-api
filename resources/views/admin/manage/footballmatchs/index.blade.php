@extends('layouts.admin')

@section('admin_content')
    <div class="page-content">
        {{-- bradecrumb Area S t a r t --}}
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <title>{{ ___('football.football_Matches') }}</title>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ ___('cricket.home') }}</a></li>
                        <li class="breadcrumb-item">{{ ___('football.football_Matches') }}</li>
                    </ol>
                </div>
            </div>
        </div>
        {{-- bradecrumb Area E n d --}}

        <!--  table content start -->
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ ___('football.football_Matches') }}</h4>
                    @if (hasPermission('football_matchs_create'))
                        <a href="" class="btn btn-lg ot-btn-primary btn-right" data-toggle="modal" data-target="#matchModal">
                            <span><i class="fa-solid fa-plus"></i> </span>
                            <span class="">{{ ___('cricket.add_match') }}</span>
                        </a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered role-table" id="example1">
                            <thead class="thead">
                                <tr>
                                    <th class="serial">{{ ___('cricket.sl') }}</th>
                                    <th class="purchase">{{ ___('cricket.leagues') }}</th>
                                    <th class="purchase">{{ ___('cricket.team_name') }}</th>
                                    <th class="purchase">{{ ___('cricket.second_team_name') }}</th>
                                    <th class="purchase">{{ ___('cricket.match_date_time') }}</th>
                                    <th class="purchase">{{ ___('cricket.status') }}</th>
                                    @if (hasPermission('football_matchs_update') || hasPermission('football_matchs_delete'))
                                        <th class="action">{{ ___('cricket.action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @foreach ($data->sortByDesc('match_datetime') as $key => $row)
                                    <tr>
                                        <td class="serial">{{ $key + 1 }}</td>
                                        <td>{{ $row->leagues->league_name }}</td>
                                        <td>{{ $row->team->team_name }}</td>
                                        <td>{{ $row->team2->team_name }}</td>
                                        <td>{{ Carbon\Carbon::parse($row->match_datetime)->format('d M Y  h:i:s A') }}
                                        </td>
                                        <td>
                                            @if ($row->is_game_over == 0)
                                                <label for=""
                                                    class="badge badge-info">{{ ___('cricket.upcomming') }}</label>
                                            @elseif ($row->is_game_over == 1)
                                                <label for=""
                                                    class="badge badge-danger">{{ ___('cricket.game_over') }}</label>
                                            @elseif ($row->is_game_over == 2)
                                                <label for=""
                                                    class="badge badge-success">{{ ___('cricket.running') }}</label>
                                            @else
                                                ---
                                            @endif
                                        </td>
                                        @if (hasPermission('football_matchs_update') || hasPermission('football_matchs_delete'))
                                            <td>
                                                @if (hasPermission('football_matchs_update'))
                                                    <a class="btn btn-info btn-sm" href="javascript:void(0)" title="Edit"
                                                        onclick="editPost({{ $row->id }})" data-toggle="modal"
                                                        data-target="#editModal"><i class="fas fa-edit"></i></a>
                                                @endif
                                                @if (hasPermission('football_matchs_delete'))
                                                    <a href="{{ route('footballmatchs.delete', $row->id) }}"
                                                        class="btn btn-danger btn-sm" id="delete"><i
                                                            class="fas fa-trash"></i></a>
                                                @endif
                                            </td>
                                        @endif
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
    <div class="modal fade" id="matchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ ___('cricket.add_match') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="close_button">&times;</span>
                    </button>
                </div>
                <form action="{{ route('footballmatchs.store') }}" method="Post">
                    @csrf
                    <div class="modal-body">
                        <div class="from-group mb-3">
                            <label for="leagues">{{ ___('cricket.leagues') }}</label>
                            <select class="form-control" name="leagues_id" required="">
                                @foreach ($leagues as $row)
                                    <option value="{{ $row->id }}">{{ $row->league_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group mb-3">
                            <label for="player_name">{{ ___('cricket.team_name') }}</label>
                            <select class="form-control" name="team_id" required="">
                                @foreach ($team as $row)
                                    <option value="{{ $row->id }}">{{ $row->team_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group mb-3">
                            <label for="player_name">{{ ___('cricket.second_team_name') }}</label>
                            <select class="form-control" name="team2_id" required="">
                                @foreach ($team as $row)
                                    <option value="{{ $row->id }}">{{ $row->team_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group mb-3">
                            <label for="match_name">{{ ___('cricket.date_time') }}</label>
                            <input type="datetime-local" class="form-control" id="match_datetime" name="match_datetime"
                                required="">
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
                    <h5 class="modal-title" id="exampleModalLabel">{{ ___('cricket.update_match') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="close_button">&times;</span>
                    </button>
                </div>
                <form action="{{ route('footballmatchs.update') }}" method="Post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="id" name="id">

                        <div class="from-group mb-3">
                            <label for="leagues">{{ ___('cricket.leagues') }}</label>
                            <select class="form-control" name="leagues_id" required="" id="leagues_id">
                                @foreach ($leagues as $row)
                                    <option value="{{ $row->id }}">{{ $row->league_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group mb-3">
                            <label for="player_name">{{ ___('cricket.team_name') }}</label>
                            <select class="form-control" name="team_id" required="" id="team_id">
                                @foreach ($team as $row)
                                    <option value="{{ $row->id }}">{{ $row->team_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group mb-3">
                            <label for="player_name">{{ ___('cricket.second_team_name') }}</label>
                            <select class="form-control" name="team2_id" required="" id="team2_id">
                                @foreach ($team as $row)
                                    <option value="{{ $row->id }}">{{ $row->team_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group mb-3">
                            <label for="player_name">{{ ___('cricket.status') }}</label>
                            <select class="form-control" name="status" id="status">
                                <option value="0">{{ ___('cricket.upcomming') }}</option>
                                <option value="1">{{ ___('cricket.game_over') }}</option>
                                <option value="2">{{ ___('cricket.running') }}</option>
                            </select>
                        </div>
                        <div class="from-group mb-3">
                            <label for="match_name">{{ ___('cricket.date_time') }}</label>
                            <input type="datetime-local" class="form-control" id="match_datetime_edit"
                                name="match_datetime" required="">
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
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function editPost(id) {
            let _url = `footballmatchs/edit/${id}`;

            $.ajax({
                url: _url,
                type: "GET",
                success: function(response) {
                    console.log(response);
                    if (response) {
                        $("#id").val(response.id);
                        $("#team_id :selected").text();
                        $("#team_id").val(response.team_id);
                        $("#team2_id :selected").text();
                        $("#team2_id").val(response.team2_id);
                        $("#status :selected").text();
                        $("#status").val(response.is_game_over);
                        $("#match_datetime_edit").val(response.match_datetime);
                    }
                }
            });
        }
    </script>
@endsection
