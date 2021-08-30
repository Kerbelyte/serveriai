@extends('layouts.app')
@section('content')
    @if (session('status_success'))
        <div class="alert alert-success" role="alert">{{ session('status_success') }}</div>
    @endif
    @if (session('status_error'))
        <div class="alert alert-danger" role="alert">{{ session('status_error') }}</div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Change Hostname</div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('rename', $server_id) }}">
                            @csrf @method("PUT")
                            <div class="form-group">
                                <label>Enter a new hostname for {{ $domain }} server: </label>
                                <input type="text" name="domain" class="form-control" value="">
                                @error('domain')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                                <p style="color: red">
                                    <b>* Before changing hostname, make sure that hostname A record
                                        is pointed to your server IP address.
                                    </b>
                                </p>
                            <button type="submit" class="btn btn-primary">Change</button>
                            <a class="btn btn-danger" href="{{ route('manage', $server_id) }}">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
