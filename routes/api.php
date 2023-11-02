<?php

use App\Http\Controllers\{ClasssController, SectionController, StudentController, AuthController};
use Illuminate\Support\Facades\Route;

//__class api route__//
Route::apiResource("/class", ClasssController::class);


//__section api route__//
Route::apiResource("/section", SectionController::class);


//__student api route__//
Route::apiResource("/student", StudentController::class);


Route::group([
    'prefix' => 'auth'

], function () {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::post("payload", [AuthController::class, 'payload']);
    Route::post("register", [AuthController::class, "register"]);
});
