@extends('layouts.admin')

@section('admin_content')
    <div class="page-content">
        {{-- bradecrumb Area S t a r t --}}
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <title>{{ ___('cricket.score_update') }}</title>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ ___('cricket.home') }}</a></li>
                        <li class="breadcrumb-item">{{ ___('cricket.score_update') }}</li>
                    </ol>
                </div>
            </div>
        </div>
        {{-- bradecrumb Area E n d --}}

        <!--  table content start -->
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ ___('cricket.score_update') }}</h4>
                    @if (hasPermission('scoreupdates_create'))
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
                                    <th class="purchase">{{ ___('cricket.out_type') }} </th>
                                    <th class="purchase">{{ ___('cricket.out_by_type') }} </th>
                                    <th class="purchase">{{ ___('cricket.one') }} </th>
                                    <th class="purchase">{{ ___('cricket.two') }}</th>
                                    <th class="purchase">{{ ___('cricket.three') }}</th>
                                    <th class="purchase">{{ ___('cricket.four') }}</th>
                                    <th class="purchase">{{ ___('cricket.six') }}</th>
                                    <th class="purchase">{{ ___('cricket.balls') }}</th>
                                    @if (hasPermission('scoreupdates_update') || hasPermission('scoreupdates_delete'))
                                        <th class="action"> {{ ___('cricket.action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @foreach ($data as $key => $row)
                                    <tr>
                                        <td class="serial">{{ $key + 1 }}</td>
                                        <td>{{ $row->out_type }}</td>
                                        <td>{{ $row->out_by_type }}</td>
                                        <td>{{ $row->one }}</td>
                                        <td>{{ $row->two }}</td>
                                        <td>{{ $row->three }}</td>
                                        <td>{{ $row->four }}</td>
                                        <td>{{ $row->six }}</td>
                                        <td>{{ $row->balls_played }}</td>
                                        @if (hasPermission('scoreupdates_update') || hasPermission('scoreupdates_delete'))
                                            <td>
                                                @if (hasPermission('scoreupdates_update'))
                                                    <a href="#" class="btn btn-info btn-sm edit"
                                                        data-id="{{ $row->id }}" data-toggle="modal"
                                                        data-target="#editModal"><i class="fas fa-edit"></i></a>
                                                @endif
                                                @if (hasPermission('scoreupdates_delete'))
                                                    <a href="{{ route('scoreupdates.delete', $row->id) }}"
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
                    <h5 class="modal-title" id="exampleModalLabel">{{ ___('cricket.add_score') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="close_button">&times;</span>
                    </button>
                </div>
                <form action="{{ route('scoreupdates.store') }}" method="Post" class="score_add_form">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="row mb-3">
                                <div class="col-sm-6 mb-3">
                            <label for="out_type">{{ ___('cricket.out_type') }}</label>
                            <input type="text" class="form-control" id="out_type" name="out_type" required="">
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="out_by_type">{{ ___('cricket.out_by_type') }}</label>
                            <input type="text" class="form-control" id="out_by_type" name="out_by_type" required="">
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="one">{{ ___('cricket.one') }}</label>
                            <input type="text" class="form-control" id="one" name="one" required="">
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="two">{{ ___('cricket.two') }}</label>
                            <input type="text" class="form-control" id="two" name="two" required="">
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="three">{{ ___('cricket.three') }}</label>
                            <input type="text" class="form-control" id="three" name="three" required="">
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="four">{{ ___('cricket.four') }}</label>
                            <input type="text" class="form-control" id="four" name="four" required="">
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="six">{{ ___('cricket.six') }}</label>
                            <input type="text" class="form-control" id="six" name="six" required="">
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="balls_played">{{ ___('cricket.balls') }}</label>
                            <input type="text" class="form-control" id="balls_played" name="balls_played"
                                required="">
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
                    <h5 class="modal-title" id="exampleModalLabel">{{ ___('cricket.update_score') }}</h5>
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
            $.get("scoreupdates/edit/" + subcat_id, function(data) {
                $("#modal_body").html(data);
            });
        });
    </script>
@endsection
