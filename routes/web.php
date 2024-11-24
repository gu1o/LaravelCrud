<?php

use App\Http\Controllers\ArmiesInvolvedController;
use App\Http\Controllers\ConflictController;
use App\Http\Controllers\ConflictSideController;
use App\Http\Controllers\ReportConflictController;
use App\Http\Controllers\SideController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})-> name('home');


Route::resource('armies-involved', ArmiesInvolvedController::class);
Route::resource('conflicts', ConflictController::class);
Route::resource('conflicts-side', ConflictSideController::class);
Route::resource('report-conflicts', ReportConflictController::class);
Route::resource('sides', SideController::class);
