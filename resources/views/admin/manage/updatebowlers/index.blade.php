@extends('layouts.admin')

@section('admin_content')
    <div class="page-content">
        {{-- bradecrumb Area S t a r t --}}
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <title>{{ ___('cricket.update_bowler') }}</title>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ ___('cricket.home') }}</a></li>
                        <li class="breadcrumb-item">{{ ___('cricket.update_bowler') }}</li>
                    </ol>
                </div>
            </div>
        </div>
        {{-- bradecrumb Area E n d --}}

        <!--  table content start -->
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ ___('cricket.update_bowler') }}</h4>
                    {{-- @if (hasPermission('role_create')) --}}
                    <a href="" class="btn btn-lg ot-btn-primary btn-right" data-toggle="modal"
                        data-target="#teamModal">
                        <span><i class="fa-solid fa-plus"></i> </span>
                        <span class="">{{ ___('cricket.add_update_bowler') }}</span>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered role-table" id="example1">
                            <thead class="thead">
                                <tr>
                                    <th class="serial"> {{ ___('cricket.sl') }} </th>
                                    <th class="purchase">{{ ___('cricket.overs') }}</th>
                                    <th class="purchase">{{ ___('cricket.strick') }}</th>
                                    <th class="purchase">{{ ___('cricket.maidens') }}</th>
                                    <th class="purchase">{{ ___('cricket.runs') }}</th>
                                    <th class="purchase">{{ ___('cricket.wickets') }}</th>
                                    <th class="purchase">{{ ___('cricket.no_balls') }}</th>
                                    <th class="purchase">{{ ___('cricket.wides') }}</th>
                                    <th class="purchase">{{ ___('cricket.panalty_runs') }}</th>
                                    <th class="action">{{ ___('cricket.action') }}</th>
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @foreach ($data as $key => $row)
                                    <tr>
                                        <td class="serial">{{ $key + 1 }}</td>
                                        <td>{{ $row->overs }}</td>
                                        <td>{{ $row->strick }}</td>
                                        <td>{{ $row->maidens }}</td>
                                        <td>{{ $row->runs }}</td>
                                        <td>{{ $row->wickets }}</td>
                                        <td>{{ $row->no_balls }}</td>
                                        <td>{{ $row->wides }}</td>
                                        <td>{{ $row->panalty_runs }}</td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm edit"
                                                data-id="{{ $row->id }}" data-toggle="modal"
                                                data-target="#editModal"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('updatebowler.delete', $row->id) }}"
                                                class="btn btn-danger btn-sm" id="delete"><i
                                                    class="fas fa-trash"></i></a>
                                        </td>
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
                    <h5 class="modal-title" id="exampleModalLabel">{{ ___('cricket.add_update_score') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="close_button">&times;</span>
                    </button>
                </div>
                <form action="{{ route('updatebowler.store') }}" method="Post" class="score_add_form">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="row mb-3">
                                <div class="col-sm-6 mb-3">
                                    <label for="overs">{{ ___('cricket.overs') }}</label>
                                    <input type="text" class="form-control" name="overs" required="">
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="strick">{{ ___('cricket.strick') }}</label>
                                    <input type="text" class="form-control" name="strick" required="">
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="maidens">{{ ___('cricket.maidens') }}</label>
                                    <input type="text" class="form-control" name="maidens" required="">
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="runs">{{ ___('cricket.runs') }}</label>
                                    <input type="text" class="form-control" name="runs" required="">
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="wickets">{{ ___('cricket.wickets') }}</label>
                                    <input type="text" class="form-control" name="wickets" required="">
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="no_balls">{{ ___('cricket.no_balls') }}</label>
                                    <input type="text" class="form-control" name="no_balls" required="">
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="wides">{{ ___('cricket.wides') }}</label>
                                    <input type="text" class="form-control" name="wides" required="">
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="panalty_runs">{{ ___('cricket.panalty_runs') }}</label>
                                    <input type="text" class="form-control" name="panalty_runs" required="">
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

    {{-- edit modal --}}
    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ ___('cricket.update_score_update') }}</h5>
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
        $('body').on('click', '.edit', function() {
            let subcat_id = $(this).data('id');
            $.get("updatebowler/edit/" + subcat_id, function(data) {
                $("#modal_body").html(data);
            });
        });
    </script>
@endsection
