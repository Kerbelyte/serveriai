<?php

use App\Http\Controllers\ServerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ServerController::class, 'list'])->name('list');
Route::get('/manage/{server_id}', [ServerController::class, 'manage'])->name('manage');
Route::get('/manage/{server_id}/reboot', [ServerController::class, 'reboot'])->name('reboot');
Route::get('/manage/{server_id}/reinstall', [ServerController::class, 'reinstall'])->name('reinstall');
Route::get('/manage/{server_id}/resetpassword', [ServerController::class, 'resetpassword'])->name('resetpassword');
Route::get('/manage/{server_id}/show', [ServerController::class, 'show'])->name('show');
Route::get('/manage/{server_id}/rename', [ServerController::class, 'rename'])->name('rename');
Route::get('/manage/{server_id}/webconsole', [ServerController::class, 'webconsole'])->name('webconsole');



