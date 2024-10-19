<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRegistrationController;

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/

Route::post('/register', [UserRegistrationController::class, 'store']);
Route::middleware('validate.token.user.registration')->group(function () {
    Route::put('/register', [UserRegistrationController::class, 'update']);
});
