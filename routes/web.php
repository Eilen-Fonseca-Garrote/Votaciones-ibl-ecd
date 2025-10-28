<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\FileManagerController;
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

Route::get('/', [App\Http\Controllers\MobileController::class, 'index'])->name('main');
Route::post('/portal', [App\Http\Controllers\MobileController::class, 'portal'])->name('portal');
Route::get('/portal', [App\Http\Controllers\MobileController::class, 'portal'])->name('portal');
Route::get('/init/{id}', [App\Http\Controllers\MobileController::class, 'init'])->name('init_mob');
Route::get('/applications/{order}', [App\Http\Controllers\MobileController::class, 'applications'])->name('applications');
Route::post('/app/store', [App\Http\Controllers\MobileController::class, 'appStore'])->name('app.store');
Route::get('/finish/vote/{idVote}', [App\Http\Controllers\MobileController::class, 'finishVote'])->name('finish.vote');
Route::get('/finish/store/{idVote}', [App\Http\Controllers\MobileController::class, 'finishStore'])->name('finish.store');

Route::get('/applications/{order}', [App\Http\Controllers\MobileController::class, 'applications'])->name('applications');
Route::post('/app/store', [App\Http\Controllers\MobileController::class, 'appStore'])->name('app.store');

Route::get('/voting/{order}', [App\Http\Controllers\MobileController::class, 'voting'])->name('voting.order');
Route::post('/voting/store', [App\Http\Controllers\MobileController::class, 'votingStore'])->name('voting.store');

Route::get('/member-picture', [App\Http\Controllers\MemberController::class, 'picture'])->name('member.picture');


Route::resource('members', MemberController::class);
Route::resource('users', UserController::class);
Route::resource('votes', VoteController::class);
Route::resource('services', ServiceController::class);
Route::resource('configs', ConfigController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/salir', [App\Http\Controllers\MobileController::class, 'salir'])->name('salir');
Route::get('/report/donut/{id}', [App\Http\Controllers\ReportController::class, 'donutChart'])->name('donut.index');
Route::get('/report/votes/{id}', [App\Http\Controllers\ReportController::class, 'voteList'])->name('vote.list');


Route::delete('/postulates/destroy/{id}', [App\Http\Controllers\VoteController::class, 'destroyPostulation'])->name('postulates.destroy');
Route::get('/convert/member/{id}', [App\Http\Controllers\VoteController::class, 'convertMember'])->name('convert.member');
Route::get('/logs', [App\Http\Controllers\ReportController::class, 'logs'])->name('logs');

Route::get('vote/{id}', [App\Http\Controllers\VoteController::class, 'voteActive'])->name('vote.active');
Route::get('list-votes/{id}', [App\Http\Controllers\ReportController::class, 'listVotes'])->name('vote.list.table');
Route::get('result-votes/{id}', [App\Http\Controllers\ReportController::class, 'resultVotes'])->name('vote.result');


Route::get('filemanager', [FileManagerController::class, 'index']);

Route::get('filemanager/index',  [FileManagerController::class, 'index2']);
Route::get('get-files/{directoryName}',  [FileManagerController::class, 'getFiles']);
