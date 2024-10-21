<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRegistrationController;
use App\Http\Middleware\ValidateTokenUserRegistration;

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/

Route::post('/register', [UserRegistrationController::class, 'store']);
Route::group(['middleware' => 'validate-token-user-registration'] , function () {
    Route::put('/register', [UserRegistrationController::class, 'update']);
    });
