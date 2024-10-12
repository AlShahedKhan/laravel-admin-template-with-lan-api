@extends('layouts.admin')

@section('admin_content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ ___('football.create_league') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('leagues.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="league_name" class="col-md-4 col-form-label text-md-right">{{ ___('football.leagues_name') }}</label>

                                <div class="col-md-6">
                                    <input id="league_name" type="text" class="form-control @error('league_name') is-invalid @enderror" name="league_name" value="{{ old('league_name') }}" required autocomplete="league_name" autofocus>

                                    @error('league_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="venue" class="col-md-4 col-form-label text-md-right">{{ ___('football.venue') }}</label>

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
                                <label for="league_start_time" class="col-md-4 col-form-label text-md-right">{{ ___('football.league_start_time') }}</label>

                                <div class="col-md-6">
                                    <input id="league_start_time" type="datetime-local" class="form-control @error('league_start_time') is-invalid @enderror" name="league_start_time" value="{{ old('league_start_time') }}" required autocomplete="league_start_time">

                                    @error('league_start_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="league_end_time" class="col-md-4 col-form-label text-md-right">{{ ___('football.league_end_time') }}</label>

                                <div class="col-md-6">
                                    <input id="league_end_time" type="datetime-local" class="form-control @error('league_end_time') is-invalid @enderror" name="league_end_time" value="{{ old('league_end_time') }}" required autocomplete="league_end_time">

                                    @error('league_end_time')
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
