@extends('layouts.admin')

@section('admin_content')
    <div class="container">
        <h1>{{ ___('football.leagues_list') }}</h1>
        <hr>

        <div class="row mb-3">
            <div class="col-md-12">
                @if (hasPermission('leagues_create'))
                    <a href="{{ route('leagues.create') }}" class="btn btn-primary">{{ ___('football.create') }}</a>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ ___('football.leagues_name') }}</th>
                            <th>{{ ___('football.venue') }}</th>
                            <th>{{ ___('football.start_time') }}</th>
                            <th>{{ ___('football.end_time') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($leagues as $l)
                            <tr>
                                <td>{{ $l->id }}</td>
                                <td>{{ $l->league_name }}</td>
                                <td>{{ $l->venue }}</td>
                                <td>{{ (new DateTime($l->league_start_time))->format('d/m/Y H:i') }}</td>
                                <td>{{ (new DateTime($l->league_end_time))->format('d/m/Y H:i') }}</td>
                                <td>
                                    @if (hasPermission('leagues_update'))
                                        <a href="{{ route('leagues.edit', $l->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    @endif
                                    @if (hasPermission('leagues_delete'))
                                        <form action="{{ route('leagues.delete', $l->id) }}" method="POST"
                                            class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this league?')">Delete</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                {{ $leagues->links() }}
            </div>
        </div>
    </div>
@endsection
