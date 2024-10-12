@extends('layouts.admin')

@section('admin_content')
    <div class="container">
        <h1>Series List</h1>
        <hr>

        <div class="row mb-3">
            <div class="col-md-12">
                @if (hasPermission('series_store'))
                    <a href="{{ route('series.create') }}" class="btn btn-primary">Create</a>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Series Name</th>
                            <th>Team Name</th>
                            <th>Venue</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Created At</th>
                            @if (hasPermission('series_update') || hasPermission('series_delete'))
                                <th>Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($series as $s)
                            <tr>
                                <td>{{ $s->id }}</td>
                                <td>{{ $s->series_name }}</td>
                                <td>{{ $s->team->team_name }}</td>
                                <td>{{ $s->venue }}</td>
                                <td>{{ (new DateTime($s->series_start_time))->format('d/m/Y H:i') }}</td>
                                <td>{{ (new DateTime($s->series_end_time))->format('d/m/Y H:i') }}</td>
                                <td>{{ $s->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    @if (hasPermission('series_update'))
                                        <a href="{{ route('series.edit', $s->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    @endif
                                    @if (hasPermission('series_delete'))
                                        <form action="{{ route('series.delete', $s->id) }}" method="POST"
                                            class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this series?')">Delete</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                {{ $series->links() }}
            </div>
        </div>
    </div>
@endsection
