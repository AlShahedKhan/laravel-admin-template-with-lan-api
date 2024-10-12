@extends('backend.master')

@section('title')
    {{ @$data['title'] }}
@endsection

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css"
        integrity="sha512-YdYyWQf8AS4WSB0WWdc3FbQ3Ypdm0QCWD2k4hgfqbQbRCJBEgX0iAegkl2S1Evma5ImaVXLBeUkIlP6hQ1eYKQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
<div class="page-content">

    {{-- bradecrumb Area S t a r t --}}
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="bradecrumb-title mb-1">{{ $data['title'] }}</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">{{ $data['title'] }}</li>
                </ol>
            </div>
        </div>
    </div>
    {{-- bradecrumb Area E n d --}}

    <div class="card ot-card">
        <div class="card-header ">
            <h4>{{ ___('settings.storage_info') }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('settings.storageSettingUpdate') }}" enctype="multipart/form-data" method="post"
                id="visitForm">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-12">
                            <div class="row mb-3">
                                {{-- File System start --}}
                                <div class="col-sm-6 mb-3">
                                    <label for="inputname" class="form-label">{{ ___('settings.file_system') }} <span class="text-danger">*</span></label>
                                    <select
                                        class="form-select ot-input file_system @error('file_system') is-invalid @enderror"
                                        value="{{ Setting('file_system') }}"
                                        name="file_system" id="validationServer04"
                                        aria-describedby="validationServer04Feedback">
                                    <option value="">Select</option>
                                    <option value="local" {{ setting('file_system') == "local" ? "selected":"" }}>Local</option>
                                </select>
                                @error('file_system')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        {{-- File System end --}}

                    </div>

                    <div class="col-md-12 mt-3">
                        <div class="text-end">
                            @if (hasPermission('email_settings_update'))
                                <button class="btn btn-lg ot-btn-primary">
                                    <span>
                                        <i class="fa-solid fa-save"></i>
                                    </span>{{ ___('common.update') }}
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

