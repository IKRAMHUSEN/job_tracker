<?php

use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;

Route::get('/',[ApplicationController::class, 'index']);
Route::resource('applications', ApplicationController::class);
