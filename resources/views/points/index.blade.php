@extends('layouts.admin')

@section('admin_content')
    <div class="container">
        <h1>Points List</h1>
        <div class="row mb-3">
            <div class="col-md-12">
                @if (hasPermission('point_store'))
                    <a href="{{ route('points.create') }}" class="btn btn-success">Create Point</a>
                @endif
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Points</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($points as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->points }}</td>
                                <td>
                                    @if (hasPermission('point_update'))
                                        <a href="{{ route('points.edit', $p->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    @endif
                                    @if (hasPermission('point_delete'))
                                        <form action="{{ route('points.delete', $p->id) }}" method="POST"
                                            class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this point?')">Delete</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $points->links() }}
            </div>
        </div>
    </div>
@endsection
