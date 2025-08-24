<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmailsController;

// Route::get('/', function () {
//     return redirect()->route('indexPageName');
// })->name('home');

Route::get('/login', function () {
    return redirect()->route('loginPageName');
})->name('login');

// Public routes
Route::middleware('guest')->group(function (){
    Route::get('/loginPage', [UserController::class, 'loginPageFunction'])->name('loginPageName');
    Route::get('/registerPage', [UserController::class, 'registerPageFunction'])->name('registerPageName');
    Route::post('/loginUser', [UserController::class, 'loginSubmitFunction'])->name('loginSubmitName');
    Route::post('/registerUser', [UserController::class, 'registerSubmitFunction'])->name('registerSubmitName');
});

// Protected routes (require authentication)
Route::middleware(['auth'])->group(function () {
    Route::get('/indexPage', [UserController::class, 'indexPageFunction'])->name('indexPageName');
    Route::post('/logoutUser', [UserController::class, 'logoutSubmitFunction'])->name('logoutSubmitName');
    Route::post('/sendMail', [EmailsController::class, 'sendMailFunction'])->name('sendMailName');
});

// Admin & Moderator
Route::middleware('role:admin,moderator')->group(function (){
    Route::get('/updatePage/{user}', [UserController::class, 'updatePageFunction'])->name('updatePageName');
    Route::put('/updateUser/{user}', [UserController::class, 'updateSubmitFunction'])->name('updateSubmitName');
});

// Admin-only routes
Route::middleware('role:admin')->group(function () {
    Route::put('/restoreUser/{user}', [UserController::class, 'restoreSubmitFunction'])->name('restoreSubmitName');
    Route::delete('/deleteUser/{user}', [UserController::class, 'deleteSubmitFunction'])->name('deleteSubmitName');
    Route::delete('/forceDeleteUser/{user}', [UserController::class, 'forceDeleteSubmitFunction'])->name('forceDeleteSubmitName');
});
