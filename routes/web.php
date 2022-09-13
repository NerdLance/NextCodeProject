<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\ProjectController;

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

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Random Test Page for Layout
Route::get('/test', function () {
    return view('test');
});

// Show Create a Project Form
Route::get('/projects/create', [ProjectController::class, 'create'])->middleware(['auth'])->name('projects-create');

// View All Projects
Route::get('/projects', [ProjectController::class, 'index'])->middleware(['auth'])->name('projects-all');

// Store Project in Database
Route::post('/projects', [ProjectController::class, 'store'])->middleware(['auth'])->name('projects-store');

// Manage My Created Projects
Route::get('/projects/manage', [ProjectController::class, 'manage'])->middleware(['auth'])->name('projects-manage');

// Show Single Project
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects-show');

// Vote on a Project
Route::post('/vote/{project}', [VoteController::class, 'store'])->middleware(['auth'])->name('votes-vote');

// Show App Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
