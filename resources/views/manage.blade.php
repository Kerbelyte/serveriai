@extends('layouts.app')
@section('content')
    <div class="grid-container">
        <div class="card-body">
            <h1>Menu</h1>
            <div>
                <a href="{{ route('reboot', $server_id) }}" class="btn btn-secondary">Reboot</a>
            </div>
            <div>
                <a href="{{ route('reinstall', $server_id) }}" class="btn btn-secondary">Reinstall</a>
            </div>
            <div>
                <a href="{{ route('resetpassword', $server_id) }}" class="btn btn-secondary">Reset password</a>
            </div>
            <div>
                <a href="{{ route('show', $server_id) }}" class="btn btn-secondary">Rename hostname</a>
            </div>
            <div>
                <a href="{{ route('webconsole', $server_id) }}" class="btn btn-secondary">Launch web console</a>
            </div>

        </div>
        <div class="card-body">
        <h1>Sever information</h1>
        @if (session('status_success'))
            <p style="color: green"><b>{{ session('status_success') }}</b></p>
        @else
            <p style="color: red"><b>{{ session('status_error') }}</b></p>
        @endif
        <table class="table">
                <tr>
                    <td >domain:</td >
                    <td>{{ $server->domain }}</td>
                </tr>
                <tr>
                    <td>status:</td>
                    <td>{{ $server->status }}</td>
                </tr>
                <tr>
                    <td>cpu_frequency:</td>
                    <td>{{ $server->cpu_frequency }}</td>
                </tr>
                <tr>
                    <td>cpu_cores:</td>
                    <td>{{ $server->cpu_cores }}</td>
                </tr>
                <tr>
                    <td>ram_limit:</td>
                    <td>{{ $server->ram_limit }}</td>
                </tr>
                <tr>
                    <td>ram_used:</td>
                    <td>{{ $server->ram_used }}</td>
                </tr>
                <tr>
                    <td>disk_limit:</td>
                    <td>{{ $server->disk_limit }}</td>
                </tr>
                <tr>
                    <td>disk_usage:</td>
                    <td>{{ $server->disk_usage }}</td>
                </tr>
                <tr>
                    <td>bw_limit:</td>
                    <td>{{ $server->bw_limit }}</td>
                </tr>
                <tr>
                    <td>bw_in:</td>
                    <td>{{ $server->bw_in }}</td>
                </tr>
                <tr>
                    <td>bw_out:</td>
                    <td>{{ $server->bw_out }}</td>
                </tr>
                <tr>
                    <td>OS:</td>
                    <td>{{ $server->os }}</td>
                </tr>
                <tr>
                    <td>IP:</td>
                    <td>{{ $server->ip }}</td>
                </tr>
        </table>
            <a href="{{ route('list') }}" class="btn btn-dark">Back</a>
    </div>
    </div>
@endsection
