@extends('layouts.admin')

@section('admin_content')
    <div class="page-content">
        {{-- bradecrumb Area S t a r t --}}
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <title>{{ ___('cricket.commentry') }}</title>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ ___('cricket.home') }}</a></li>
                        <li class="breadcrumb-item">{{ ___('cricket.commentry') }}</li>
                    </ol>
                </div>
            </div>
        </div>
        {{-- bradecrumb Area E n d --}}

        <!--  table content start -->
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ ___('cricket.commentry') }}</h4>
                    @if (hasPermission('commentry_create'))
                        <a href="" class="btn btn-lg ot-btn-primary btn-right" data-toggle="modal" data-target="#teamModal">
                            <span><i class="fa-solid fa-plus"></i> </span>
                            <span class="">{{ ___('cricket.add_commentry') }}</span>
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
                                    <th class="purchase">{{ ___('cricket.batter_name') }}</th>
                                    <th class="purchase">{{ ___('cricket.team2_name') }}</th>
                                    <th class="purchase">{{ ___('cricket.bowler_name') }}</th>
                                    <th class="purchase">{{ ___('cricket.details') }}</th>
                                    @if (hasPermission('commentry_update') || hasPermission('commentry_delete'))
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
                                        <td>{{ @$row->player->player_name }}</td>
                                        <td>{{ @$row->team2->team_name }}</td>
                                        <td>{{ @$row->player2->player_name }}</td>
                                        <td>{{ @$row->CommentryCreateDetails->details }}</td>
                                        @if (hasPermission('commentry_update') || hasPermission('commentry_delete'))
                                            <td>
                                                @if (hasPermission('commentry_update'))
                                                    <a class="btn btn-info btn-sm" href="javascript:void(0)" title="Edit"
                                                        onclick="editPost({{ @$row->id }})" data-toggle="modal"
                                                        data-target="#editModal"><i class="fas fa-edit"></i></a>
                                                @endif
                                                @if (hasPermission('commentry_delete'))
                                                    <a href="{{ route('commentry.delete', @$row->id) }}"
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
    <div class="modal fade" id="teamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ ___('cricket.add_commentry') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="close_button">&times;</span>
                    </button>
                </div>
                <form action="{{ route('commentry.store') }}" method="Post" class="score_add_form">
                    @csrf
                    <div class="modal-body">
                        <div class="from-group mb-3">
                            <label for="player_name">{{ ___('cricket.match_name') }}</label>
                            {{-- @dd($data['match']) --}}
                            <select class="form-control" name="match_id" id="match_id" required="">
                                <option value="">--{{ ___('cricket.select_option') }}--</option>
                                @foreach ($data['match'] as $row)
                                    <option value="{{ $row->id }}">{{ @$row->team->team_name }} -
                                        {{ @$row->team2->team_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group mb-3">
                            <label for="player_name">{{ ___('cricket.team_name') }}</label>
                            <select class="form-control" name="team_id" id="team_id" required="">
                            </select>
                        </div>
                        <div class="from-group mb-3">
                            <label for="player_name">{{ ___('cricket.batter_name') }}</label>
                            <select class="form-control" name="player_id" id="player_id" required="">
                            </select>
                        </div>
                        <div class="from-group mb-3">
                            <label for="player_name">{{ ___('cricket.bowler_team_name') }}</label>
                            <select class="form-control" name="team2_id" id="team2_id" required="">
                            </select>
                        </div>

                        <div class="from-group mb-3">
                            <label for="player_name">{{ ___('cricket.bowler_name') }}</label>
                            <select class="form-control" name="player2_id" id="player2_id" required="">
                            </select>
                        </div>
                        <div class="from-group mb-3">
                            <label for="details">{{ ___('cricket.details') }}</label>
                            <select class="form-control" name="details_id" required="">
                                @foreach ($data['CommentryCreate'] as $row)
                                    <option value="{{ $row->id }}">{{ $row->details }}</option>
                                @endforeach
                            </select>
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
                    <h5 class="modal-title" id="exampleModalLabel">{{ ___('cricket.update_commentry') }}</h5>
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
            let _url = `commentry/edit/${id}`;

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
                url: '{{ route('getTeamListCommentry') }}',
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
                url: '{{ route('getPlayerListCommentry') }}',
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
                url: '{{ route('getPlayerListCommentry') }}',
                success: function(data) {
                    $('form.score_add_form #player2_id').html(data);
                },
                error: function(data) {}
            });
        });
    </script>
@endsection
