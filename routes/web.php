<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RoleController;
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

Route::get('/', function () {
    return redirect()->route('employees.index');
});

Route::get('public', [PublicController::class, 'index'])->name('public.index');

Route::prefix('admin')->group(function () {
    Route::resource('employees', EmployeeController::class);
    Route::resource('roles', RoleController::class);
});
