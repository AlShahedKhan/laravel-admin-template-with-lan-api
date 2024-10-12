@extends('layouts.admin')

@section('admin_content')
    <div class="page-content">
        {{-- bradecrumb Area S t a r t --}}
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <title>{{ ___('cricket.curve') }}</title>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ ___('cricket.home') }}</a></li>
                        <li class="breadcrumb-item">{{ ___('cricket.curve') }}</li>
                    </ol>
                </div>
            </div>
        </div>
        {{-- bradecrumb Area E n d --}}

        <!--  table content start -->
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ ___('cricket.curve') }}</h4>
                    @if (hasPermission('curve_create'))
                        <a href="" class="btn btn-lg ot-btn-primary btn-right" data-toggle="modal" data-target="#teamModal">
                            <span><i class="fa-solid fa-plus"></i> </span>
                            <span class="">{{ ___('cricket.add_curve') }}</span>
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
                                    <th class="purchase">{{ ___('cricket.team_name') }}</th>
                                    <th class="purchase">{{ ___('cricket.runs') }}</th>
                                    @if (hasPermission('curve_update') || hasPermission('curve_delete'))
                                        <th class="action">{{ ___('cricket.action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @foreach ($data['curve'] as $key => $row)
                                    <tr>
                                        <td class="serial">{{ $key + 1 }}</td>
                                        <td>{{ @$row->matchh->team->team_name }} - {{ @$row->matchh->team2->team_name }}
                                        </td>
                                        <td>{{ $row->team->team_name ?? '' }}</td>
                                        <td>{{ $row->runs ?? '' }}</td>
                                        @if (hasPermission('curve_update') || hasPermission('curve_delete'))
                                            <td>
                                                @if (hasPermission('curve_update'))
                                                    <a class="btn btn-info btn-sm" href="javascript:void(0)" title="Edit"
                                                        onclick="editPost({{ $row->id }})" data-toggle="modal"
                                                        data-target="#editModal"><i class="fas fa-edit"></i></a>
                                                @endif
                                                @if (hasPermission('curve_delete'))
                                                    <a href="{{ route('curve.delete', $row->id) }}"
                                                        class="btn btn-danger btn-sm" id="delete">
                                                        <i class="fas fa-trash"></i></a>
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
                    <h5 class="modal-title" id="exampleModalLabel">{{ ___('cricket.add_curve') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="close_button">&times;</span>
                    </button>
                </div>
                <form action="{{ route('curve.store') }}" method="Post" class="score_add_form">
                    @csrf
                    <div class="modal-body">
                        <div class="from-group">
                            <label for="player_name">{{ ___('cricket.match_name') }}</label>
                            <select class="form-control" name="match_id" id="match_id" required="">
                                <option value="">--{{ ___('cricket.select_optopn') }}--</option>
                                @foreach ($data['match'] as $row)
                                    <option value="{{ $row->id }}">{{ @$row->team->team_name }} -
                                        {{ @$row->team2->team_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group">
                            <label for="player_name">{{ ___('cricket.team_name') }}</label>
                            <select class="form-control" name="team_id" id="team_id" required="">
                            </select>
                        </div>
                        <div class="from-group">
                            <label for="runs">{{ ___('cricket.runs') }}</label>
                            <input type="text" class="form-control" id="runs" name="runs" required="">
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
                    <h5 class="modal-title" id="exampleModalLabel">{{ ___('cricket.update_curve') }}</h5>
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
            let _url = `curve/edit/${id}`;

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
                url: '{{ route('getTeamListCurve') }}',
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
                url: '{{ route('getPlayerListCurve') }}',
                success: function(data) {
                    $('form.score_add_form #player_id').html(data);
                },
                error: function(data) {}
            });
        });
    </script>
@endsection
