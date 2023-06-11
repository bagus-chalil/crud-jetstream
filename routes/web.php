<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard',[HomeController::class,'redirectUser'])->name('dashboard');
});




Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','role:user'])->group(function () {
    Route::middleware(['splade'])->group(function () {
        Route::get('/', fn () => view('home'))->name('home');
        Route::get('/docs', fn () => view('docs'))->name('docs');
    
        // Registers routes to support the interactive components...
        Route::spladeWithVueBridge();
    
        // Registers routes to support password confirmation in Form and Link components...
        Route::spladePasswordConfirmation();
    
        // Registers routes to support Table Bulk Actions and Exports...
        Route::spladeTable();
    
        // Registers routes to support async File Uploads with Filepond...
        Route::spladeUploads();
    });
});


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','role:admin'])->group(function () {
    // admin routes
    Route::get('/admin/dashboard',[AdminDashboardController::class,'dashboard'])->name('admin.dashboard');
    //Category
    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index']);
        Route::post('/insert', [CategoryController::class, 'store']);
        Route::get('/{category}', [CategoryController::class, 'edit']);
        Route::put('/{category}', [CategoryController::class, 'update']);
        Route::delete('/{category}', [CategoryController::class, 'destroy']);
    });

});
