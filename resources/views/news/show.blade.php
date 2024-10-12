@extends('layouts.publichome')

@section('admin_content')
    <div class="card mb-4 box-shadow">
        <img class="card-img-top" src="{{ asset($data->image) }}" alt="{{ $data->title }}" style="height: 400px;">
        <div class="card-body">
            <h2 class="card-title">{{ $data->title }}</h2>
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">{{ $data->author }}</small>
                <small class="text-muted">{{ $data->date }}</small>
            </div>
            <p class="card-text">{{ $data->description }}</p>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="{{ route('news') }}" class="btn btn-sm btn-outline-secondary">Back to News</a>
                </div>
                <small class="text-muted">{{ $data->created_at->diffForHumans() }}</small>
            </div>
        </div>
    </div>
@endsection
