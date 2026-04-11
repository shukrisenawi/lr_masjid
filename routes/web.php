<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CommitteeMemberController;
use App\Http\Controllers\CommunityGroupController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeathRecordController;
use App\Http\Controllers\DocumentCategoryController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PaymentAssignmentController;
use App\Http\Controllers\PaymentRecordController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\VillageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

Route::get('/dashboard', DashboardController::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('members', MemberController::class)->except('show');
    Route::resource('committee-members', CommitteeMemberController::class)->except('show');
    Route::resource('positions', PositionController::class)->except('show');
    Route::resource('villages', VillageController::class)->except('show');
    Route::resource('community-groups', CommunityGroupController::class)->except('show');
    Route::resource('announcements', AnnouncementController::class)->except('show');
    Route::resource('documents', DocumentController::class)->except('show');
    Route::resource('document-categories', DocumentCategoryController::class)->except('show');
    Route::resource('death-records', DeathRecordController::class)->except('show');
    Route::resource('payment-types', PaymentTypeController::class)->except('show');
    Route::resource('payment-assignments', PaymentAssignmentController::class)->except('show');
    Route::resource('payment-records', PaymentRecordController::class)->except('show');
    Route::resource('roles', RoleController::class)->except('show');

    Route::get('/reports/payments', [ReportController::class, 'payments'])->name('reports.payments');
});

require __DIR__.'/auth.php';
