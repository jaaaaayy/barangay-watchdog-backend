<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::prefix('reports')
  ->controller(ReportController::class)
  ->group(function () {
    Route::post('/', 'createReport');
    Route::get('/', 'getAllReports');
  });