@extends('layouts.admin')

@section('admin_content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>News</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Date</th>
                            <th>Image</th>
                            <th>Description</th>
                            @if (hasPermission('news_update') || hasPermission('news_delete'))
                                <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($news as $news_item)
                            <tr>
                                <td>{{ $news_item->title }}</td>
                                <td>{{ $news_item->author }}</td>
                                <td>{{ $news_item->date }}</td>
                                <td><img src="{{ asset($news_item->image) }}" alt="{{ $news_item->title }}" width="100">
                                </td>
                                <td>{{ $news_item->description }}</td>
                                <td>
                                    @if (hasPermission('news_update'))
                                        <a href="{{ route('news.edit', $news_item->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                    @endif
                                    @if (hasPermission('news_delete'))
                                        <form action="{{ route('news.delete', $news_item->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                @if (hasPermission('news_store'))
                    <a href="{{ route('news.create') }}" class="btn btn-primary">Add News</a>
                @endif
            </div>
        </div>
    </div>
@endsection
