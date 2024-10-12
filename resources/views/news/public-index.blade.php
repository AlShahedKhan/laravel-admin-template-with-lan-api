@extends('layouts.publichome')

@section('admin_content')
    <div class="row mb-5">
      @foreach ($news as $row)
        <div class="col-md-6 col-lg-4 mb-3">
          <div class="card h-100">
            <img class="card-img-top" src="{{ $row->image }}" alt="{{ $row->title }}" />
            <div class="card-body">
              <h5 class="card-title">{{ $row->title }}</h5>
              <p class="card-text">{{ $row->description }}</p>
              <a href="{{ route('showNews', ['newsId' => $row->id]) }}" class="btn btn-info">{{ ___('common.read_more') }}</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
@endsection
