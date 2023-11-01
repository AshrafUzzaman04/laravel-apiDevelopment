<?php

use App\Http\Controllers\ClasssController;
use Illuminate\Support\Facades\Route;

Route::apiResource("/class", ClasssController::class);
