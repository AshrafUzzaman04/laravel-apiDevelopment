<?php

use App\Http\Controllers\{ClasssController, SectionController, StudentController};
use Illuminate\Support\Facades\Route;

//__class api route__//
Route::apiResource("/class", ClasssController::class);


//__section api route__//
Route::apiResource("/section", SectionController::class);


//__student api route__//
Route::apiResource("/student", StudentController::class);
