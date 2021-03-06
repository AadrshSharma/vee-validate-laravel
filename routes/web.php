<?php

use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
Route::get('/regis',[HomeController::class,'tern']);
Route::get('/regis2',[HomeController::class,'asd']);
// Route::get('/routing',[HomeController::class,'routecheck']);
Route::get('/routing', function (Request $request) {
    return inertia('Routecheck', $request);
});
Route::get('/progress', function (Request $request) {
    return inertia('Progress', $request);
});
//props send url
Route::post('/yourUrl/{id}', function (Request $request) {
    return inertia('yourVueComponent', ['id' => $request->id]);
});