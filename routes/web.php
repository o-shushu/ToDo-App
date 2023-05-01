<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Task\TaskController;
use App\Http\Controllers\Folder\FolderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Home\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['middleware' => 'auth'], function() {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('/folders/{id}/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/folders/create', [FolderController::class, 'showCreateForm'])->name('folders.create');
    Route::post('/folders/create',[FolderController::class, 'create']);
    Route::get('/folders/{id}/tasks/create', [TaskController::class, 'showCreateForm'])->name('tasks.create');
    Route::post('/folders/{id}/tasks/create', [TaskController::class, 'create']);
    Route::get('/folders/{id}/tasks/{taskId}/edit', [TaskController::class, 'showEditForm'])->name('tasks.edit');
    Route::post('/folders/{id}/tasks/{taskId}/edit', [TaskController::class, 'edit']);
});
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/password/reset', [ResetPasswordController::class, 'showResetForm'])->name('password.request');
Route::post('/password/email', [ResetPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/send_complete', [ResetPasswordController::class, 'sendComplete'])->name('send_complete');
Route::get('/edit', [ResetPasswordController::class, 'edit'])->name('edit');
Route::post('/update', [ResetPasswordController::class, 'update'])->name('update');
Route::get('/edited', [ResetPasswordController::class, 'edited'])->name('edited');
