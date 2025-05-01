<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::prefix('projects')
  ->controller(ProjectController::class)
  ->group(function () {
    Route::get('/', 'getAllProjects');
  });