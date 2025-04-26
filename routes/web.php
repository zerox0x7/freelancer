<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AccountController;
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
    return view('home');
});

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// All authenticated routes
Route::middleware(['auth'])->group(function () {
    // Main navigation - Header items
    Route::get('/mail', [MailController::class, 'index'])->name('mail');
    Route::get('/messages', [MessageController::class, 'index'])->name('messages');
    Route::get('/competitions', [CompetitionController::class, 'index'])->name('competitions');
    Route::get('/services', [ServiceController::class, 'index'])->name('services');
    
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Account settings
    Route::get('/account/settings', [AccountController::class, 'settings'])->name('account.settings');
    
    // Projects related routes
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
    Route::get('/projects/my', [ProjectController::class, 'myProjects'])->name('projects.my');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    
    // Offers related routes
    Route::get('/offers/my', [OfferController::class, 'myOffers'])->name('offers.my');
    Route::post('/projects/{project}/offers', [OfferController::class, 'store'])->name('offers.store');
    
    // Payments routes
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments');
    
    // Favorites routes
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites');
    Route::post('/favorites/{type}/{id}', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
});

require __DIR__.'/auth.php';
