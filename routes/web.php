<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\JoinController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\TwoFaController;
use App\Http\Controllers\CollectorController;
use App\Http\Controllers\CommonDataCollectController;
use App\Http\Controllers\PestDataCollectController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Admin\AuditTrails;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Roles\Edit;
use App\Http\Livewire\Admin\Roles\Roles;
use App\Http\Livewire\Collector\CollectorLivewire;
use App\Http\Livewire\Admin\SentEmails\SentEmails;
use App\Http\Livewire\Admin\SentEmails\SentEmailsBody;
use App\Http\Livewire\Admin\Settings\Settings;
use App\Http\Livewire\Admin\Users\EditUser;
use App\Http\Livewire\Admin\Users\ShowUser;
use App\Http\Livewire\Admin\Users\Users;
use App\Http\Livewire\Welcome;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\maindashboard;
use App\Http\Livewire\PostIndex;
use App\Http\Livewire\Report1;
use App\Http\Livewire\Report2;
use App\Http\Livewire\chart1;

Route::get('/', Welcome::class);
Route::get('/app', Dashboard::class)->name('admin');
Route::get('/export-users', [UserController::class, 'exportUsers'])->name('export.users');
//Route::get('/a',maindashboard::class)->name('main.dashboard');
//unauthenticated
Route::middleware(['web', 'guest'])->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);

    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'store']);

    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset/{token}', [ResetPasswordController::class, 'reset'])->name('password.reset.update');

    Route::get('join/{token}', [JoinController::class, 'index'])->name('join');
    Route::put('join/{id}', [JoinController::class, 'update'])->name('join.update');

});

//authenticated
Route::middleware(['web', 'auth', 'activeUser', 'IpCheckMiddleware'])->prefix('admin')->group(function () {
    Route::get('2fa', [TwoFaController::class, 'index'])->name('2fa');
    Route::post('2fa', [TwoFaController::class, 'update'])->name('2fa.update');
    Route::get('2fa-setup', [TwoFaController::class, 'setup'])->name('2fa-setup');
    Route::post('2fa-setup', [TwoFaController::class, 'setupUpdate'])->name('2fa-setup.update');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/', Dashboard::class)->name('admin');

    Route::get('settings/audit-trails', AuditTrails::class)->name('admin.settings.audit-trails.index');
    Route::get('settings/sent-emails', SentEmails::class)->name('admin.settings.sent-emails');
    Route::get('settings/sent-emails-body/{id}', SentEmailsBody::class)->name('admin.settings.sent-emails.body');

    Route::get('users', Users::class)->name('admin.users.index');
    Route::get('users/{user}/edit', EditUser::class)->name('admin.users.edit');
    Route::get('users/{user}', ShowUser::class)->name('admin.users.show');


    // Route::get('/report1', Report1::class)->name('report1');
    // Route::get('/chart1', chart1::class)->name('chart1');
});



Route::middleware(['web', 'auth', 'activeUser', 'IpCheckMiddleware', 'role:collector'])->prefix('admin')->group(function () {
    Route::get('/', Dashboard::class)->name('admin');

    Route::get('/get-as-centers/{id}', [CollectorController::class, 'getAsCenters'])->name('admin.get.as.centers');
    Route::get('/specific-page-for-collector', [CollectorController::class, 'index'])->name('admin.collector.index');
    Route::get('/specific-page-for-collector/create', [CollectorController::class, 'create'])->name('admin.collector.create');
    Route::post('/specific-page-for-collector', [CollectorController::class, 'store'])->name('admin.collector.store');
    Route::post('/specific-page-for-collector/{collector}/edit', [CollectorController::class, 'edit'])->name('admin.collector.edit');
    Route::put('/specific-page-for-collector/{collector}', [CollectorController::class, 'update'])->name('admin.collector.update');
    
    Route::get('/collector-my-records/commondata', [CommonDataCollectController::class, 'index'])->name('admin.collector.mycommon.index');
    
    // Index Route
Route::get('/pestdata', [PestDataCollectController::class, 'index'])->name('pestdata.index');
Route::get('/pestdata/create', [PestDataCollectController::class, 'create'])->name('pestdata.create');
Route::post('/pestdata', [PestDataCollectController::class, 'store'])->name('pestdata.store');
Route::get('/pestdata/{id}', [PestDataCollectController::class, 'show'])->name('pestdata.show');
Route::get('/pestdata/{id}/edit', [PestDataCollectController::class, 'edit'])->name('pestdata.edit');
Route::put('/pestdata/{id}', [PestDataCollectController::class, 'update'])->name('pestdata.update');
Route::delete('/pestdata/{id}', [PestDataCollectController::class, 'destroy'])->name('pestdata.destroy');


Route::get('/pestdata/{id}', [PestDataCollectController::class, 'show'])->name('pestdata.index');
});
//Admin only routes
Route::middleware(['web', 'auth', 'activeUser', 'IpCheckMiddleware', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/', Dashboard::class)->name('admin');
    Route::get('settings/system-settings', Settings::class)->name('admin.settings');
    Route::get('settings/roles', Roles::class)->name('admin.settings.roles.index');
    Route::get('settings/roles/{role}/edit', Edit::class)->name('admin.settings.roles.edit');
    // Route::get('/collector-records', [CollectorController::class, 'view'])->name('admin.collector.records');
    Route::get('/collector-records', CollectorLivewire::class)->name('admin.collector.records');
    Route::get('/collector-show-common_data/{id}', [CommonDataCollectController::class, 'show'])->name('admin.collector.common.show');
    Route::get('/collector-show-pest_data/{id}', [PestDataCollectController::class, 'show'])->name('admin.collector.pest.show');

    Route::get('/report1', Report1::class)->name('report1');
    Route::get('/chart1', chart1::class)->name('chart1');
});

//Route::get('/a',maindashboard::class)->name('main.dashboard');
Route::get('/b', PostIndex::class)->name('post.index');
Route::get('/report2', Report2::class)->name('report2');



