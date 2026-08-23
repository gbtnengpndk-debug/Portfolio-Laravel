<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Admin\MessageController as AdminMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;

Route::get('/', [PortfolioController::class, 'index'])->name('portofolio');

Route::post('/contact', [MessageController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {

    // Dashboard
    Route::get('/admin', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    // Messages
    Route::get('/admin/messages', [AdminMessageController::class, 'index'])
        ->name('admin.messages.index');

  Route::patch(
    '/admin/messages/{message}/read',
    [AdminMessageController::class, 'markAsRead']
)->name('admin.messages.read');

    Route::delete('/admin/messages/{message}', [AdminMessageController::class, 'destroy'])
        ->name('admin.messages.destroy');

    // Projects
    Route::resource('admin/projects', ProjectController::class)
        ->names('admin.projects');

    // Skills
    Route::resource('admin/skills', SkillController::class)
        ->except(['show'])
        ->names('admin.skills');
});

require __DIR__.'/auth.php';
