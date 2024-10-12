@extends('layouts.admin')

@section('admin_content')
    <div class="page-content">

        {{-- bradecrumb Area S t a r t --}}
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    {{-- <h4 class="bradecrumb-title mb-1">{{ $data['title'] }}</h1> --}}

                    <title>{{ ___('cricket.teams') }}</title>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ ___('cricket.home') }}</a></li>
                        <li class="breadcrumb-item">{{ ___('cricket.teams') }}</li>
                    </ol>
                </div>
            </div>
        </div>
        {{-- bradecrumb Area E n d --}}

        <!--  table content start -->
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ ___('cricket.team') }}</h4>
                    @if (hasPermission('team_create'))
                        <a href="" class="btn btn-lg ot-btn-primary btn-right" data-toggle="modal" data-target="#teamModal">
                            <span><i class="fa-solid fa-plus"></i> </span>
                            <span class="">{{ ___('cricket.add_team') }}</span>
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
                                    <th class="purchase">{{ ___('cricket.team_slug') }} </th>
                                    <th class="purchase">{{ ___('cricket.t_20_ranking') }} </th>
                                    <th class="purchase">{{ ___('cricket.odi_ranking') }} </th>
                                    <th class="purchase">{{ ___('cricket.test_ranking') }} </th>
                                    <th class="purchase">{{ ___('cricket.w_t_20_ranking') }} </th>
                                    <th class="purchase">{{ ___('cricket.w_odi_ranking') }} </th>
                                    <th class="purchase">{{ ___('cricket.w_test_ranking') }} </th>
                                    @if (hasPermission('team_update') || hasPermission('team_delete'))
                                        <th class="action"> {{ ___('cricket.action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @foreach ($data as $key => $row)
                                    <tr>
                                        <td class="serial">{{ $key + 1 }}</td>
                                        <td>{{ $row->team_name }}</td>
                                        <td>{{ $row->team_slug }}</td>
                                        <td>{{ $row->t_20_ranking }}</td>
                                        <td>{{ $row->odi_ranking }}</td>
                                        <td>{{ $row->test_ranking }}</td>
                                        <td>{{ $row->w_t_20_ranking }}</td>
                                        <td>{{ $row->w_odi_ranking }}</td>
                                        <td>{{ $row->w_test_ranking }}</td>
                                        @if (hasPermission('team_update') || hasPermission('team_delete'))
                                            <td>
                                                @if (hasPermission('team_update'))
                                                    <a href="#" class="btn btn-info btn-sm edit"
                                                        data-id="{{ $row->id }}" data-toggle="modal"
                                                        data-target="#editModal"><i class="fas fa-edit"></i></a>
                                                @endif
                                                @if (hasPermission('team_delete'))
                                                    <a href="{{ route('teams.delete', $row->id) }}"
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
                    <h5 class="modal-title" id="exampleModalLabel">{{ ___('cricket.add_team') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="close_button">&times;</span>
                    </button>
                </div>
                <form action="{{ route('teams.store') }}" method="Post">
                    @csrf
                    <div class="modal-body">
                        <div class="from-group">
                            <label for="team_name">{{ ___('cricket.team_name') }}</label>
                            <input type="text" class="form-control" id="team_name" name="team_name" required="">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="from-group">
                            <label for="t_20_ranking">{{ ___('cricket.t_20_ranking') }}</label>
                            <input type="text" class="form-control" id="t_20_ranking" name="t_20_ranking" required="">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="from-group">
                            <label for="odi_ranking">{{ ___('cricket.odi_ranking') }}</label>
                            <input type="text" class="form-control" id="odi_ranking" name="odi_ranking" required="">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="from-group">
                            <label for="test_ranking">{{ ___('cricket.test_ranking') }}</label>
                            <input type="text" class="form-control" id="test_ranking" name="test_ranking" required="">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="from-group">
                            <label for="w_t_20_ranking">{{ ___('cricket.w_t_20_ranking') }}</label>
                            <input type="text" class="form-control" id="w_t_20_ranking" name="w_t_20_ranking" required="">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="from-group">
                            <label for="w_odi_ranking">{{ ___('cricket.w_odi_ranking') }}</label>
                            <input type="text" class="form-control" id="w_odi_ranking" name="w_odi_ranking" required="">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="from-group">
                            <label for="w_test_ranking">{{ ___('cricket.w_test_ranking') }}</label>
                            <input type="text" class="form-control" id="w_test_ranking" name="w_test_ranking" required="">
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
                    <h5 class="modal-title" id="exampleModalLabel">{{ ___('cricket.update_team') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="close_button">&times;</span>
                    </button>
                </div>
                <form action="{{ route('teams.update') }}" method="Post">
                    @csrf
                    <div class="modal-body">
                        <div class="from-group">
                            <label for="team_name">{{ ___('cricket.team_name') }}</label>
                            <input type="text" class="form-control" id="e_team_name" name="team_name" required="">
                            <input type="hidden" class="form-control" id="e_team_id" name="id">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="from-group">
                            <label for="t_20_ranking">{{ ___('cricket.t_20_ranking') }}</label>
                            <input type="text" class="form-control" id="e_t_20_ranking" name="t_20_ranking" required="">
                            <input type="hidden" class="form-control" id="e_t_20_ranking_id" name="id">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="from-group">
                            <label for="odi_ranking">{{ ___('cricket.odi_ranking') }}</label>
                            <input type="text" class="form-control" id="e_odi_ranking" name="odi_ranking" required="">
                            <input type="hidden" class="form-control" id="e_odi_ranking_id" name="id">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="from-group">
                            <label for="test_ranking">{{ ___('cricket.test_ranking') }}</label>
                            <input type="text" class="form-control" id="e_test_ranking" name="test_ranking" required="">
                            <input type="hidden" class="form-control" id="e_test_ranking_id" name="id">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="from-group">
                            <label for="w_t_20_ranking">{{ ___('cricket.w_t_20_ranking') }}</label>
                            <input type="text" class="form-control" id="e_w_t_20_ranking" name="w_t_20_ranking" required="">
                            <input type="hidden" class="form-control" id="e_w_t_20_ranking_id" name="id">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="from-group">
                            <label for="w_odi_ranking">{{ ___('cricket.w_odi_ranking') }}</label>
                            <input type="text" class="form-control" id="e_w_odi_ranking" name="w_odi_ranking" required="">
                            <input type="hidden" class="form-control" id="e_w_odi_ranking_id" name="id">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="from-group">
                            <label for="w_test_ranking">{{ ___('cricket.w_test_ranking') }}</label>
                            <input type="text" class="form-control" id="e_w_test_ranking" name="w_test_ranking" required="">
                            <input type="hidden" class="form-control" id="e_w_test_ranking_id" name="id">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger"
                            data-dismiss="modal">{{ ___('common.close') }}</button>
                        <button type="Submit" class="btn btn-primary">{{ ___('common.update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $('body').on('click', '.edit', function() {
            let cat_id = $(this).data('id');
            $.get("teams/edit/" + cat_id, function(data) {
                $.get("teams/edit/" + cat_id, function(data) {
                    $('#e_team_name').val(data.team_name);
                    $('#e_t_20_ranking').val(data.t_20_ranking);
                    $('#e_odi_ranking').val(data.odi_ranking);
                    $('#e_test_ranking').val(data.test_ranking);
                    $('#e_team_id').val(data.id);
                    $('#e_t_20_ranking_id').val(data.id);
                    $('#e_odi_ranking_id').val(data.id);
                    $('#e_test_ranking_id').val(data.id);
                })
            });
        });
    </script>
@endsection
