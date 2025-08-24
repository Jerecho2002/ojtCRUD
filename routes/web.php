<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmailsController;

Route::get('/loginPage', [UserController::class, 'loginPageFunction'])->name('loginPageName');
Route::get('/registerPage', [UserController::class, 'registerPageFunction'])->name('registerPageName');
Route::get('/indexPage', [UserController::class, 'indexPageFunction'])->name('indexPageName');
Route::get('/updatePage/{user}', [UserController::class, 'updatePageFunction'])->name('updatePageName');


Route::post('/loginUser', [UserController::class, 'loginSubmitFunction'])->name('loginSubmitName');
Route::post('/registerUser', [UserController::class, 'registerSubmitFunction'])->name('registerSubmitName');
Route::post('/logoutUser', [UserController::class, 'logoutSubmitFunction'])->name('logoutSubmitName');

Route::put('/restoreUser/{user}', [UserController::class, 'restoreSubmitFunction'])->name('restoreSubmitName');
Route::put('/updateUser/{user}', [UserController::class, 'updateSubmitFunction'])->name('updateSubmitName');

Route::delete('/deleteUser/{user}', [UserController::class, 'deleteSubmitFunction'])->name('deleteSubmitName');
Route::delete('/forceDeleteUser/{user}', [UserController::class, 'forceDeleteSubmitFunction'])->name('forceDeleteSubmitName');

Route::post('/sendMail', [EmailsController::class, 'sendMailFunction'])->name('sendMailName');


