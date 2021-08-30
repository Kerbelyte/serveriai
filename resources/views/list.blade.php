@extends('layouts.app')
@section('content')
    <div class="card-body">
        <table class="table">
            <tr>
                <th>Domain</th>
                <th>IP</th>
                <th>Type</th>
                <th></th>
            </tr>
            @foreach ($servers as $server)
                <tr>
                    <td>{{ $server->domain }}</td>
                    <td>{{ $server->ip }}</td>
                    <td>{{ $server->type }}</td>
                    <td>
                        <a class="btn btn-success" href={{ route('manage', $server->server_id) }}>Manage</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
