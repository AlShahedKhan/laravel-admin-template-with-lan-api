@extends('layouts.admin')

@section('admin_content')
    <div class="page-content">

        {{-- bradecrumb Area S t a r t --}}
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <title>{{ ___('cricket.manage_public_table') }}</title>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ ___('cricket.home') }}</a></li>
                        <li class="breadcrumb-item">{{ ___('cricket.manage_public_table') }}</li>
                    </ol>
                </div>
            </div>
        </div>
        {{-- bradecrumb Area E n d --}}

        <!--  table content start -->
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ ___('cricket.manage_public_table') }}</h4>
                    @if (hasPermission('managepublictable_store'))
                        <a href="" class="btn btn-lg ot-btn-primary btn-right" data-toggle="modal"
                            data-target="#teamModal">
                            <span><i class="fa-solid fa-plus"></i> </span>
                            <span class="">{{ ___('cricket.add_table') }}</span>
                        </a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered role-table" id="example1">
                            <thead class="thead">
                                <tr>
                                    <th class="serial">{{ ___('cricket.sl') }}</th>
                                    <th class="purchase">{{ ___('cricket.match_name') }}</th>
                                    <th class="purchase">{{ ___('cricket.table_number') }}</th>
                                    <th class="purchase">{{ ___('cricket.targeted_runs') }}</th>
                                    <th class="purchase">{{ ___('cricket.targeted_overs') }}</th>
                                    @if (hasPermission('managepublictable_update') || hasPermission('managepublictable_delete'))
                                        <th class="action">{{ ___('cricket.action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @foreach ($data as $key => $row)
                                    <tr>
                                        <td class="serial">{{ $key + 1 }}</td>
                                        <td>{{ $row->matchh->team->team_name }} vs {{ $row->matchh->team2->team_name }} {{ @$row->matchh->match_datetime }}
                                        <td>{{ $row->table_number }}</td>
                                        <td>{{ $row->targeted_runs }}</td>
                                        <td>{{ $row->targeted_overs }}</td>
                                        </td>
                                        @if (hasPermission('managepublictable_update') || hasPermission('managepublictable_delete'))
                                            <td>
                                                @if (hasPermission('managepublictable_update'))
                                                    <a href="#" class="btn btn-info btn-sm edit"
                                                        data-id="{{ $row->id }}" data-toggle="modal"
                                                        data-target="#editModal"><i class="fas fa-edit"></i></a>
                                                @endif
                                                @if (hasPermission('managepublictable_delete'))
                                                    <a href="{{ route('manage-public.delete', $row->id) }}"
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
                    <h5 class="modal-title" id="exampleModalLabel">{{ ___('cricket.add_player') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="close_button">&times;</span>
                    </button>
                </div>
                <form action="{{ route('manage-public.store') }}" method="Post">
                    @csrf
                    <div class="modal-body">
                        <div class="from-group">
                            <label for="player_name">{{ ___('cricket.match_name') }}</label>
                            <select class="form-control" name="match_id" required="">
                                @foreach ($matchh as $row)
                                    <option value="{{ $row->id }}">{{ $row->team->team_name }} Vs
                                        {{ $row->team2->team_name }} {{ @$row->match_datetime }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group">
                            <label for="table_number">{{ ___('cricket.table_number') }}</label>
                            <input type="text" class="form-control" name="table_number" required="">
                        </div>
                        <div class="from-group">
                            <label for="targeted_runs">{{ ___('cricket.targeted_runs') }}</label>
                            <input type="text" class="form-control" name="targeted_runs" required="">
                        </div>
                        <div class="from-group">
                            <label for="targeted_overs">{{ ___('cricket.targeted_overs') }}</label>
                            <input type="text" class="form-control" name="targeted_overs" required="">
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
                    <h5 class="modal-title" id="exampleModalLabel">{{ ___('cricket.update table') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="close_button">&times;</span>
                    </button>
                </div>
                <form action="{{ route('manage-public.update') }}" method="Post">
                    @csrf

                    <div class="from-group">
                        <label for="match_name">{{ ___('cricket.match_name') }}</label>
                        <select class="form-control" name="match_id" required="">
                            @foreach ($matchh as $row)
                                <option value="{{ $row->id }}" @if ($data->first() && $row->id == $data->first()->match_id) selected="" @endif>
                                    {{ $row->team->team_name }} Vs {{ $row->team2->team_name }} {{ @$row->match_datetime }}
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="id" value="{{ $data->first()->id ?? '' }}">
                    </div>
                    <div class="from-group">
                        <label for="table_number">{{ ___('cricket.table_number') }}</label>
                        <input type="text" class="form-control" name="table_number"
                            value="{{ $data->first()->table_number ?? '' }}" required="">
                    </div>
                    <div class="from-group">
                        <label for="targeted_runs">{{ ___('cricket.targeted_runs') }}</label>
                        <input type="text" class="form-control" name="targeted_runs"
                            value="{{ $data->first()->targeted_runs ?? '' }}" required="">
                    </div>
                    <div class="from-group">
                        <label for="targeted_overs">{{ ___('cricket.targeted_overs') }}</label>
                        <input type="text" class="form-control" name="targeted_overs"
                            value="{{ $data->first()->targeted_overs ?? '' }}" required="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger"
                            data-dismiss="modal">{{ ___('common.close') }}</button>
                        <button type="Submit" class="btn btn-primary">{{ ___('common.update') }}</button>
                    </div>
                </form>
                {{-- <div id="modal_body">
                    
                </div> --}}
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $('body').on('click', '.edit', function() {
            let subcat_id = $(this).data('id');
            $.get("manage-public/edit/" + subcat_id, function(data) {
                $("#modal_body").html(data);
            });
        });
    </script>
@endsection
