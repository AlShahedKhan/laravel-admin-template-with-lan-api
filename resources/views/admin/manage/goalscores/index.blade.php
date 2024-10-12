@extends('layouts.admin')

@section('admin_content')
    <div class="page-content">
        {{-- bradecrumb Area S t a r t --}}
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <title>{{ ___('football.goal_score') }}</title>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ ___('cricket.home') }}</a></li>
                        <li class="breadcrumb-item">{{ ___('football.goal_score') }}</li>
                    </ol>
                </div>
            </div>
        </div>
        {{-- bradecrumb Area E n d --}}

        <!--  table content start -->
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ ___('football.goal_score') }}</h4>
                    @if (hasPermission('goal_scores_create'))
                        <a href="" class="btn btn-lg ot-btn-primary btn-right" data-toggle="modal"
                            data-target="#teamModal">
                            <span><i class="fa-solid fa-plus"></i> </span>
                            <span class="">{{ ___('football.add_goal') }}</span>
                        </a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered role-table" id="example1">
                            <thead class="thead">
                                <tr>
                                    <th class="serial"> {{ ___('cricket.sl') }} </th>
                                    <th class="purchase">{{ ___('football.goal') }} </th>
                                    <th class="purchase">{{ ___('football.shots') }} </th>
                                    <th class="purchase">{{ ___('football.shots_on_target') }} </th>
                                    <th class="purchase">{{ ___('football.prossession') }} </th>
                                    <th class="purchase">{{ ___('football.passes') }} </th>
                                    <th class="purchase">{{ ___('football.passes_accuracy') }} </th>
                                    <th class="purchase">{{ ___('football.fouls') }} </th>
                                    <th class="purchase">{{ ___('football.yellow_cards') }} </th>
                                    <th class="purchase">{{ ___('football.red_cards') }} </th>
                                    <th class="purchase">{{ ___('football.off_sides') }} </th>
                                    <th class="purchase">{{ ___('football.corners') }} </th>
                                    @if (hasPermission('goal_scores_update') || hasPermission('goal_scores_delete'))
                                        <th class="action"> {{ ___('cricket.action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @foreach ($data as $key => $row)
                                    <tr>
                                        <td class="serial">{{ $key + 1 }}</td>
                                        <td>{{ $row->goal }}</td>
                                        <td>{{ $row->shots }}</td>
                                        <td>{{ $row->shots_on_target }}</td>
                                        <td>{{ $row->prossession }}</td>
                                        <td>{{ $row->passes }}</td>
                                        <td>{{ $row->passes_accuracy }}</td>
                                        <td>{{ $row->fouls }}</td>
                                        <td>{{ $row->yellow_cards }}</td>
                                        <td>{{ $row->red_cards }}</td>
                                        <td>{{ $row->off_sides }}</td>
                                        <td>{{ $row->corners }}</td>
                                        @if (hasPermission('goal_scores_update') || hasPermission('goal_scores_delete'))
                                            <td>
                                                @if (hasPermission('goal_scores_update'))
                                                    <a href="#" class="btn btn-info btn-sm edit"
                                                        data-id="{{ $row->id }}" data-toggle="modal"
                                                        data-target="#editModal"><i class="fas fa-edit"></i></a>
                                                @endif
                                                @if (hasPermission('goal_scores_delete'))
                                                    <a href="{{ route('goalscores.delete', $row->id) }}"
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
                    <h5 class="modal-title" id="exampleModalLabel">{{ ___('football.add_goal') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="close_button">&times;</span>
                    </button>
                </div>
                <form action="{{ route('goalscores.store') }}" method="Post" class="score_add_form">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="row mb-3">
                                <div class="col-sm-6 mb-3">
                                    <label for="goal">{{ ___('football.goal') }}</label>
                                    <input type="text" class="form-control" id="goal" name="goal" required="">
                                </div>

                                <div class="col-sm-6 mb-3">
                                    <label for="shots">{{ ___('football.shots') }}</label>
                                    <input type="text" class="form-control" id="shots" name="shots" required="">
                                </div>

                                <div class="col-sm-6 mb-3">
                                    <label for="shots_on_target">{{ ___('football.shots_on_target') }}</label>
                                    <input type="text" class="form-control" id="shots_on_target" name="shots_on_target"
                                        required="">
                                </div>

                                <div class="col-sm-6 mb-3">
                                    <label for="prossession">{{ ___('football.prossession') }}</label>
                                    <input type="text" class="form-control" id="prossession" name="prossession"
                                        required="">
                                </div>

                                <div class="col-sm-6 mb-3">
                                    <label for="passes">{{ ___('football.passes') }}</label>
                                    <input type="text" class="form-control" id="passes" name="passes"
                                        required="">
                                </div>

                                <div class="col-sm-6 mb-3">
                                    <label for="passes_accuracy">{{ ___('football.passes_accuracy') }}</label>
                                    <input type="text" class="form-control" id="passes_accuracy"
                                        name="passes_accuracy" required="">
                                </div>

                                <div class="col-sm-6 mb-3">
                                    <label for="fouls">{{ ___('football.fouls') }}</label>
                                    <input type="text" class="form-control" id="fouls" name="fouls"
                                        required="">
                                </div>

                                <div class="col-sm-6 mb-3">
                                    <label for="yellow_cards">{{ ___('football.yellow_cards') }}</label>
                                    <input type="text" class="form-control" id="yellow_cards" name="yellow_cards"
                                        required="">
                                </div>

                                <div class="col-sm-6 mb-3">
                                    <label for="red_cards">{{ ___('football.red_cards') }}</label>
                                    <input type="text" class="form-control" id="red_cards" name="red_cards"
                                        required="">
                                </div>

                                <div class="col-sm-6 mb-3">
                                    <label for="off_sides">{{ ___('football.off_sides') }}</label>
                                    <input type="text" class="form-control" id="off_sides" name="off_sides"
                                        required="">
                                </div>

                                <div class="col-sm-6 mb-3">
                                    <label for="corners">{{ ___('football.corners') }}</label>
                                    <input type="text" class="form-control" id="corners" name="corners"
                                        required="">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger"
                                        data-dismiss="modal">{{ ___('common.close') }}</button>
                                    <button type="Submit" class="btn btn-primary">{{ ___('common.submit') }}</button>
                                </div>
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
                    <h5 class="modal-title" id="exampleModalLabel">{{ ___('football.update_goal') }}</h5>
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
            $.get("goalscores/edit/" + subcat_id, function(data) {
                $("#modal_body").html(data);
            });
        });
    </script>
@endsection
