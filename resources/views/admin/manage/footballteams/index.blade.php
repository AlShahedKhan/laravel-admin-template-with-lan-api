@extends('layouts.admin')

@section('admin_content')
    <div class="page-content">

        {{-- bradecrumb Area S t a r t --}}
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    {{-- <h4 class="bradecrumb-title mb-1">{{ $data['title'] }}</h1> --}}

                    <title>{{ ___('football.football_teams') }}</title>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ ___('cricket.home') }}</a></li>
                        <li class="breadcrumb-item">{{ ___('football.football_teams') }}</li>
                    </ol>
                </div>
            </div>
        </div>
        {{-- bradecrumb Area E n d --}}

        <!--  table content start -->
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ ___('football.football_team') }}</h4>
                    @if (hasPermission('football_team_create'))
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
                                    <th class="purchase">{{ ___('cricket.man_team_points') }} </th>
                                    <th class="purchase">{{ ___('cricket.women_team_points') }} </th>
                                    @if (hasPermission('football_team_update') || hasPermission('football_team_delete'))
                                        <th class="action"> {{ ___('cricket.action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @foreach ($data as $key => $row)
                                    <tr>
                                        <td class="serial">{{ $key + 1 }}</td>
                                        <td>{{ $row->team_name }}</td>
                                        <td>{{ $row->man_team_points }}</td>
                                        <td>{{ $row->women_team_points }}</td>
                                        @if (hasPermission('football_team_update') || hasPermission('football_team_delete'))
                                            <td>
                                                @if (hasPermission('football_team_update'))
                                                    <a href="#" class="btn btn-info btn-sm edit"
                                                        data-id="{{ $row->id }}" data-toggle="modal"
                                                        data-target="#editModal"><i class="fas fa-edit"></i></a>
                                                @endif
                                                @if (hasPermission('football_team_delete'))
                                                    <a href="{{ route('footballteams.delete', $row->id) }}"
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
                    <h5 class="modal-title" id="exampleModalLabel">{{ ___('cricket.add_team') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="close_button">&times;</span>
                    </button>
                </div>
                <form action="{{ route('footballteams.store') }}" method="Post">
                    @csrf
                    <div class="modal-body">
                        <div class="from-group">
                            <label for="team_name">{{ ___('cricket.team_name') }}</label>
                            <input type="text" class="form-control" id="team_name" name="team_name" required="">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="from-group">
                            <label for="man_team_points">{{ ___('cricket.man_team_points') }}</label>
                            <input type="text" class="form-control" id="man_team_points" name="man_team_points" required="">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="from-group">
                            <label for="women_team_points">{{ ___('cricket.women_team_points') }}</label>
                            <input type="text" class="form-control" id="women_team_points" name="women_team_points" required="">
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
                <form action="{{ route('footballteams.update') }}" method="Post">
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
                            <label for="man_team_points">{{ ___('cricket.man_team_points') }}</label>
                            <input type="text" class="form-control" id="e_man_team_points" name="man_team_points" required="">
                            <input type="hidden" class="form-control" id="e_team_id" name="id">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="from-group">
                            <label for="women_team_points">{{ ___('cricket.women_team_points') }}</label>
                            <input type="text" class="form-control" id="e_women_team_points" name="women_team_points" required="">
                            <input type="hidden" class="form-control" id="e_team_id" name="id">
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
            $.get("footballteams/edit/" + cat_id, function(data) {
                $.get("footballteams/edit/" + cat_id, function(data) {
                    $('#e_team_name').val(data.team_name);
                    $('#e_man_team_points').val(data.man_team_points);
                    $('#e_man_women_team_points').val(data.man_women_team_points);
                    $('#e_team_id').val(data.id);
                })
            });
        });
    </script>
@endsection
