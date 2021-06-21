<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Gurus;
use App\Http\Livewire\Mapels;
use Symfony\Component\Routing\Route as RoutingRoute;

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

// Route::get('/', function () {
//     return view('dashboard');
// });
Route::get('/', [LandingController::class, 'index']);
Route::get('/p_guru', [LandingController::class, 'guru'])->name('p_guru');

Route::get('/guru', Gurus::class)->name('gurus');
Route::get('/mapels', Mapels::class)->name('mapels');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
