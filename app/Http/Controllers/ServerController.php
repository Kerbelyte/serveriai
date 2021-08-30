<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://billing.time4vps.com/api/',
            'auth' => [env('API_USERNAME'), env('API_PASSWORD')]
        ]);
    }

    public function list()
    {
        $resp = $this->client->get('server');
        $servers = json_decode($resp->getBody());
        return view('list', ['servers' => $servers]);
    }

    public function manage(Request $request)
    {
        $resp = $this->client->get('server/' . $request->server_id);
        $server = json_decode($resp->getBody());
        return view('manage', ['server' => $server, 'server_id' => $request->server_id]);
    }

    public function reboot(Request $request)
    {
        $resp = $this->client->post('server/' . $request->server_id .'/reboot');
        $data = json_decode($resp->getBody());

        if (isset($data->task_id)) {
            return redirect('/manage/' . $request->server_id)->with('status_success', 'Server successfully rebooted!');
        } else {
            return redirect('/manage/' . $request->server_id)->with('status_error', 'Failed to reboot server!');
        }
    }
    public function reinstall(Request $request)
    {
        $resp = $this->client->post('server/' . $request->server_id .'/reinstall', [
            'json' => [
                "os" => "kvm-ubuntu-20.04-x86_64"
            ]
        ]);
        $data = json_decode($resp->getBody());
        if (isset($data->task_id)) {
            return redirect('/manage/' . $request->server_id)->with('status_success', 'Server successfully reinstalled!');
        } else {
            return redirect('/manage/' . $request->server_id)->with('status_error', 'Failed to reinstall server!');
        }
    }

    public function resetpassword(Request $request)
    {
        $resp = $this->client->post('server/' . $request->server_id .'/resetpassword');
        $data = json_decode($resp->getBody());
        if (isset($data->task_id)) {
            return redirect('/manage/' . $request->server_id)->with('status_success', 'Server password reset successfully!');
        } else {
            return redirect('/manage/' . $request->server_id)->with('status_error', 'Failed to reset server password!');
        }
    }

    public function show(Request $request)
    {
        $resp = $this->client->get('server');
        $servers = json_decode($resp->getBody());
        foreach ($servers as $server) {
            $domain = $server->domain;
        }
        return view('rename', ['server_id' => $request->server_id, 'domain' => $domain]);
    }

    public function rename(Request $request)
    {
        $this->validate($request, [
            'domain' => 'required'
        ]);

        $resp = $this->client->post('server/' . $request->server_id .'/rename', [
            'json' => [
                "hostname" => "3hph.l.time4vps.cloud"
            ]
        ]);
        $data = json_decode($resp->getBody());
        if (isset($data->task_id)) {
            return redirect('/manage/' . $request->server_id)->with('status_success', 'Server hostname rename successfully!');
        } else {
            return redirect('/manage/' . $request->server_id)->with('status_error', 'Failed to rename server hostname!');
        }
    }

    public function webconsole(Request $request)
    {
        $resp = $this->client->post('server/' . $request->server_id .'/webconsole', [
            'json' => [
                "timeout" => '1h',
                "whitelabel" => 'true'
            ]
        ]);
        $data = json_decode($resp->getBody());
        if (isset($data->task_id)) {
            return redirect('/manage/' . $request->server_id)->with('status_success', 'Web console launched successfully!');
        } else {
            return redirect('/manage/' . $request->server_id)->with('status_error', 'Failed to launch web console!');
        }
    }
}
