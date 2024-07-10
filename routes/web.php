<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NoteViewController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   
});

require __DIR__.'/auth.php';


// Google Login
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name("auth.google");
Route::get('/auth/google/callback', [GoogleController::class, 'googleCallback'])->name("auth.callback.google");
// Facebook Login
Route::get('/auth/facebook', [FacebookController::class, 'redirectToFB'])->name("auth.facebook");
Route::get('/auth/facebook/callback', [FacebookController::class, 'FBCallback'])->name("auth.callback.facebook");

// Logout
Route::get('/logout', [ProfileController::class, 'logout'])->name("logout");

// User More Info
Route::get('/user-info', [ProfileController::class, 'additionalInfo'])->name('more-info');
Route::post('/user-info', [ProfileController::class, 'storeAdditionalInfo'])->name('more-info.store');


// Home
Route::get('/', [HomeController::class,'index'])->name('index');

Route::get('/add-note', [NoteController::class,'add'])->name('note.add');
Route::post('/add-note', [NoteController::class,'store'])->name('note.store');

//Users
Route::get('/users/{id}', [UserController::class,'users'])->name('users');

//View/Read Note
Route::get('/note/{id}', [NoteViewController::class,'viewNotes'])->name('notes.view');



// Delete Note
Route::get('/note/delete/{id}', [NoteController::class,'deleteNote'])->name('notes.dlt');
// Edit Note
Route::get('/note/edit/{id}', [NoteController::class,'editNotePage'])->name('notes.edit');
Route::post('/note/edit/{id}', [NoteController::class,'editNote'])->name('notes.edit');


// View All Notes
Route::get('/notes', [NoteController::class,'allNotes'])->name('notes.all');
// Load More
Route::get('/notes/load-more', [NoteController::class, 'loadMoreNotes'])->name('notes.loadMore');


// Search Note
Route::get('/notes/search', [NoteController::class,'search'])->name('note.search');

// Add Likes
Route::get('/note/{id}/like', [LikeController::class,'Addlike'])->name('note.like');



