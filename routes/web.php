<?php

use App\App\Notifications\Models\DatabaseNotification;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Models\Comment;
use App\Models\User;
use App\Notifications\Auth\UserJoined;
use App\Notifications\Comment\CommentCreated;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/notification', function () {
    // $notification = DatabaseNotification::find('0a8d5e8f-4e04-4f02-89be-af44895a6978');

    $user = User::first();
    $comment = Comment::withTrashed()->with('author')->first();

    $user->notify(new CommentCreated($comment));
    // $user->notify(new UserJoined($user));

    return redirect()->route('dashboard');
})->name('notifications.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
