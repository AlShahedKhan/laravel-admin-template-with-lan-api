@extends('layouts.admin')

@section('admin_content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Series') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('series.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="series_name" class="col-md-4 col-form-label text-md-right">{{ __('Series Name') }}</label>

                                <div class="col-md-6">
                                    <input id="series_name" type="text" class="form-control @error('series_name') is-invalid @enderror" name="series_name" value="{{ old('series_name') }}" required autocomplete="series_name" autofocus>

                                    @error('series_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="from-group mb-3">
                                <label for="player_name">{{ ___('cricket.team_name') }}</label>
                                <select class="form-control" name="team_id" required="">
                                    @foreach ($team as $row)
                                        <option value="{{ $row->id }}">{{ $row->team_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group row">
                                <label for="venue" class="col-md-4 col-form-label text-md-right">{{ __('Venue') }}</label>

                                <div class="col-md-6">
                                    <input id="venue" type="text" class="form-control @error('venue') is-invalid @enderror" name="venue" value="{{ old('venue') }}" required autocomplete="venue">

                                    @error('venue')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="series_start_time" class="col-md-4 col-form-label text-md-right">{{ __('Series Start Time') }}</label>

                                <div class="col-md-6">
                                    <input id="series_start_time" type="datetime-local" class="form-control @error('series_start_time') is-invalid @enderror" name="series_start_time" value="{{ old('series_start_time') }}" required autocomplete="series_start_time">

                                    @error('series_start_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="series_end_time" class="col-md-4 col-form-label text-md-right">{{ __('Series End Time') }}</label>

                                <div class="col-md-6">
                                    <input id="series_end_time" type="datetime-local" class="form-control @error('series_end_time') is-invalid @enderror" name="series_end_time" value="{{ old('series_end_time') }}" required autocomplete="series_end_time">

                                    @error('series_end_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
